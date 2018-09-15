<?php

namespace app\controllers;

use app\models\Cedulas;
use app\models\CedulasDatosAgresor;
use app\models\CedulasDatosGenerales;
use app\models\CedulasDatosGeneralesHijos;
use app\models\CedulasIdentificaciones;
use app\models\CedulasViolenciaGenero;
use app\models\CedulasViolenciaGeneroRuta;
use app\models\EncuestaTelefonica;
use Yii;
use app\models\search\EncuestaTelefonicaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EncuestaTelefonicaDependencia;
use app\models\Model;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use app\models\User;

/**
 * EncuestaTelefonicaController implements the CRUD actions for EncuestaTelefonica model.
 */
class EncuestaTelefonicaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'update','delete'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isAdminTelefonico(Yii::$app->user->identity->id)  ;
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EncuestaTelefonica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncuestaTelefonicaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EncuestaTelefonica model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EncuestaTelefonica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EncuestaTelefonica();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EncuestaTelefonica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelsTD = $model->encuestaTelefonicaDependencias;

        $modelIdentificacion = CedulasIdentificaciones::find()->where(['id' => $model->cedula_identificacion_id])->one();


        $modelCedula = Cedulas::find()->where(['id' => $modelIdentificacion->cedula_id])->one();
        $modelDatosGenerales = CedulasDatosGenerales::find()->where(['cedula_id' => $modelIdentificacion->cedula_id])->one();
        $modelsGH = $modelDatosGenerales->cedulasDatosGeneralesHijos;
        $modelViolenciaGenero = CedulasViolenciaGenero::find()->where(['cedula_id' => $modelIdentificacion->cedula_id])->one();
        $modelsGR = $modelViolenciaGenero->cedulasViolenciaGeneroRutas;
        $modelDatosAgresor = CedulasDatosAgresor::find()->where(['cedula_id' => $modelIdentificacion->cedula_id])->one();


        if ($model->load(Yii::$app->request->post()) ) {

            $oldIDs = ArrayHelper::map($modelsTD, 'id', 'id');
            $modelsTD = Model::createMultiple(EncuestaTelefonicaDependencia::classname(), $modelsTD);
            Model::loadMultiple($modelsTD, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsTD, 'id', 'id')));


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTD) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            EncuestaTelefonicaDependencia::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsTD as $modelTD) {
                            $modelTD->encuestatelefonica_id = $model->id;
                            if (! ($flag = $modelTD->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);

                        return $this->redirect(['update', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            $model->save();


        return $this->redirect(['index']);

            //return $this->redirect(['view', 'id' => $model->id]);
        }

        $modelIdentificacion->tipificacion_ids =  json_decode($modelIdentificacion->tipificacion_ids);
        $modelIdentificacion->coorporacion_ids =  json_decode($modelIdentificacion->coorporacion_ids);
        $modelIdentificacion->tipoasesoria_ids = json_decode($modelIdentificacion->tipoasesoria_ids);
        $modelIdentificacion->zona_riesgo_ids =  json_decode($modelIdentificacion->zona_riesgo_ids);
        $modelIdentificacion->horario_riesgo_ids =  json_decode($modelIdentificacion->horario_riesgo_ids);

        $modelDatosGenerales->servicios_basicos_ids = json_decode($modelDatosGenerales->servicios_basicos_ids);
        $modelDatosGenerales->ocupacion_ids = json_decode($modelDatosGenerales->ocupacion_ids);
        $modelDatosGenerales->fuente_ingresos_ids = json_decode($modelDatosGenerales->fuente_ingresos_ids);
        $modelDatosGenerales->programas_sociales_ids = json_decode($modelDatosGenerales->programas_sociales_ids);
        $modelDatosGenerales->servicios_medicos_ids = json_decode($modelDatosGenerales->servicios_medicos_ids);
        $modelDatosGenerales->padece_enfermedades_ids = json_decode($modelDatosGenerales->padece_enfermedades_ids);
        $modelDatosGenerales->autocuidado_ids = json_decode($modelDatosGenerales->autocuidado_ids);
        $modelDatosGenerales->padece_discapacidades_ids = json_decode($modelDatosGenerales->padece_discapacidades_ids);

        $modelViolenciaGenero->tipo_violencia_ids = json_decode($modelViolenciaGenero->tipo_violencia_ids);
        $modelViolenciaGenero->tipo_modalidad_ids = json_decode($modelViolenciaGenero->tipo_modalidad_ids);
        $modelViolenciaGenero->sintomatologia_emocional_ids = json_decode($modelViolenciaGenero->sintomatologia_emocional_ids);
        $modelViolenciaGenero->sintomatologia_fisica_ids = json_decode($modelViolenciaGenero->sintomatologia_fisica_ids);
        $modelViolenciaGenero->creencias_ids = json_decode($modelViolenciaGenero->creencias_ids);
        $modelViolenciaGenero->factores_psicosociales_ids = json_decode($modelViolenciaGenero->factores_psicosociales_ids);
        $modelViolenciaGenero->relacion_pareja_ids = json_decode($modelViolenciaGenero->relacion_pareja_ids);
        $modelViolenciaGenero->relato_ids = json_decode($modelViolenciaGenero->relato_ids);
        $modelViolenciaGenero->relaciones_sociales_ids = json_decode($modelViolenciaGenero->relaciones_sociales_ids);
        $modelViolenciaGenero->tipo_demanda_ids = json_decode($modelViolenciaGenero->tipo_demanda_ids);

        $modelDatosAgresor->servicios_basicos_ids = json_decode($modelDatosAgresor->servicios_basicos_ids);
        $modelDatosAgresor->ocupacion_ids = json_decode($modelDatosAgresor->ocupacion_ids);
        $modelDatosAgresor->fuente_ingresos_ids = json_decode($modelDatosAgresor->fuente_ingresos_ids);
        $modelDatosAgresor->programas_sociales_ids = json_decode($modelDatosAgresor->programas_sociales_ids);
        $modelDatosAgresor->servicios_medicos_ids = json_decode($modelDatosAgresor->servicios_medicos_ids);
        $modelDatosAgresor->padece_discapacidades_ids = json_decode($modelDatosAgresor->padece_discapacidades_ids);
        $modelDatosAgresor->lesion_fisica_ids = json_decode($modelDatosAgresor->lesion_fisica_ids);
        $modelDatosAgresor->lesion_agente_ids = json_decode($modelDatosAgresor->lesion_agente_ids);
        $modelDatosAgresor->lesion_area_ids = json_decode($modelDatosAgresor->lesion_area_ids);
        $modelDatosAgresor->danos_psicologicos_ids = json_decode($modelDatosAgresor->danos_psicologicos_ids);
        $modelDatosAgresor->danos_economicos_ids = json_decode($modelDatosAgresor->danos_economicos_ids);
        $modelDatosAgresor->indicador_riesgo_ids = json_decode($modelDatosAgresor->indicador_riesgo_ids);
        $modelDatosAgresor->tipo_seguimiento_ids = json_decode($modelDatosAgresor->tipo_seguimiento_ids);

        return $this->render('update', [
            'model' => $model,
            'modelsTD' => (empty($modelsTD)) ? [new EncuestaTelefonicaDependencia()] : $modelsTD,
            'modelDatosGenerales' => $modelDatosGenerales,
            'modelsGH' => (empty($modelsGH)) ? [new CedulasDatosGeneralesHijos()] : $modelsGH,
            'modelIdentificacion' => $modelIdentificacion,
            'modelViolenciaGenero' => $modelViolenciaGenero,
            'modelsGR'=> (empty($modelsGR)) ? [new CedulasViolenciaGeneroRuta()] : $modelsGR,
            'modelDatosAgresor' => $modelDatosAgresor,
            'modelCedula' => $modelCedula

        ]);
    }

    /**
     * Deletes an existing EncuestaTelefonica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EncuestaTelefonica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EncuestaTelefonica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EncuestaTelefonica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

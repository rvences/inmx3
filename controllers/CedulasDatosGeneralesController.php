<?php

namespace app\controllers;

use app\models\Cedulas;
use app\models\CedulasDatosGeneralesHijos;
use Yii;
use app\models\CedulasDatosGenerales;
use app\models\search\CedulasDatosGeneralesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Model;
use yii\helpers\ArrayHelper;


/**
 * CedulasDatosGeneralesController implements the CRUD actions for CedulasDatosGenerales model.
 */
class CedulasDatosGeneralesController extends Controller
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
                        'actions' => ['create', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserTelefonico(Yii::$app->user->identity->id)  ;
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
     * Lists all CedulasDatosGenerales models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CedulasDatosGeneralesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CedulasDatosGenerales model.
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
     * Creates a new CedulasDatosGenerales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $valor_cedula_temporal = 1;
        $cedula = Cedulas::find()->where(['id' => $valor_cedula_temporal])->one();

        $modelDatosGenerales = new CedulasDatosGenerales();

        if ($modelDatosGenerales->load(Yii::$app->request->post()) && $modelDatosGenerales->save()) {

            $modelDatosGenerales->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_basicos_ids']);
            $modelDatosGenerales->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['ocupacion_ids']);
            $modelDatosGenerales->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['fuente_ingresos_ids']);
            $modelDatosGenerales->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['programas_sociales_ids']);
            $modelDatosGenerales->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_medicos_ids']);
            $modelDatosGenerales->padece_enfermedades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_enfermedades_ids']);
            $modelDatosGenerales->autocuidado_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['autocuidado_ids']);
            $modelDatosGenerales->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_discapacidades_ids']);

            $modelDatosGenerales->save();


            return $this->redirect(['update', 'id' => $modelDatosGenerales->id]);

            //return $this->redirect(['view', 'id' => $modelDatosGenerales->id]);
        }

        return $this->render('create', [
            'modelDatosGenerales' => $modelDatosGenerales,
            'modelsGH' => (empty($modelsGH)) ? [new CedulasDatosGeneralesHijos()] : $modelsGH,
            'modelCedula' => $cedula,
        ]);
    }

    /**
     * Updates an existing CedulasDatosGenerales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelDatosGenerales = $this->findModel($id);
        $modelCedula = Cedulas::find()->where(['id' => $modelDatosGenerales->cedula_id])->one();

        $modelsGH = $modelDatosGenerales->cedulasDatosGeneralesHijos;

        if ($modelDatosGenerales->load(Yii::$app->request->post()) ) {
            $modelDatosGenerales->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_basicos_ids']);
            $modelDatosGenerales->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['ocupacion_ids']);
            $modelDatosGenerales->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['fuente_ingresos_ids']);
            $modelDatosGenerales->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['programas_sociales_ids']);
            $modelDatosGenerales->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_medicos_ids']);
            $modelDatosGenerales->padece_enfermedades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_enfermedades_ids']);
            $modelDatosGenerales->autocuidado_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['autocuidado_ids']);
            $modelDatosGenerales->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_discapacidades_ids']);


            $oldIDs = ArrayHelper::map($modelsGH, 'id', 'id');
            $modelsGH = Model::createMultiple(CedulasDatosGeneralesHijos::classname(), $modelsGH);
            Model::loadMultiple($modelsGH, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsGH, 'id', 'id')));


            // validate all models
            $valid = $modelDatosGenerales->validate();
            $valid = Model::validateMultiple($modelsGH) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelDatosGenerales->save(false)) {
                        if (! empty($deletedIDs)) {
                            CedulasDatosGeneralesHijos::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsGH as $modelDatosGeneralesGH) {
                            $modelDatosGeneralesGH->cedula_datos_generales_id = $modelDatosGenerales->id;
                            if (! ($flag = $modelDatosGeneralesGH->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['update', 'id' => $modelDatosGenerales->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            $modelDatosGenerales->save();
            return $this->redirect(['update', 'id' => $modelDatosGenerales->id]);
            //return $this->redirect(['view', 'id' => $modelDatosGenerales->id]);
        }

        $modelDatosGenerales->servicios_basicos_ids = json_decode($modelDatosGenerales->servicios_basicos_ids);
        $modelDatosGenerales->ocupacion_ids = json_decode($modelDatosGenerales->ocupacion_ids);
        $modelDatosGenerales->fuente_ingresos_ids = json_decode($modelDatosGenerales->fuente_ingresos_ids);
        $modelDatosGenerales->programas_sociales_ids = json_decode($modelDatosGenerales->programas_sociales_ids);
        $modelDatosGenerales->servicios_medicos_ids = json_decode($modelDatosGenerales->servicios_medicos_ids);
        $modelDatosGenerales->padece_enfermedades_ids = json_decode($modelDatosGenerales->padece_enfermedades_ids);
        $modelDatosGenerales->autocuidado_ids = json_decode($modelDatosGenerales->autocuidado_ids);
        $modelDatosGenerales->padece_discapacidades_ids = json_decode($modelDatosGenerales->padece_discapacidades_ids);

        return $this->render('update', [
            'modelDatosGenerales' => $modelDatosGenerales,
            'modelsGH' => (empty($modelsGH)) ? [new CedulasDatosGeneralesHijos()] : $modelsGH,
            'modelCedula' => $modelCedula,
        ]);
    }

    /**
     * Deletes an existing CedulasDatosGenerales model.
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
     * Finds the CedulasDatosGenerales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CedulasDatosGenerales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($modelDatosGenerales = CedulasDatosGenerales::findOne($id)) !== null) {
            return $modelDatosGenerales;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

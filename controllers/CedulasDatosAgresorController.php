<?php

namespace app\controllers;

use app\models\Cedulas;
use Yii;
use app\models\CedulasDatosAgresor;
use app\models\search\CedulasDatosAgresorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;

/**
 * CedulasDatosAgresorController implements the CRUD actions for CedulasDatosAgresor model.
 */
class CedulasDatosAgresorController extends Controller
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
     * Lists all CedulasDatosAgresor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CedulasDatosAgresorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CedulasDatosAgresor model.
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
     * Creates a new CedulasDatosAgresor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $valor_cedula_temporal = 1;
        $cedula = Cedulas::find()->where(['id' => $valor_cedula_temporal])->one();

        $modelDatosAgresor = new CedulasDatosAgresor();

        if ($modelDatosAgresor->load(Yii::$app->request->post()) && $modelDatosAgresor->save()) {

            $modelDatosAgresor->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['servicios_basicos_ids']);
            $modelDatosAgresor->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['ocupacion_ids']);
            $modelDatosAgresor->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['fuente_ingresos_ids']);
            $modelDatosAgresor->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['programas_sociales_ids']);
            $modelDatosAgresor->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['servicios_medicos_ids']);
            $modelDatosAgresor->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['padece_discapacidades_ids']);
            $modelDatosAgresor->lesion_fisica_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_fisica_ids']);
            $modelDatosAgresor->lesion_agente_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_agente_ids']);
            $modelDatosAgresor->lesion_area_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_area_ids']);
            $modelDatosAgresor->danos_psicologicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['danos_psicologicos_ids']);
            $modelDatosAgresor->danos_economicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['danos_economicos_ids']);
            $modelDatosAgresor->indicador_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['indicador_riesgo_ids']);
            $modelDatosAgresor->tipo_seguimiento_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['tipo_seguimiento_ids']);

            $modelDatosAgresor->save();


            return $this->redirect(['update', 'id' => $modelDatosAgresor->id]);

            //return $this->redirect(['view', 'id' => $modelDatosAgresor->id]);
        }

        return $this->render('create', [
            'modelDatosAgresor' => $modelDatosAgresor,
            'modelCedula' => $cedula,

        ]);
    }

    /**
     * Updates an existing CedulasDatosAgresor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelDatosAgresor = $this->findModel($id);
        $modelCedula = Cedulas::find()->where(['id' => $modelDatosAgresor->cedula_id])->one();

        if ($modelDatosAgresor->load(Yii::$app->request->post()) ) {
            $modelDatosAgresor->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['servicios_basicos_ids']);
            $modelDatosAgresor->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['ocupacion_ids']);
            $modelDatosAgresor->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['fuente_ingresos_ids']);
            $modelDatosAgresor->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['programas_sociales_ids']);
            $modelDatosAgresor->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['servicios_medicos_ids']);
            $modelDatosAgresor->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['padece_discapacidades_ids']);
            $modelDatosAgresor->lesion_fisica_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_fisica_ids']);
            $modelDatosAgresor->lesion_agente_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_agente_ids']);
            $modelDatosAgresor->lesion_area_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_area_ids']);
            $modelDatosAgresor->danos_psicologicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['danos_psicologicos_ids']);
            $modelDatosAgresor->danos_economicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['danos_economicos_ids']);
            $modelDatosAgresor->indicador_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['indicador_riesgo_ids']);
            $modelDatosAgresor->tipo_seguimiento_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['tipo_seguimiento_ids']);

            $modelDatosAgresor->save();
            return $this->redirect(['update', 'id' => $modelDatosAgresor->id]);
        }

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
            'modelDatosAgresor' => $modelDatosAgresor,
            'modelCedula' => $modelCedula

        ]);
    }

    /**
     * Deletes an existing CedulasDatosAgresor model.
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
     * Finds the CedulasDatosAgresor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CedulasDatosAgresor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($modelDatosAgresor = CedulasDatosAgresor::findOne($id)) !== null) {
            return $modelDatosAgresor;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

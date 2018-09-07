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

        $model = new CedulasDatosAgresor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['servicios_basicos_ids']);
            $model->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['ocupacion_ids']);
            $model->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['fuente_ingresos_ids']);
            $model->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['programas_sociales_ids']);
            $model->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['servicios_medicos_ids']);
            $model->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['padece_discapacidades_ids']);
            $model->lesion_fisica_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_fisica_ids']);
            $model->lesion_agente_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_agente_ids']);
            $model->lesion_area_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_area_ids']);
            $model->danos_psicologicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['danos_psicologicos_ids']);
            $model->danos_economicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['danos_economicos_ids']);
            $model->indicador_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['indicador_riesgo_ids']);
            $model->tipo_seguimiento_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['tipo_seguimiento_ids']);

            $model->save();


            return $this->redirect(['update', 'id' => $model->id]);

            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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
        $model = $this->findModel($id);
        $modelCedula = Cedulas::find()->where(['id' => $model->cedula_id])->one();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['servicios_basicos_ids']);
            $model->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['ocupacion_ids']);
            $model->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['fuente_ingresos_ids']);
            $model->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['programas_sociales_ids']);
            $model->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['servicios_medicos_ids']);
            $model->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['padece_discapacidades_ids']);
            $model->lesion_fisica_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_fisica_ids']);
            $model->lesion_agente_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_agente_ids']);
            $model->lesion_area_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['lesion_area_ids']);
            $model->danos_psicologicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['danos_psicologicos_ids']);
            $model->danos_economicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['danos_economicos_ids']);
            $model->indicador_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['indicador_riesgo_ids']);
            $model->tipo_seguimiento_ids = json_encode(Yii::$app->request->post( 'CedulasDatosAgresor' )['tipo_seguimiento_ids']);

            $model->save();
            return $this->redirect(['update', 'id' => $model->id]);
        }

        $model->servicios_basicos_ids = json_decode($model->servicios_basicos_ids);
        $model->ocupacion_ids = json_decode($model->ocupacion_ids);
        $model->fuente_ingresos_ids = json_decode($model->fuente_ingresos_ids);
        $model->programas_sociales_ids = json_decode($model->programas_sociales_ids);
        $model->servicios_medicos_ids = json_decode($model->servicios_medicos_ids);
        $model->padece_discapacidades_ids = json_decode($model->padece_discapacidades_ids);
        $model->lesion_fisica_ids = json_decode($model->lesion_fisica_ids);
        $model->lesion_agente_ids = json_decode($model->lesion_agente_ids);
        $model->lesion_area_ids = json_decode($model->lesion_area_ids);
        $model->danos_psicologicos_ids = json_decode($model->danos_psicologicos_ids);
        $model->danos_economicos_ids = json_decode($model->danos_economicos_ids);
        $model->indicador_riesgo_ids = json_decode($model->indicador_riesgo_ids);
        $model->tipo_seguimiento_ids = json_decode($model->tipo_seguimiento_ids);

        return $this->render('update', [
            'model' => $model,
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
        if (($model = CedulasDatosAgresor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

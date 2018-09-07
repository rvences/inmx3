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

        $model = new CedulasDatosGenerales();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_basicos_ids']);
            $model->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['ocupacion_ids']);
            $model->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['fuente_ingresos_ids']);
            $model->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['programas_sociales_ids']);
            $model->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_medicos_ids']);
            $model->padece_enfermedades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_enfermedades_ids']);
            $model->autocuidado_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['autocuidado_ids']);
            $model->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_discapacidades_ids']);

            $model->save();


            return $this->redirect(['update', 'id' => $model->id]);

            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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
        $model = $this->findModel($id);
        $modelCedula = Cedulas::find()->where(['id' => $model->cedula_id])->one();

        $modelsGH = $model->cedulasDatosGeneralesHijos;

        if ($model->load(Yii::$app->request->post()) ) {
            $model->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_basicos_ids']);
            $model->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['ocupacion_ids']);
            $model->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['fuente_ingresos_ids']);
            $model->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['programas_sociales_ids']);
            $model->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_medicos_ids']);
            $model->padece_enfermedades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_enfermedades_ids']);
            $model->autocuidado_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['autocuidado_ids']);
            $model->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_discapacidades_ids']);


            $oldIDs = ArrayHelper::map($modelsGH, 'id', 'id');
            $modelsGH = Model::createMultiple(CedulasDatosGeneralesHijos::classname(), $modelsGH);
            Model::loadMultiple($modelsGH, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsGH, 'id', 'id')));


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsGH) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            CedulasDatosGeneralesHijos::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsGH as $modelGH) {
                            $modelGH->cedula_datos_generales_id = $model->id;
                            if (! ($flag = $modelGH->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['update', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            $model->save();
            return $this->redirect(['update', 'id' => $model->id]);
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->servicios_basicos_ids = json_decode($model->servicios_basicos_ids);
        $model->ocupacion_ids = json_decode($model->ocupacion_ids);
        $model->fuente_ingresos_ids = json_decode($model->fuente_ingresos_ids);
        $model->programas_sociales_ids = json_decode($model->programas_sociales_ids);
        $model->servicios_medicos_ids = json_decode($model->servicios_medicos_ids);
        $model->padece_enfermedades_ids = json_decode($model->padece_enfermedades_ids);
        $model->autocuidado_ids = json_decode($model->autocuidado_ids);
        $model->padece_discapacidades_ids = json_decode($model->padece_discapacidades_ids);

        return $this->render('update', [
            'model' => $model,
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
        if (($model = CedulasDatosGenerales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

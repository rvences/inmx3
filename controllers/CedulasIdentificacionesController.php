<?php

namespace app\controllers;

use app\models\Cedulas;
use Yii;
use app\models\CedulasIdentificaciones;
use app\models\search\CedulasIdentificacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;

/**
 * CedulasIdentificacionesController implements the CRUD actions for CedulasIdentificaciones model.
 */
class CedulasIdentificacionesController extends Controller
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
                        // Establece que tiene permisos los vendedores
                        'allow' => true,
                        // El usuario se le asignan permisos en las siguientes acciones
                        'actions' => ['create', 'view', 'update'],
                        // Todos los usuarios autenticados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un vendedor
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
     * Lists all CedulasIdentificaciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CedulasIdentificacionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CedulasIdentificaciones model.
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
     * Creates a new CedulasIdentificaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CedulasIdentificaciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->tipificacion_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['tipificacion_ids']);
            $model->coorporacion_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['coorporacion_ids']);
            $model->tipoasesoria_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['tipoasesoria_ids']);
            $model->zona_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['zona_riesgo_ids']);
            $model->horario_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['horario_riesgo_ids']);
            $model->save();
            return $this->redirect(['update', 'id' => $model->id]);
            //return $this->redirect(['view', 'id' => $model->id]);
        }
        // Se genera la cedula inicial
        $cedula = new Cedulas();
        $cedula->status_id = 1;  // Creada sin utilizar
        $cedula->tipoatencion_id = 2;  // Telefónica
        $cedula->save();

        return $this->render('create', [
            'model' => $model,
            'modelCedula' => $cedula
        ]);
    }

    /**
     * Updates an existing CedulasIdentificaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelCedula = Cedulas::find()->where(['id' => $model->cedula_id])->one();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->tipificacion_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['tipificacion_ids']);
            $model->coorporacion_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['coorporacion_ids']);
            $model->tipoasesoria_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['tipoasesoria_ids']);
            $model->zona_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['zona_riesgo_ids']);
            $model->horario_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['horario_riesgo_ids']);
            $model->save();

            $modelCedula->status_id = 2;
            $modelCedula->save();

            return $this->redirect(['update', 'id' => $model->id]);

            //return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->tipificacion_ids =  json_decode($model->tipificacion_ids);
        $model->coorporacion_ids =  json_decode($model->coorporacion_ids);
        $model->tipoasesoria_ids = json_decode($model->tipoasesoria_ids);
        $model->zona_riesgo_ids =  json_decode($model->zona_riesgo_ids);
        $model->horario_riesgo_ids =  json_decode($model->horario_riesgo_ids);


        return $this->render('update', [
            'model' => $model,
            'modelCedula' => $modelCedula

        ]);
    }

    /**
     * Deletes an existing CedulasIdentificaciones model.
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
     * Finds the CedulasIdentificaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CedulasIdentificaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CedulasIdentificaciones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

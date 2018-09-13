<?php

namespace app\controllers;

use Yii;
use app\models\EncuestaTelefonica;
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
                        'actions' => ['index', 'update', 'delete'],
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

        return $this->render('update', [
            'model' => $model,
            'modelsTD' => (empty($modelsTD)) ? [new EncuestaTelefonicaDependencia()] : $modelsTD,

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

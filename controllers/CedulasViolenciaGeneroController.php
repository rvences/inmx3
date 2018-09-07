<?php

namespace app\controllers;

use app\models\Cedulas;
use app\models\CedulasViolenciaGeneroRuta;
use Yii;
use app\models\CedulasViolenciaGenero;
use app\models\search\CedulasViolenciaGeneroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Model;
use yii\helpers\ArrayHelper;
/**
 * CedulasViolenciaGeneroController implements the CRUD actions for CedulasViolenciaGenero model.
 */
class CedulasViolenciaGeneroController extends Controller
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
     * Lists all CedulasViolenciaGenero models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CedulasViolenciaGeneroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CedulasViolenciaGenero model.
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
     * Creates a new CedulasViolenciaGenero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $valor_cedula_temporal = 1;
        $cedula = Cedulas::find()->where(['id' => $valor_cedula_temporal])->one();

        $model = new CedulasViolenciaGenero();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->tipo_violencia_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_violencia_ids']);
            $model->tipo_modalidad_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_modalidad_ids']);
            $model->sintomatologia_emocional_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['sintomatologia_emocional_ids']);
            $model->sintomatologia_fisica_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['sintomatologia_fisica_ids']);
            $model->creencias_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['creencias_ids']);
            $model->factores_psicosociales_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['factores_psicosociales_ids']);
            $model->relacion_pareja_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relacion_pareja_ids']);
            $model->relato_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relato_ids']);
            $model->relaciones_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relaciones_sociales_ids']);
            $model->tipo_demanda_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_demanda_ids']);

            $model->save();


            return $this->redirect(['update', 'id' => $model->id]);

            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelsGR'=> (empty($modelsGR)) ? [new CedulasViolenciaGeneroRuta()] : $modelsGR,
            'modelCedula' => $cedula,
        ]);
    }

    /**
     * Updates an existing CedulasViolenciaGenero model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelCedula = Cedulas::find()->where(['id' => $model->cedula_id])->one();

        $modelsGR = $model->cedulasViolenciaGeneroRutas;

        if ($model->load(Yii::$app->request->post()) ) {
            $model->tipo_violencia_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_violencia_ids']);
            $model->tipo_modalidad_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_modalidad_ids']);
            $model->sintomatologia_emocional_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['sintomatologia_emocional_ids']);
            $model->sintomatologia_fisica_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['sintomatologia_fisica_ids']);
            $model->creencias_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['creencias_ids']);
            $model->factores_psicosociales_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['factores_psicosociales_ids']);
            $model->relacion_pareja_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relacion_pareja_ids']);
            $model->relato_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relato_ids']);
            $model->relaciones_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relaciones_sociales_ids']);
            $model->tipo_demanda_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_demanda_ids']);

            $oldIDs = ArrayHelper::map($modelsGR, 'id', 'id');
            $modelsGR = Model::createMultiple(CedulasViolenciaGeneroRuta::classname(), $modelsGR);
            Model::loadMultiple($modelsGR, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsGR, 'id', 'id')));


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsGR) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            CedulasViolenciaGeneroRuta::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsGR as $modelGR) {
                            $modelGR->cedulas_violencia_genero_id = $model->id;
                            if (! ($flag = $modelGR->save(false))) {
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

        $model->tipo_violencia_ids = json_decode($model->tipo_violencia_ids);
        $model->tipo_modalidad_ids = json_decode($model->tipo_modalidad_ids);
        $model->sintomatologia_emocional_ids = json_decode($model->sintomatologia_emocional_ids);
        $model->sintomatologia_fisica_ids = json_decode($model->sintomatologia_fisica_ids);
        $model->creencias_ids = json_decode($model->creencias_ids);
        $model->factores_psicosociales_ids = json_decode($model->factores_psicosociales_ids);
        $model->relacion_pareja_ids = json_decode($model->relacion_pareja_ids);
        $model->relato_ids = json_decode($model->relato_ids);
        $model->relaciones_sociales_ids = json_decode($model->relaciones_sociales_ids);
        $model->tipo_demanda_ids = json_decode($model->tipo_demanda_ids);

        return $this->render('update', [
            'model' => $model,
            'modelsGR' => (empty($modelsGR)) ? [new CedulasViolenciaGeneroRuta()] : $modelsGR,
            'modelCedula' => $modelCedula,
        ]);
    }

    /**
     * Deletes an existing CedulasViolenciaGenero model.
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
     * Finds the CedulasViolenciaGenero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CedulasViolenciaGenero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CedulasViolenciaGenero::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

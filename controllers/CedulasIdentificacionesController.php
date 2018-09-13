<?php

namespace app\controllers;

use app\models\Cedulas;
use app\models\CedulasDatosAgresor;
use app\models\CedulasDatosGenerales;
use app\models\CedulasDatosGeneralesHijos;
use app\models\CedulasViolenciaGenero;
use app\models\CedulasViolenciaGeneroRuta;
use app\models\EncuestaTelefonica;
use app\models\Model;
use Yii;
use app\models\CedulasIdentificaciones;
use app\models\search\CedulasIdentificacionesSearch;
use yii\helpers\ArrayHelper;
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
        $modelIdentificacion = new CedulasIdentificaciones();
        $modelDatosGenerales = new CedulasDatosGenerales();
        $modelViolenciaGenero = new CedulasViolenciaGenero();
        $modelDatosAgresor = new CedulasDatosAgresor();


        if ($modelIdentificacion->load(Yii::$app->request->post()) &&
            $modelDatosGenerales->load(Yii::$app->request->post()) &&
            $modelViolenciaGenero->load(Yii::$app->request->post()) &&
            $modelDatosAgresor->load(Yii::$app->request->post()) &&
            Model::validateMultiple([$modelIdentificacion, $modelDatosGenerales, $modelViolenciaGenero])


        ) {
            $modelIdentificacion->tipificacion_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['tipificacion_ids']);
            $modelIdentificacion->coorporacion_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['coorporacion_ids']);
            $modelIdentificacion->tipoasesoria_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['tipoasesoria_ids']);
            $modelIdentificacion->zona_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['zona_riesgo_ids']);
            $modelIdentificacion->horario_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['horario_riesgo_ids']);
            $modelIdentificacion->save(false);

            $modelDatosGenerales->cedula_id = $modelIdentificacion->cedula_id;
            $modelDatosGenerales->servicios_basicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_basicos_ids']);
            $modelDatosGenerales->ocupacion_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['ocupacion_ids']);
            $modelDatosGenerales->fuente_ingresos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['fuente_ingresos_ids']);
            $modelDatosGenerales->programas_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['programas_sociales_ids']);
            $modelDatosGenerales->servicios_medicos_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['servicios_medicos_ids']);
            $modelDatosGenerales->padece_enfermedades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_enfermedades_ids']);
            $modelDatosGenerales->autocuidado_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['autocuidado_ids']);
            $modelDatosGenerales->padece_discapacidades_ids = json_encode(Yii::$app->request->post( 'CedulasDatosGenerales' )['padece_discapacidades_ids']);
            $modelDatosGenerales->save(false);

            $modelViolenciaGenero->cedula_id = $modelIdentificacion->cedula_id;
            $modelViolenciaGenero->tipo_violencia_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_violencia_ids']);
            $modelViolenciaGenero->tipo_modalidad_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_modalidad_ids']);
            $modelViolenciaGenero->sintomatologia_emocional_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['sintomatologia_emocional_ids']);
            $modelViolenciaGenero->sintomatologia_fisica_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['sintomatologia_fisica_ids']);
            $modelViolenciaGenero->creencias_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['creencias_ids']);
            $modelViolenciaGenero->factores_psicosociales_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['factores_psicosociales_ids']);
            $modelViolenciaGenero->relacion_pareja_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relacion_pareja_ids']);
            $modelViolenciaGenero->relato_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relato_ids']);
            $modelViolenciaGenero->relaciones_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relaciones_sociales_ids']);
            $modelViolenciaGenero->tipo_demanda_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_demanda_ids']);
            $modelViolenciaGenero->save(false);

            $modelDatosAgresor->cedula_id = $modelIdentificacion->cedula_id;
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
            $modelDatosAgresor->save(false);

            $modelEncuestaTelefonica = new EncuestaTelefonica();
            $modelEncuestaTelefonica->cedula_identificacion_id = $modelIdentificacion->id;
            $modelEncuestaTelefonica->save(false);

            return $this->redirect(['update', 'id' => $modelIdentificacion->id]);
            //return $this->redirect(['view', 'id' => $modelIdentificacion->id]);
        }
        // Se genera la cedula inicial
        $modelCedula = new Cedulas();
        $modelCedula->status_id = 1;  // Creada sin utilizar
        $modelCedula->tipoatencion_id = 2;  // Telefónica
        $modelCedula->save();

        return $this->render('create', [
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
     * Updates an existing CedulasIdentificaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelIdentificacion = $this->findModel($id);
        $modelCedula = Cedulas::find()->where(['id' => $modelIdentificacion->cedula_id])->one();

        $modelDatosGenerales = CedulasDatosGenerales::find()->where(['cedula_id' => $modelIdentificacion->cedula_id])->one();
        $modelsGH = $modelDatosGenerales->cedulasDatosGeneralesHijos;
        $modelViolenciaGenero = CedulasViolenciaGenero::find()->where(['cedula_id' => $modelIdentificacion->cedula_id])->one();
        $modelsGR = $modelViolenciaGenero->cedulasViolenciaGeneroRutas;
        $modelDatosAgresor = CedulasDatosAgresor::find()->where(['cedula_id' => $modelIdentificacion->cedula_id])->one();


        if ($modelIdentificacion->load(Yii::$app->request->post()) &&
            $modelDatosGenerales->load(Yii::$app->request->post()) &&
            $modelViolenciaGenero->load(Yii::$app->request->post()) &&
            $modelDatosAgresor->load(Yii::$app->request->post()) &&
            Model::validateMultiple([$modelIdentificacion, $modelDatosGenerales, $modelViolenciaGenero])
        ) {
            $modelIdentificacion->tipificacion_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['tipificacion_ids']);
            $modelIdentificacion->coorporacion_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['coorporacion_ids']);
            $modelIdentificacion->tipoasesoria_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['tipoasesoria_ids']);
            $modelIdentificacion->zona_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['zona_riesgo_ids']);
            $modelIdentificacion->horario_riesgo_ids = json_encode(Yii::$app->request->post( 'CedulasIdentificaciones' )['horario_riesgo_ids']);
            $modelIdentificacion->save(false);

            $modelDatosGenerales->cedula_id = $modelIdentificacion->cedula_id;
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
                        foreach ($modelsGH as $modelGH) {
                            $modelGH->cedula_datos_generales_id = $modelDatosGenerales->id;
                            if (! ($flag = $modelGH->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        //return $this->redirect(['update', 'id' => $modelDatosGenerales->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            $modelDatosGenerales->save(false);

            $modelViolenciaGenero->cedula_id = $modelIdentificacion->cedula_id;
            $modelViolenciaGenero->tipo_violencia_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_violencia_ids']);
            $modelViolenciaGenero->tipo_modalidad_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_modalidad_ids']);
            $modelViolenciaGenero->sintomatologia_emocional_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['sintomatologia_emocional_ids']);
            $modelViolenciaGenero->sintomatologia_fisica_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['sintomatologia_fisica_ids']);
            $modelViolenciaGenero->creencias_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['creencias_ids']);
            $modelViolenciaGenero->factores_psicosociales_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['factores_psicosociales_ids']);
            $modelViolenciaGenero->relacion_pareja_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relacion_pareja_ids']);
            $modelViolenciaGenero->relato_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relato_ids']);
            $modelViolenciaGenero->relaciones_sociales_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['relaciones_sociales_ids']);
            $modelViolenciaGenero->tipo_demanda_ids = json_encode(Yii::$app->request->post( 'CedulasViolenciaGenero' )['tipo_demanda_ids']);
            $oldIDs = ArrayHelper::map($modelsGR, 'id', 'id');
            $modelsGR = Model::createMultiple(CedulasViolenciaGeneroRuta::classname(), $modelsGR);
            Model::loadMultiple($modelsGR, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsGR, 'id', 'id')));
            // validate all models
            $valid = $modelViolenciaGenero->validate();
            $valid = Model::validateMultiple($modelsGR) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelViolenciaGenero->save(false)) {
                        if (! empty($deletedIDs)) {
                            CedulasViolenciaGeneroRuta::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsGR as $modelGR) {
                            $modelGR->cedulas_violencia_genero_id = $modelViolenciaGenero->id;
                            if (! ($flag = $modelGR->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        //return $this->redirect(['update', 'id' => $modelViolenciaGenero->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            $modelViolenciaGenero->save(false);

            $modelDatosAgresor->cedula_id = $modelIdentificacion->cedula_id;
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
            $modelDatosAgresor->save(false);

            $modelCedula->status_id = 2;
            $modelCedula->save(false);

            return $this->redirect(['update', 'id' => $modelIdentificacion->id]);
            //return $this->redirect(['view', 'id' => $modelIdentificacion->id]);
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
        if (($modelIdentificacion = CedulasIdentificaciones::findOne($id)) !== null) {
            return $modelIdentificacion;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

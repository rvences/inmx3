<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CedulasDatosAgresorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cedulas Datos Agresors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-datos-agresor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cedulas Datos Agresor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula_id',
            'numero_agresores',
            'nombre',
            'apellidos',
            //'sexo_id',
            //'fecha_nac',
            //'edad',
            //'relacion_parentezco_id',
            //'estado_civil_id',
            //'calle',
            //'no_int',
            //'no_ext',
            //'colonia_id',
            //'colonia_nueva',
            //'colonia_foranea',
            //'localidad',
            //'municipio',
            //'entidad_id',
            //'nacionalidad_id',
            //'lugar_nacimiento',
            //'religion_id',
            //'vivienda_id',
            //'servicios_basicos_ids',
            //'nivel_estudio_id',
            //'status_estudio_id',
            //'idioma',
            //'ocupacion_ids',
            //'fuente_ingresos_ids',
            //'ingreso_mensual',
            //'servidor_publico',
            //'servidor_publico_cargo',
            //'servidor_publico_institucion',
            //'programas_sociales_ids',
            //'servicios_medicos_ids',
            //'padece_discapacidades_ids',
            //'droga_agresion_id',
            //'frecuencia_agresion_id',
            //'arma_agresor_id',
            //'lugar_violencia_id',
            //'lesion_fisica_ids',
            //'lesion_agente_ids',
            //'lesion_area_ids',
            //'danos_psicologicos_ids',
            //'danos_economicos_ids',
            //'indicador_riesgo_ids',
            //'victima_canalizada',
            //'tipo_canalizacion_id',
            //'tipo_seguimiento_ids',
            //'requiere_orden_proteccion',
            //'informo_proteccion_utilizar',
            //'fuero_federal',
            //'solicita_informacion_proteccion',
            //'banesvim',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

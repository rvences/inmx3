<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CedulasDatosGeneralesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cedulas Datos Generales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-datos-generales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cedulas Datos Generales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula_id',
            'edad',
            'fecha_nac',
            'grupo_etnico',
            //'no_hijos',
            //'vive_hijos',
            //'edad_primer_embarazo',
            //'embarazo_violencia',
            //'madre_soltera',
            //'madre_soltera_apartir_de_id',
            //'embarazada_actualmente',
            //'meses_embarazo',
            //'violencia_obstetrica',
            //'violencia_obstetrica_institucion',
            //'denuncio',
            //'no_gestaciones',
            //'mortalidad_hijo',
            //'mortalidad_hijo_edad',
            //'mortalidad_hijo_sexo_id',
            //'observaciones:ntext',
            //'estado_civil_id',
            //'convivencia_id',
            //'vivienda_id',
            //'servicios_basicos_ids',
            //'nivel_estudio_id',
            //'status_estudio_id',
            //'ocupacion_ids',
            //'fuente_ingresos_ids',
            //'numero_jornadas',
            //'numero_ingresos',
            //'horas_labor_hogar',
            //'horas_cuidado_otros',
            //'horas_trabajo',
            //'horas_recreacion',
            //'horas_autocuidado',
            //'horas_descanso',
            //'horas_autoempleo',
            //'ingreso_mensual',
            //'quien_administra_dinero',
            //'servidor_publico',
            //'servidor_publico_cargo',
            //'servidor_publico_institucion',
            //'programas_sociales_ids',
            //'servicios_medicos_ids',
            //'padece_enfermedades_ids',
            //'autocuidado',
            //'autocuidado_ids',
            //'padece_discapacidades_ids',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

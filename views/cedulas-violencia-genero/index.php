<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CedulasViolenciaGeneroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cedulas Violencia Generos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-violencia-genero-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cedulas Violencia Genero', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula_id',
            'tipo_victima',
            'tipo_violencia_ids',
            'tipo_modalidad_ids',
            //'lugar_violencia_id',
            //'domicilio_victima',
            //'calle',
            //'no_int',
            //'no_ext',
            //'colonia_id',
            //'colonia_nueva',
            //'colonia_foranea',
            //'localidad',
            //'municipio',
            //'entidad_id',
            //'observaciones:ntext',
            //'consume_alcohol',
            //'penso_suicidarse',
            //'intento_suicidarse',
            //'hospitalizada_anteriormente',
            //'requiere_hospitalizacion',
            //'vigilancia_agresor',
            //'llamadas_libremente',
            //'visitas_libremente',
            //'recibio_amenazas',
            //'vive_agresor',
            //'vive_familia_agresor',
            //'vive_cerca_agresor',
            //'abandono_casa',
            //'lugar_vivir',
            //'evaluacion_psicologica:ntext',
            //'tiempo_agresion_servicio',
            //'lugar_agresion',
            //'solicito_ayuda',
            //'tipo_atencion',
            //'aplicaron_nom046',
            //'horas_despues_agresion',
            //'explicaron_derechos',
            //'institucion_atendio',
            //'sintomatologia_emocional_ids',
            //'sintomatologia_fisica_ids',
            //'creencias_ids',
            //'factores_psicosociales_ids',
            //'relacion_pareja_ids',
            //'tiempo_convivencia_anios',
            //'tiempo_convivencia_meses',
            //'adaptacion_psicologica',
            //'agresiones_previas',
            //'autonomia',
            //'relato_ids',
            //'relaciones_sociales_ids',
            //'tratamiento:ntext',
            //'tipo_demanda_ids',
            //'relato_juridico:ntext',
            //'situacion_problematica:ntext',
            //'procedimiento_legal:ntext',
            //'alcance_resultados:ntext',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

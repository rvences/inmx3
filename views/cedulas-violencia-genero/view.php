<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasViolenciaGenero */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Violencia Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-violencia-genero-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cedula_id',
            'tipo_victima',
            'tipo_violencia_ids',
            'tipo_modalidad_ids',
            'lugar_violencia_id',
            'domicilio_victima',
            'calle',
            'no_int',
            'no_ext',
            'colonia_id',
            'colonia_nueva',
            'colonia_foranea',
            'localidad',
            'municipio',
            'entidad_id',
            'observaciones:ntext',
            'consume_alcohol',
            'penso_suicidarse',
            'intento_suicidarse',
            'hospitalizada_anteriormente',
            'requiere_hospitalizacion',
            'vigilancia_agresor',
            'llamadas_libremente',
            'visitas_libremente',
            'recibio_amenazas',
            'vive_agresor',
            'vive_familia_agresor',
            'vive_cerca_agresor',
            'abandono_casa',
            'lugar_vivir',
            'evaluacion_psicologica:ntext',
            'tiempo_agresion_servicio',
            'lugar_agresion',
            'solicito_ayuda',
            'tipo_atencion',
            'aplicaron_nom046',
            'horas_despues_agresion',
            'explicaron_derechos',
            'institucion_atendio',
            'sintomatologia_emocional_ids',
            'sintomatologia_fisica_ids',
            'creencias_ids',
            'factores_psicosociales_ids',
            'relacion_pareja_ids',
            'tiempo_convivencia_anios',
            'tiempo_convivencia_meses',
            'adaptacion_psicologica',
            'agresiones_previas',
            'autonomia',
            'relato_ids',
            'relaciones_sociales_ids',
            'tratamiento:ntext',
            'tipo_demanda_ids',
            'relato_juridico:ntext',
            'situacion_problematica:ntext',
            'procedimiento_legal:ntext',
            'alcance_resultados:ntext',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasDatosGenerales */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Datos Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-datos-generales-view">

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
            'edad',
            'fecha_nac',
            'grupo_etnico',
            'no_hijos',
            'vive_hijos',
            'edad_primer_embarazo',
            'embarazo_violencia',
            'madre_soltera',
            'madre_soltera_apartir_de_id',
            'embarazada_actualmente',
            'meses_embarazo',
            'violencia_obstetrica',
            'violencia_obstetrica_institucion',
            'denuncio',
            'no_gestaciones',
            'mortalidad_hijo',
            'mortalidad_hijo_edad',
            'mortalidad_hijo_sexo_id',
            'observaciones:ntext',
            'estado_civil_id',
            'convivencia_id',
            'vivienda_id',
            'servicios_basicos_ids',
            'nivel_estudio_id',
            'status_estudio_id',
            'ocupacion_ids',
            'fuente_ingresos_ids',
            'numero_jornadas',
            'numero_ingresos',
            'horas_labor_hogar',
            'horas_cuidado_otros',
            'horas_trabajo',
            'horas_recreacion',
            'horas_autocuidado',
            'horas_descanso',
            'horas_autoempleo',
            'ingreso_mensual',
            'quien_administra_dinero',
            'servidor_publico',
            'servidor_publico_cargo',
            'servidor_publico_institucion',
            'programas_sociales_ids',
            'servicios_medicos_ids',
            'padece_enfermedades_ids',
            'autocuidado',
            'autocuidado_ids',
            'padece_discapacidades_ids',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>

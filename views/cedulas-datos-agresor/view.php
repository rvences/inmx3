<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasDatosAgresor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Datos Agresors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-datos-agresor-view">

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
            'numero_agresores',
            'nombre',
            'apellidos',
            'sexo_id',
            'fecha_nac',
            'edad',
            'relacion_parentezco_id',
            'estado_civil_id',
            'calle',
            'no_int',
            'no_ext',
            'colonia_id',
            'colonia_nueva',
            'colonia_foranea',
            'localidad',
            'municipio',
            'entidad_id',
            'nacionalidad_id',
            'lugar_nacimiento',
            'religion_id',
            'vivienda_id',
            'servicios_basicos_ids',
            'nivel_estudio_id',
            'status_estudio_id',
            'idioma',
            'ocupacion_ids',
            'fuente_ingresos_ids',
            'ingreso_mensual',
            'servidor_publico',
            'servidor_publico_cargo',
            'servidor_publico_institucion',
            'programas_sociales_ids',
            'servicios_medicos_ids',
            'padece_discapacidades_ids',
            'droga_agresion_id',
            'frecuencia_agresion_id',
            'arma_agresor_id',
            'lugar_violencia_id',
            'lesion_fisica_ids',
            'lesion_agente_ids',
            'lesion_area_ids',
            'danos_psicologicos_ids',
            'danos_economicos_ids',
            'indicador_riesgo_ids',
            'victima_canalizada',
            'tipo_canalizacion_id',
            'tipo_seguimiento_ids',
            'requiere_orden_proteccion',
            'informo_proteccion_utilizar',
            'fuero_federal',
            'solicita_informacion_proteccion',
            'banesvim',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>

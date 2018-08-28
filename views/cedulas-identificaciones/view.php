<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasIdentificaciones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Identificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-identificaciones-view">

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
            'tel_llamada',
            'created_at',
            'hora_inicio',
            'hora_termino',
            'fecha_ult_incidente',
            'tipo_llamada_id',
            'tipificacion_id',
            'tipo_emergencia_id',
            'coorporacion_id',
            'institucion_id',
            'tipoasesoria_ids',
            'sexo_id',
            'nombre',
            'apaterno',
            'amaterno',
            'calle',
            'domicilio',
            'no_int',
            'no_ext',
            'colonia_id',
            'localidad',
            'municipio',
            'entidad_id',
            'zona',
            'congregacion_id',
            'religion_id',
            'nacionalidad_id',
            'zona_riesgo_ids',
            'horario_riesgo_ids',
            'tipo_riesgo_ids',
            'lugar_nacimiento',
            'violencia_pareja_anterior',
            'created_by',
            'contacto_emergencia1',
            'tel_emergencia1',
            'contacto_emergencia2',
            'tel_emergencia2',
            'situacion_desencadenante:ntext',
            'menor_18',
            'nombre_tutela',
            'relacion_parentezco_id',
            'tel_tutela',
            'direccion_tutela',
            'observaciones:ntext',
            'entero_servicio_id',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>

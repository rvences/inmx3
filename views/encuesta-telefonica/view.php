<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EncuestaTelefonica */

$this->title = $model->id;
?>
<div class="encuesta-telefonica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que quiere el registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cedula_identificacion_id',
            'asesoria_correcta',
            'asesoria_correcta_info:ntext',
            'atencion_correcta_id',
            'atencion_correcta_info:ntext',
            'volver_llamar',
            'volver_llamar_info:ntext',
            'recomienda_linea',
            'recomienda_linea_info:ntext',
            'como_entero:ntext',
            'ayuda_adicional',
            'observaciones:ntext',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>

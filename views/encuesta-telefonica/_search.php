<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EncuestaTelefonicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuesta-telefonica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_identificacion_id') ?>

    <?= $form->field($model, 'asesoria_correcta') ?>

    <?= $form->field($model, 'asesoria_correcta_info') ?>

    <?= $form->field($model, 'atencion_correcta') ?>

    <?php // echo $form->field($model, 'atencion_correcta_info') ?>

    <?php // echo $form->field($model, 'volver_llamar') ?>

    <?php // echo $form->field($model, 'volver_llamar_info') ?>

    <?php // echo $form->field($model, 'recomienda_linea') ?>

    <?php // echo $form->field($model, 'recomienda_linea_info') ?>

    <?php // echo $form->field($model, 'como_entero') ?>

    <?php // echo $form->field($model, 'ayuda_adicional') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

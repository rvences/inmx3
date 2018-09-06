<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CedulasIdentificacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-identificaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'tel_llamada') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'hora_inicio') ?>

    <?php // echo $form->field($model, 'hora_termino') ?>

    <?php // echo $form->field($model, 'fecha_ult_incidente') ?>

    <?php // echo $form->field($model, 'tipo_llamada_id') ?>

    <?php // echo $form->field($model, 'tipificacion_ids') ?>

    <?php // echo $form->field($model, 'tipo_emergencia_id') ?>

    <?php // echo $form->field($model, 'coorporacion_ids') ?>

    <?php // echo $form->field($model, 'institucion_id') ?>

    <?php // echo $form->field($model, 'tipoasesoria_ids') ?>

    <?php // echo $form->field($model, 'sexo_id') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'apaterno') ?>

    <?php // echo $form->field($model, 'amaterno') ?>

    <?php // echo $form->field($model, 'calle') ?>

    <?php // echo $form->field($model, 'no_int') ?>

    <?php // echo $form->field($model, 'no_ext') ?>

    <?php // echo $form->field($model, 'colonia_id') ?>

    <?php // echo $form->field($model, 'colonia_nueva') ?>

    <?php // echo $form->field($model, 'colonia_foranea') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'entidad_id') ?>

    <?php // echo $form->field($model, 'zona_id') ?>

    <?php // echo $form->field($model, 'congregacion_id') ?>

    <?php // echo $form->field($model, 'religion_id') ?>

    <?php // echo $form->field($model, 'nacionalidad_id') ?>

    <?php // echo $form->field($model, 'zona_riesgo_ids') ?>

    <?php // echo $form->field($model, 'horario_riesgo_ids') ?>

    <?php // echo $form->field($model, 'nivel_riesgo_id') ?>

    <?php // echo $form->field($model, 'lugar_nacimiento') ?>

    <?php // echo $form->field($model, 'violencia_pareja_anterior') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'contacto_emergencia1') ?>

    <?php // echo $form->field($model, 'tel_emergencia1') ?>

    <?php // echo $form->field($model, 'contacto_emergencia2') ?>

    <?php // echo $form->field($model, 'tel_emergencia2') ?>

    <?php // echo $form->field($model, 'situacion_desencadenante') ?>

    <?php // echo $form->field($model, 'menor_18') ?>

    <?php // echo $form->field($model, 'nombre_tutela') ?>

    <?php // echo $form->field($model, 'relacion_parentezco_id') ?>

    <?php // echo $form->field($model, 'tel_tutela') ?>

    <?php // echo $form->field($model, 'direccion_tutela') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CedulasDatosGeneralesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-datos-generales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'edad') ?>

    <?= $form->field($model, 'fecha_nac') ?>

    <?= $form->field($model, 'grupo_etnico') ?>

    <?php // echo $form->field($model, 'no_hijos') ?>

    <?php // echo $form->field($model, 'vive_hijos') ?>

    <?php // echo $form->field($model, 'edad_primer_embarazo') ?>

    <?php // echo $form->field($model, 'embarazo_violencia') ?>

    <?php // echo $form->field($model, 'madre_soltera') ?>

    <?php // echo $form->field($model, 'madre_soltera_apartir_de_id') ?>

    <?php // echo $form->field($model, 'embarazada_actualmente') ?>

    <?php // echo $form->field($model, 'meses_embarazo') ?>

    <?php // echo $form->field($model, 'violencia_obstetrica') ?>

    <?php // echo $form->field($model, 'violencia_obstetrica_institucion') ?>

    <?php // echo $form->field($model, 'denuncio') ?>

    <?php // echo $form->field($model, 'no_gestaciones') ?>

    <?php // echo $form->field($model, 'mortalidad_hijo') ?>

    <?php // echo $form->field($model, 'mortalidad_hijo_edad') ?>

    <?php // echo $form->field($model, 'mortalidad_hijo_sexo_id') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'estado_civil_id') ?>

    <?php // echo $form->field($model, 'convivencia_id') ?>

    <?php // echo $form->field($model, 'vivienda_id') ?>

    <?php // echo $form->field($model, 'servicios_basicos_ids') ?>

    <?php // echo $form->field($model, 'nivel_estudio_id') ?>

    <?php // echo $form->field($model, 'status_estudio_id') ?>

    <?php // echo $form->field($model, 'ocupacion_ids') ?>

    <?php // echo $form->field($model, 'fuente_ingresos_ids') ?>

    <?php // echo $form->field($model, 'numero_jornadas') ?>

    <?php // echo $form->field($model, 'numero_ingresos') ?>

    <?php // echo $form->field($model, 'horas_labor_hogar') ?>

    <?php // echo $form->field($model, 'horas_cuidado_otros') ?>

    <?php // echo $form->field($model, 'horas_trabajo') ?>

    <?php // echo $form->field($model, 'horas_recreacion') ?>

    <?php // echo $form->field($model, 'horas_autocuidado') ?>

    <?php // echo $form->field($model, 'horas_descanso') ?>

    <?php // echo $form->field($model, 'horas_autoempleo') ?>

    <?php // echo $form->field($model, 'ingreso_mensual') ?>

    <?php // echo $form->field($model, 'quien_administra_dinero') ?>

    <?php // echo $form->field($model, 'servidor_publico') ?>

    <?php // echo $form->field($model, 'servidor_publico_cargo') ?>

    <?php // echo $form->field($model, 'servidor_publico_institucion') ?>

    <?php // echo $form->field($model, 'programas_sociales_ids') ?>

    <?php // echo $form->field($model, 'servicios_medicos_ids') ?>

    <?php // echo $form->field($model, 'padece_enfermedades_ids') ?>

    <?php // echo $form->field($model, 'autocuidado') ?>

    <?php // echo $form->field($model, 'autocuidado_ids') ?>

    <?php // echo $form->field($model, 'padece_discapacidades_ids') ?>

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

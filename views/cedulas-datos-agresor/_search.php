<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CedulasDatosAgresorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-datos-agresor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'numero_agresores') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellidos') ?>

    <?php // echo $form->field($model, 'sexo_id') ?>

    <?php // echo $form->field($model, 'fecha_nac') ?>

    <?php // echo $form->field($model, 'edad') ?>

    <?php // echo $form->field($model, 'relacion_parentezco_id') ?>

    <?php // echo $form->field($model, 'estado_civil_id') ?>

    <?php // echo $form->field($model, 'calle') ?>

    <?php // echo $form->field($model, 'no_int') ?>

    <?php // echo $form->field($model, 'no_ext') ?>

    <?php // echo $form->field($model, 'colonia_id') ?>

    <?php // echo $form->field($model, 'colonia_nueva') ?>

    <?php // echo $form->field($model, 'colonia_foranea') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'entidad_id') ?>

    <?php // echo $form->field($model, 'nacionalidad_id') ?>

    <?php // echo $form->field($model, 'lugar_nacimiento') ?>

    <?php // echo $form->field($model, 'religion_id') ?>

    <?php // echo $form->field($model, 'vivienda_id') ?>

    <?php // echo $form->field($model, 'servicios_basicos_ids') ?>

    <?php // echo $form->field($model, 'nivel_estudio_id') ?>

    <?php // echo $form->field($model, 'status_estudio_id') ?>

    <?php // echo $form->field($model, 'idioma') ?>

    <?php // echo $form->field($model, 'ocupacion_ids') ?>

    <?php // echo $form->field($model, 'fuente_ingresos_ids') ?>

    <?php // echo $form->field($model, 'ingreso_mensual') ?>

    <?php // echo $form->field($model, 'servidor_publico') ?>

    <?php // echo $form->field($model, 'servidor_publico_cargo') ?>

    <?php // echo $form->field($model, 'servidor_publico_institucion') ?>

    <?php // echo $form->field($model, 'programas_sociales_ids') ?>

    <?php // echo $form->field($model, 'servicios_medicos_ids') ?>

    <?php // echo $form->field($model, 'padece_discapacidades_ids') ?>

    <?php // echo $form->field($model, 'droga_agresion_id') ?>

    <?php // echo $form->field($model, 'frecuencia_agresion_id') ?>

    <?php // echo $form->field($model, 'arma_agresor_id') ?>

    <?php // echo $form->field($model, 'lugar_violencia_id') ?>

    <?php // echo $form->field($model, 'lesion_fisica_ids') ?>

    <?php // echo $form->field($model, 'lesion_agente_ids') ?>

    <?php // echo $form->field($model, 'lesion_area_ids') ?>

    <?php // echo $form->field($model, 'danos_psicologicos_ids') ?>

    <?php // echo $form->field($model, 'danos_economicos_ids') ?>

    <?php // echo $form->field($model, 'indicador_riesgo_ids') ?>

    <?php // echo $form->field($model, 'victima_canalizada') ?>

    <?php // echo $form->field($model, 'tipo_canalizacion_id') ?>

    <?php // echo $form->field($model, 'tipo_seguimiento_ids') ?>

    <?php // echo $form->field($model, 'requiere_orden_proteccion') ?>

    <?php // echo $form->field($model, 'informo_proteccion_utilizar') ?>

    <?php // echo $form->field($model, 'fuero_federal') ?>

    <?php // echo $form->field($model, 'solicita_informacion_proteccion') ?>

    <?php // echo $form->field($model, 'banesvim') ?>

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

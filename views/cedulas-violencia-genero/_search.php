<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CedulasViolenciaGeneroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-violencia-genero-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'tipo_victima') ?>

    <?= $form->field($model, 'tipo_violencia_ids') ?>

    <?= $form->field($model, 'tipo_modalidad_ids') ?>

    <?php // echo $form->field($model, 'lugar_violencia_id') ?>

    <?php // echo $form->field($model, 'domicilio_victima') ?>

    <?php // echo $form->field($model, 'calle') ?>

    <?php // echo $form->field($model, 'no_int') ?>

    <?php // echo $form->field($model, 'no_ext') ?>

    <?php // echo $form->field($model, 'colonia_id') ?>

    <?php // echo $form->field($model, 'colonia_nueva') ?>

    <?php // echo $form->field($model, 'colonia_foranea') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'entidad_id') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'consume_alcohol') ?>

    <?php // echo $form->field($model, 'penso_suicidarse') ?>

    <?php // echo $form->field($model, 'intento_suicidarse') ?>

    <?php // echo $form->field($model, 'hospitalizada_anteriormente') ?>

    <?php // echo $form->field($model, 'requiere_hospitalizacion') ?>

    <?php // echo $form->field($model, 'vigilancia_agresor') ?>

    <?php // echo $form->field($model, 'llamadas_libremente') ?>

    <?php // echo $form->field($model, 'visitas_libremente') ?>

    <?php // echo $form->field($model, 'recibio_amenazas') ?>

    <?php // echo $form->field($model, 'vive_agresor') ?>

    <?php // echo $form->field($model, 'vive_familia_agresor') ?>

    <?php // echo $form->field($model, 'vive_cerca_agresor') ?>

    <?php // echo $form->field($model, 'abandono_casa') ?>

    <?php // echo $form->field($model, 'lugar_vivir') ?>

    <?php // echo $form->field($model, 'evaluacion_psicologica') ?>

    <?php // echo $form->field($model, 'tiempo_agresion_servicio') ?>

    <?php // echo $form->field($model, 'lugar_agresion') ?>

    <?php // echo $form->field($model, 'solicito_ayuda') ?>

    <?php // echo $form->field($model, 'tipo_atencion') ?>

    <?php // echo $form->field($model, 'aplicaron_nom046') ?>

    <?php // echo $form->field($model, 'horas_despues_agresion') ?>

    <?php // echo $form->field($model, 'explicaron_derechos') ?>

    <?php // echo $form->field($model, 'institucion_atendio') ?>

    <?php // echo $form->field($model, 'sintomatologia_emocional_ids') ?>

    <?php // echo $form->field($model, 'sintomatologia_fisica_ids') ?>

    <?php // echo $form->field($model, 'creencias_ids') ?>

    <?php // echo $form->field($model, 'factores_psicosociales_ids') ?>

    <?php // echo $form->field($model, 'relacion_pareja_ids') ?>

    <?php // echo $form->field($model, 'tiempo_convivencia_anios') ?>

    <?php // echo $form->field($model, 'tiempo_convivencia_meses') ?>

    <?php // echo $form->field($model, 'adaptacion_psicologica') ?>

    <?php // echo $form->field($model, 'agresiones_previas') ?>

    <?php // echo $form->field($model, 'autonomia') ?>

    <?php // echo $form->field($model, 'relato_ids') ?>

    <?php // echo $form->field($model, 'relaciones_sociales_ids') ?>

    <?php // echo $form->field($model, 'tratamiento') ?>

    <?php // echo $form->field($model, 'tipo_demanda_ids') ?>

    <?php // echo $form->field($model, 'relato_juridico') ?>

    <?php // echo $form->field($model, 'situacion_problematica') ?>

    <?php // echo $form->field($model, 'procedimiento_legal') ?>

    <?php // echo $form->field($model, 'alcance_resultados') ?>

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

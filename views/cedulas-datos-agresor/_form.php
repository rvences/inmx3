<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasDatosAgresor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-datos-agresor-form">

    <?php $form = ActiveForm::begin();
    echo $form->errorSummary([$model]);
    ?>

    <?php
    /*
    <?= $form->field($model, 'cedula_id')->textInput() ?>
    <?= $form->field($model, 'created_at')->textInput() ?>
    <?= $form->field($model, 'created_by')->textInput() ?>
    <?= $form->field($model, 'updated_at')->textInput() ?>
    <?= $form->field($model, 'updated_by')->textInput() ?>
     */
    ?>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'numero_agresores')->textInput(['maxlength' => true, 'placeholder' => 'Núm de agresores'])->label(false) ?>
        </div>
        <div class="col-md-3"><p>Del principal agresor especifique </p></div>
        <div class="col-md-2">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true, 'placeholder' => 'Apellidos'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?php
            echo $form->field($model, 'sexo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csexos::find()->all(), 'id', 'sexo'),
                'options' => ['placeholder' => 'Sexo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'fecha_nac')->widget(DatePicker::className(), [
                'name' => 'Fecha de Nacimiento',
                'language'=> 'es',
                'options' => ['placeholder' => 'Fecha de Nacimiento dd-mm-aaaa...'],
                'pluginOptions' => [
                    'orientation' => 'bottom left',

                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ])->label(false);
            ?>
        </div>
        <div class ="col-md-2">
            <?= $form->field($model, 'edad')->textInput(['maxlength' => true, 'placeholder' => 'Edad'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'relacion_parentezco_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Crelacioparentezco::find()->all(), 'id', 'relacion_parentezco'),
                'options' => ['placeholder' => 'Parentezco ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'estado_civil_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CestadosCiviles::find()->all(), 'id', 'estado_civil'),
                'options' => ['placeholder' => 'Estado Civil ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'calle')->textInput(['maxlength' => true, 'placeholder'=> 'Calle'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'no_int')->textInput(['maxlength' => true, 'placeholder'=> 'No. Interior'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'no_ext')->textInput(['maxlength' => true, 'placeholder'=> 'No. Exterior'])->label(false) ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $form->field($model, 'colonia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccolonias::find()->all(), 'id', function($model) {
                    return $model['colonia'].' > '.$model['delegacion'] . ' > ' . $model['cp'];
                }),
                'options' => ['placeholder' => 'Colonia - Delegación - Código Postal ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'localidad')->textInput(['maxlength' => true, 'placeholder'=> 'Localidad'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'municipio')->textInput(['maxlength' => true, 'placeholder'=> 'Municipio'])->label(false) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'colonia_nueva')->textInput(['maxlength' => true, 'placeholder'=> 'Colonia Nueva'])->label(false) ?>
            <?= $form->field($model, 'colonia_foranea')->textInput(['maxlength' => true, 'placeholder'=> 'Colonia Foránea'])->label(false) ?>

        </div>

    </div>

    <div class="row">
        <div class="col-md-2">
            <?php
            echo $form->field($model, 'entidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Centidadesfederativas::find()->all(), 'id', 'entidad'),
                'options' => ['placeholder' => 'Estado ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($model, 'nacionalidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cnacionalidades::find()->all(), 'id', 'nacionalidad'),
                'options' => ['placeholder' => 'Nacionalidad ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'lugar_nacimiento')->textInput(['maxlength' => true, 'placeholder'=> 'Lugar nacimiento'])->label(false) ?>
        </div>



        <div class="col-md-2">
            <?php
            echo $form->field($model, 'religion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Creligiones::find()->all(), 'id', 'religion'),
                'options' => ['placeholder' => 'Religión ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($model, 'vivienda_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CtiposViviendas::find()->all(), 'id', 'tipo_vivienda'),
                'options' => ['placeholder' => 'Vivienda ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'servicios_basicos_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CserviciosBasicos::find()->all(), 'id', 'servicio_basico'),
                'options' => [
                    'placeholder' => 'Selecciona los Servicios básicos ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'nivel_estudio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CnivelesEstudios::find()->all(), 'id', 'nivel_estudio'),
                'options' => ['placeholder' => 'Nivel de estudios ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($model, 'status_estudio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CstatusEstudios::find()->all(), 'id', 'status_estudio'),
                'options' => ['placeholder' => 'Estatus de estudios ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'idioma')->textInput(['maxlength' => true, 'placeholder'=> 'Idioma'])->label(false) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-5">
            <?php
            echo $form->field($model, 'ocupacion_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cocupaciones::find()->all(), 'id', 'ocupacion'),
                'options' => [
                    'placeholder' => 'Selecciona las Ocupaciones ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-5">
            <?php
            echo $form->field($model, 'fuente_ingresos_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CfuentesIngresos::find()->all(), 'id', 'fuente_ingresos'),
                'options' => [
                    'placeholder' => 'Selecciona las fuentes de ingresos ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'ingreso_mensual')->textInput(['maxlength' => true, 'placeholder'=> 'Ingreso mensual'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se desconoce'];
            echo $form->field($model, 'servidor_publico')->radioButtonGroup($data);
            ?>
        </div>

        <div class ="col-md-4">
            <?= $form->field($model, 'servidor_publico_cargo')->textInput(['maxlength' => true, 'placeholder' => 'Cargo de servidor público'])->label(false) ?>
        </div>
        <div class ="col-md-4">
            <?= $form->field($model, 'servidor_publico_institucion')->textInput(['maxlength' => true, 'placeholder' => 'Institución'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'programas_sociales_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cprogramassociales::find()->all(), 'id', 'programa_social'),
                'options' => [
                    'placeholder' => 'Selecciona programas sociales ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($model, 'servicios_medicos_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cserviciosmedicos::find()->all(), 'id', 'servicio_medico'),
                'options' => [
                    'placeholder' => 'Selecciona servicio médico ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($model, 'padece_discapacidades_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cdiscapacidades::find()->all(), 'id', 'discapacidad'),
                'options' => [
                    'placeholder' => 'Selecciona discapacidades que padece ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'droga_agresion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CdrogasAgresiones::find()->all(), 'id', 'droga_agresion'),
                'options' => ['placeholder' => 'Droga en la agresión ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'frecuencia_agresion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CfrecuenciasAgresiones::find()->all(), 'id', 'frecuencia_agresion'),
                'options' => ['placeholder' => 'Frecuencia de la agresión ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'arma_agresor_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CarmasAgresores::find()->all(), 'id', 'arma_agresor'),
                'options' => ['placeholder' => 'Arma en la agresión ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($model, 'lugar_violencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\ClugaresViolencias::find()->all(), 'id', 'lugar_violencia'),
                'options' => ['placeholder' => 'Lugar de la violencia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'lesion_fisica_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\ClesionesFisicas::find()->all(), 'id', 'lesion_fisica'),
                'options' => [
                    'placeholder' => 'Selecciona lesiones físicas ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($model, 'lesion_agente_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\ClesionesAgentes::find()->all(), 'id', 'lesion_agente'),
                'options' => [
                    'placeholder' => 'Selecciona agente de lesión ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($model, 'lesion_area_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CareasLesionadas::find()->all(), 'id', 'area_lesionada'),
                'options' => [
                    'placeholder' => 'Selecciona áreas lesionadas ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'danos_psicologicos_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CdanosPsicologicos::find()->all(), 'id', 'dano_psicologico'),
                'options' => [
                    'placeholder' => 'Selecciona daños psicológicos ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($model, 'danos_economicos_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CdanosEconomicos::find()->all(), 'id', 'dano_economico'),
                'options' => [
                    'placeholder' => 'Selecciona daños económicos ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($model, 'indicador_riesgo_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CindicadoresRiesgos::find()->all(), 'id', 'indicador_riesgo'),
                'options' => [
                    'placeholder' => 'Selecciona indicadores de riesgo ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'victima_canalizada')->radioButtonGroup($data);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($model, 'tipo_canalizacion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CtiposCanalizaciones::find()->all(), 'id', 'tipo_canalizacion'),
                'options' => ['placeholder' => 'Tipo de Canalización ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'tipo_seguimiento_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CtiposSeguimientos::find()->all(), 'id', 'tipo_seguimiento'),
                'options' => [
                    'placeholder' => 'Selecciona el tipo de seguimiento ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'requiere_orden_proteccion')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-7">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'informo_proteccion_utilizar')->radioButtonGroup($data);
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'fuero_federal')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'solicita_informacion_proteccion')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'banesvim')->textInput(['maxlength' => true, 'placeholder'=> 'Folio BANESVIM'])->label(false) ?>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $modelDatosAgresor app\models\CedulasDatosAgresor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-datos-agresor-form">

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($modelDatosAgresor, 'numero_agresores')->textInput(['maxlength' => true, 'placeholder' => 'Núm de agresores'])->label(false) ?>
        </div>
        <div class="col-md-3"><p>Del principal agresor especifique </p></div>
        <div class="col-md-2">
            <?= $form->field($modelDatosAgresor, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelDatosAgresor, 'apellidos')->textInput(['maxlength' => true, 'placeholder' => 'Apellidos'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosAgresor, 'sexo_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'fecha_nac')->widget(DatePicker::className(), [
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
            <?= $form->field($modelDatosAgresor, 'edad')->textInput(['maxlength' => true, 'placeholder' => 'Edad'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($modelDatosAgresor, 'relacion_parentezco_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'estado_civil_id')->widget(Select2::classname(), [
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
            <?= $form->field($modelDatosAgresor, 'calle')->textInput(['maxlength' => true, 'placeholder'=> 'Calle'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelDatosAgresor, 'no_int')->textInput(['maxlength' => true, 'placeholder'=> 'No. Interior'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelDatosAgresor, 'no_ext')->textInput(['maxlength' => true, 'placeholder'=> 'No. Exterior'])->label(false) ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $form->field($modelDatosAgresor, 'colonia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccolonias::find()->all(), 'id', function($modelDatosAgresor) {
                    return $modelDatosAgresor['colonia'].' > '.$modelDatosAgresor['delegacion'] . ' > ' . $modelDatosAgresor['cp'];
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
            <?= $form->field($modelDatosAgresor, 'localidad')->textInput(['maxlength' => true, 'placeholder'=> 'Localidad'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelDatosAgresor, 'municipio')->textInput(['maxlength' => true, 'placeholder'=> 'Municipio'])->label(false) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($modelDatosAgresor, 'colonia_nueva')->textInput(['maxlength' => true, 'placeholder'=> 'Colonia Nueva'])->label(false) ?>
            <?= $form->field($modelDatosAgresor, 'colonia_foranea')->textInput(['maxlength' => true, 'placeholder'=> 'Colonia Foránea'])->label(false) ?>

        </div>

    </div>

    <div class="row">
        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosAgresor, 'entidad_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'nacionalidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cnacionalidades::find()->all(), 'id', 'nacionalidad'),
                'options' => ['placeholder' => 'Nacionalidad ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($modelDatosAgresor, 'lugar_nacimiento')->textInput(['maxlength' => true, 'placeholder'=> 'Lugar nacimiento'])->label(false) ?>
        </div>



        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosAgresor, 'religion_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'vivienda_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'servicios_basicos_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'nivel_estudio_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'status_estudio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CstatusEstudios::find()->all(), 'id', 'status_estudio'),
                'options' => ['placeholder' => 'Estatus de estudios ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($modelDatosAgresor, 'idioma')->textInput(['maxlength' => true, 'placeholder'=> 'Idioma'])->label(false) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-5">
            <?php
            echo $form->field($modelDatosAgresor, 'ocupacion_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'fuente_ingresos_ids')->widget(Select2::classname(), [
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
            <?= $form->field($modelDatosAgresor, 'ingreso_mensual')->textInput(['maxlength' => true, 'placeholder'=> 'Ingreso mensual'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se desconoce'];
            echo $form->field($modelDatosAgresor, 'servidor_publico')->radioButtonGroup($data);
            ?>
        </div>

        <div class ="col-md-4">
            <?= $form->field($modelDatosAgresor, 'servidor_publico_cargo')->textInput(['maxlength' => true, 'placeholder' => 'Cargo de servidor público'])->label(false) ?>
        </div>
        <div class ="col-md-4">
            <?= $form->field($modelDatosAgresor, 'servidor_publico_institucion')->textInput(['maxlength' => true, 'placeholder' => 'Institución'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosAgresor, 'programas_sociales_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'servicios_medicos_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'padece_discapacidades_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'droga_agresion_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'frecuencia_agresion_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'arma_agresor_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'lugar_violencia_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'lesion_fisica_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'lesion_agente_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'lesion_area_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'danos_psicologicos_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'danos_economicos_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'indicador_riesgo_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'victima_canalizada')->radioButtonGroup($data);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosAgresor, 'tipo_canalizacion_id')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'tipo_seguimiento_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosAgresor, 'requiere_orden_proteccion')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-7">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosAgresor, 'informo_proteccion_utilizar')->radioButtonGroup($data);
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosAgresor, 'fuero_federal')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosAgresor, 'solicita_informacion_proteccion')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($modelDatosAgresor, 'banesvim')->textInput(['maxlength' => true, 'placeholder'=> 'Folio BANESVIM'])->label(false) ?>
        </div>
    </div>

</div>

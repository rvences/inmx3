<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $modelDatosGenerales app\models\CedulasDatosGenerales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-datos-generales-form">


    <div class="row">
        <div class ="col-md-2">
            <?= $form->field($modelDatosGenerales, 'edad')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Edad']) ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'fecha_nac')->widget(DatePicker::className(), [
                'name' => 'Fecha de Nacimiento',
                'language'=> 'es',
                'options' => ['disabled'=> true, 'placeholder' => 'Fecha de Nacimiento dd-mm-aaaa...'],
                'pluginOptions' => [
                    'orientation' => 'bottom left',

                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelDatosGenerales, 'grupo_etnico')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N', 'X']]);
            ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelDatosGenerales, 'no_hijos')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Núm. Hijos(as)']) ?>
        </div>
    </div>
    <div class="row">
        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 13, // the maximum times, an element can be added (default 999)
            'min' => 0, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelsGH[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'hijo_edad',
                'hijo_sexo_id',

            ],
        ]); ?>

        <div class="row item panel ">
        <?php foreach ($modelsGH as $i => $modelGH): ?>
                <div class="col-md-2">
                    <h3>Hijo <?=$i +1?></h3>
                </div>
                <div class="col-md-5">
                    <?= $form->field($modelGH, "[{$i}]hijo_edad")->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Edad']) ?>
                </div>
                <div class="col-md-5">
                    <?php $lista = ArrayHelper::map(\app\models\Csexos::find()->asArray()->all(), 'id', 'sexo');
                    echo $form->field($modelGH, "[{$i}]hijo_sexo_id")->dropDownList($lista, ['prompt' => '[Selecciona]', 'disabled'=>true]);
                    ?>
                </div>
        <?php endforeach; ?>
        </div>
        <?php DynamicFormWidget::end(); ?>

    </div>
    <div class="row">
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'A' => 'Algunos(as)'];
            echo $form->field($modelDatosGenerales, 'vive_hijos')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N', 'A']]);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelDatosGenerales, 'edad_primer_embarazo')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => '¿Edad primer embarazo?']) ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'embarazo_violencia')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N']]);
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'madre_soltera')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N']]);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'madre_soltera_apartir_de_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CmadresSolterasApartirDe::find()->all(), 'id', 'apartir_de'),
                'options' => ['disabled'=> true, 'placeholder' => 'A partir de: ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'No Sabe'];
            echo $form->field($modelDatosGenerales, 'embarazada_actualmente')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N', 'X']]);
            ?>
        </div>

        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'meses_embarazo')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Meses de embarazo']) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'violencia_obstetrica')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N']]);
            ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'violencia_obstetrica_institucion')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Institución']) ?>
        </div>
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'denuncio')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N']]);
            ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'no_gestaciones')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'N° Gestaciones']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'mortalidad_hijo')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N']]);
            ?>
        </div>
        <div class ="col-md-2">
            <?= $form->field($modelDatosGenerales, 'mortalidad_hijo_edad')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Edad']) ?>
        </div>
        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'mortalidad_hijo_sexo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csexos::find()->all(), 'id', 'sexo'),
                'options' => ['disabled'=> true, 'placeholder' => 'Sexo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($modelDatosGenerales, 'estado_civil_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CestadosCiviles::find()->all(), 'id', 'estado_civil'),
                'options' => ['disabled'=> true, 'placeholder' => 'Estado Civil ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'convivencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cconvivencias::find()->all(), 'id', 'convivencia'),
                'options' => ['disabled'=> true, 'placeholder' => 'Convivencia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($modelDatosGenerales, 'observaciones')->textarea(['rows' => 6, 'readonly'=>true]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'vivienda_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CtiposViviendas::find()->all(), 'id', 'tipo_vivienda'),
                'options' => ['disabled'=> true, 'placeholder' => 'Vivienda ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'servicios_basicos_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CserviciosBasicos::find()->all(), 'id', 'servicio_basico'),
                'options' => ['disabled'=> true,
                    'placeholder' => 'Selecciona los Servicios básicos ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'nivel_estudio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CnivelesEstudios::find()->all(), 'id', 'nivel_estudio'),
                'options' => ['disabled'=> true, 'placeholder' => 'Nivel de estudios ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'status_estudio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CstatusEstudios::find()->all(), 'id', 'status_estudio'),
                'options' => ['disabled'=> true, 'placeholder' => 'Estatus de estudios ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class ="col-md-2">
            <?= $form->field($modelDatosGenerales, 'idioma')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Idioma']) ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'ocupacion_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cocupaciones::find()->all(), 'id', 'ocupacion'),
                'options' => ['disabled'=> true,
                    'placeholder' => 'Selecciona las Ocupaciones ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'fuente_ingresos_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CfuentesIngresos::find()->all(), 'id', 'fuente_ingresos'),
                'options' => ['disabled'=> true,
                    'placeholder' => 'Selecciona las fuentes de ingresos ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['1' => '1', '2' => '2', '3' => '3', '+' => '>3'];
            echo $form->field($modelDatosGenerales, 'numero_jornadas')->radioButtonGroup($data,  ['disabledItems'=> [1, 2, 3, '+']]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php $data = ['1' => '1', '2' => '2', '3' => '3', '+' => '>3'];
            echo $form->field($modelDatosGenerales, 'numero_ingresos')->radioButtonGroup($data,  ['disabledItems'=> [1, 2, 3, '+']]);
            ?>
        </div>
        <div class ="col-md-2">
            <?= $form->field($modelDatosGenerales, 'horas_labor_hogar')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Horas en el hogar']) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_cuidado_otros')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Horas invertidas cuidado a otros']) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_trabajo')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Horas invertidas en trabajo']) ?>
        </div>
    </div>
    <div class="row">
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_recreacion')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Horas invertidas en recreación']) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_autocuidado')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Horas invertidas en autocuidado']) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_descanso')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Horas invertidas en descanso']) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_autoempleo')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Horas invertidas en autoempleo']) ?>
        </div>
    </div>

    <div class="row">
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'ingreso_mensual')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Ingreso mensual']) ?>
        </div>
        <div class ="col-md-5">
            <?= $form->field($modelDatosGenerales, 'quien_administra_dinero')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => '¿Quién administra su dinero?']) ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se desconoce'];
            echo $form->field($modelDatosGenerales, 'servidor_publico')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N', 'X']]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'servidor_publico_cargo')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Cargo de servidor público']) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'servidor_publico_institucion')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Institución']) ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $form->field($modelDatosGenerales, 'programas_sociales_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cprogramassociales::find()->all(), 'id', 'programa_social'),
                'options' => ['disabled'=> true,
                    'placeholder' => 'Selecciona programas sociales ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'servicios_medicos_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cserviciosmedicos::find()->all(), 'id', 'servicio_medico'),
                'options' => ['disabled'=> true,
                    'placeholder' => 'Selecciona servicio médico ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'padece_enfermedades_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cenfermedades::find()->all(), 'id', 'enfermedad'),
                'options' => ['disabled'=> true,
                    'placeholder' => 'Selecciona enfermedades que padece ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se desconoce'];
            echo $form->field($modelDatosGenerales, 'autocuidado')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N', 'X']]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'autocuidado_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cenfermedades::find()->all(), 'id', 'enfermedad'),
                'options' => ['disabled'=> true,
                    'placeholder' => '¿Cuál autocuidado? ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'padece_discapacidades_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cdiscapacidades::find()->all(), 'id', 'discapacidad'),
                'options' => ['disabled'=> true,
                    'placeholder' => 'Seleccione discapacidad que padece ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
    </div>



</div>

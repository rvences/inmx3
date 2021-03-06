<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $modelDatosGenerales app\models\CedulasDatosGenerales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-datos-generales-form">

    <?php
    ?>
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']);
    echo $form->errorSummary([$modelDatosGenerales, $modelCedula]);

    $modelDatosGenerales->cedula_id = $modelCedula->id;
    ?>

    <?= $form->field($modelDatosGenerales, 'cedula_id')->hiddenInput()->label(false) ?>

    <?php

    /*
    <?= $form->field($modelDatosGenerales, 'cedula_id')->textInput() ?>
    <?= $form->field($modelDatosGenerales, 'created_at')->textInput() ?>
    <?= $form->field($modelDatosGenerales, 'created_by')->textInput() ?>
    <?= $form->field($modelDatosGenerales, 'updated_at')->textInput() ?>
    <?= $form->field($modelDatosGenerales, 'updated_by')->textInput() ?>

     * */
    ?>

    <div class="row">
        <div class ="col-md-2">
            <?= $form->field($modelDatosGenerales, 'edad')->textInput(['maxlength' => true, 'placeholder' => 'Edad'])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'fecha_nac')->widget(DatePicker::className(), [
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
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelDatosGenerales, 'grupo_etnico')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelDatosGenerales, 'no_hijos')->textInput(['maxlength' => true, 'placeholder' => 'Núm. Hijos(as)'])->label(false) ?>
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
        <div class="col-md-2">
            <button type="button" class="add-item btn btn-success "><i class="glyphicon glyphicon-plus"></i> Agregar Hijo</button>
        </div>
        <div class="col-md-10">
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php foreach ($modelsGH as $i => $modelGH): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelGH->isNewRecord) {
                                    echo Html::activeHiddenInput($modelGH, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($modelGH, "[{$i}]hijo_edad")->textInput(['maxlength' => true, 'placeholder' => 'Edad'])->label(false) ?>
                                    </div>
                                    <div class="col-md-4">


                                        <?php $lista = ArrayHelper::map(\app\models\Csexos::find()->asArray()->all(), 'id', 'sexo');
                                        echo $form->field($modelGH, "[{$i}]hijo_sexo_id")->dropDownList($lista, ['prompt' => '[Selecciona]'])->label(false);
                                        ?>



                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="remove-item btn btn-danger "><i class="glyphicon glyphicon-minus"></i> Eliminar</button>

                                    </div>
                                </div>

                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php DynamicFormWidget::end(); ?>

    </div>
    <div class="row">
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'A' => 'Algunos(as)'];
            echo $form->field($modelDatosGenerales, 'vive_hijos')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelDatosGenerales, 'edad_primer_embarazo')->textInput(['maxlength' => true, 'placeholder' => '¿Edad primer embarazo?'])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'embarazo_violencia')->radioButtonGroup($data);
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'madre_soltera')->radioButtonGroup($data);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'madre_soltera_apartir_de_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CmadresSolterasApartirDe::find()->all(), 'id', 'apartir_de'),
                'options' => ['placeholder' => 'A partir de: ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'No Sabe'];
            echo $form->field($modelDatosGenerales, 'embarazada_actualmente')->radioButtonGroup($data);
            ?>
        </div>

        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'meses_embarazo')->textInput(['maxlength' => true, 'placeholder' => 'Meses de embarazo'])->label(false) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'violencia_obstetrica')->radioButtonGroup($data);
            ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'violencia_obstetrica_institucion')->textInput(['maxlength' => true, 'placeholder' => 'Institución'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'denuncio')->radioButtonGroup($data);
            ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'no_gestaciones')->textInput(['maxlength' => true, 'placeholder' => 'N° Gestaciones'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelDatosGenerales, 'mortalidad_hijo')->radioButtonGroup($data);
            ?>
        </div>
        <div class ="col-md-2">
            <?= $form->field($modelDatosGenerales, 'mortalidad_hijo_edad')->textInput(['maxlength' => true, 'placeholder' => 'Edad'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'mortalidad_hijo_sexo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csexos::find()->all(), 'id', 'sexo'),
                'options' => ['placeholder' => 'Sexo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($modelDatosGenerales, 'estado_civil_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CestadosCiviles::find()->all(), 'id', 'estado_civil'),
                'options' => ['placeholder' => 'Estado Civil ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'convivencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cconvivencias::find()->all(), 'id', 'convivencia'),
                'options' => ['placeholder' => 'Convivencia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($modelDatosGenerales, 'observaciones')->textarea(['rows' => 6]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'vivienda_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CtiposViviendas::find()->all(), 'id', 'tipo_vivienda'),
                'options' => ['placeholder' => 'Vivienda ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'servicios_basicos_ids')->widget(Select2::classname(), [
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
        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'nivel_estudio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CnivelesEstudios::find()->all(), 'id', 'nivel_estudio'),
                'options' => ['placeholder' => 'Nivel de estudios ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelDatosGenerales, 'status_estudio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CstatusEstudios::find()->all(), 'id', 'status_estudio'),
                'options' => ['placeholder' => 'Estatus de estudios ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class ="col-md-2">
            <?= $form->field($modelDatosGenerales, 'idioma')->textInput(['maxlength' => true, 'placeholder' => 'Idioma'])->label(false) ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'ocupacion_ids')->widget(Select2::classname(), [
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

        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'fuente_ingresos_ids')->widget(Select2::classname(), [
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
        <div class="col-md-4">
            <?php $data = ['1' => '1', '2' => '2', '3' => '3', '+' => '>3'];
            echo $form->field($modelDatosGenerales, 'numero_jornadas')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php $data = ['1' => '1', '2' => '2', '3' => '3', '+' => '>3'];
            echo $form->field($modelDatosGenerales, 'numero_ingresos')->radioButtonGroup($data);
            ?>
        </div>
        <div class ="col-md-2">
            <?= $form->field($modelDatosGenerales, 'horas_labor_hogar')->textInput(['maxlength' => true, 'placeholder' => 'Horas en el hogar'])->label(false) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_cuidado_otros')->textInput(['maxlength' => true, 'placeholder' => 'Horas invertidas cuidado a otros'])->label(false) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_trabajo')->textInput(['maxlength' => true, 'placeholder' => 'Horas invertidas en trabajo'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_recreacion')->textInput(['maxlength' => true, 'placeholder' => 'Horas invertidas en recreación'])->label(false) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_autocuidado')->textInput(['maxlength' => true, 'placeholder' => 'Horas invertidas en autocuidado'])->label(false) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_descanso')->textInput(['maxlength' => true, 'placeholder' => 'Horas invertidas en descanso'])->label(false) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'horas_autoempleo')->textInput(['maxlength' => true, 'placeholder' => 'Horas invertidas en autoempleo'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'ingreso_mensual')->textInput(['maxlength' => true, 'placeholder' => 'Ingreso mensual'])->label(false) ?>
        </div>
        <div class ="col-md-5">
            <?= $form->field($modelDatosGenerales, 'quien_administra_dinero')->textInput(['maxlength' => true, 'placeholder' => '¿Quién administra su dinero?'])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se desconoce'];
            echo $form->field($modelDatosGenerales, 'servidor_publico')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'servidor_publico_cargo')->textInput(['maxlength' => true, 'placeholder' => 'Cargo de servidor público'])->label(false) ?>
        </div>
        <div class ="col-md-3">
            <?= $form->field($modelDatosGenerales, 'servidor_publico_institucion')->textInput(['maxlength' => true, 'placeholder' => 'Institución'])->label(false) ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $form->field($modelDatosGenerales, 'programas_sociales_ids')->widget(Select2::classname(), [
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
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'servicios_medicos_ids')->widget(Select2::classname(), [
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
            echo $form->field($modelDatosGenerales, 'padece_enfermedades_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cenfermedades::find()->all(), 'id', 'enfermedad'),
                'options' => [
                    'placeholder' => 'Selecciona enfermedades que padece ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se desconoce'];
            echo $form->field($modelDatosGenerales, 'autocuidado')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($modelDatosGenerales, 'autocuidado_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cenfermedades::find()->all(), 'id', 'enfermedad'),
                'options' => [
                    'placeholder' => '¿Cuál autocuidado? ...',
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
            echo $form->field($modelDatosGenerales, 'padece_discapacidades_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cdiscapacidades::find()->all(), 'id', 'discapacidad'),
                'options' => [
                    'placeholder' => 'Seleccione discapacidad que padece ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

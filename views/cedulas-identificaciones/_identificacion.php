<?php
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasIdentificaciones */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="cedulas-identificaciones-form">
    <?php

    $modelIdentificacion->cedula_id = $modelCedula->id;
    $modelIdentificacion->hora_inicio = \Yii::$app->formatter->asTime($modelCedula->updated_at, "php:H:i:s");

    ?>

    <?= $form->field($modelIdentificacion,'cedula_id')->hiddenInput()->label(false) ?>
    <?= $form->field($modelIdentificacion,'hora_inicio')->hiddenInput()->label(false) ?>

    <?php
    /*
        <?= $form->field($modelIdentificacion,'created_at')->textInput() ?>
        <?= $form->field($modelIdentificacion,'created_by')->textInput() ?>
        <?= $form->field($modelIdentificacion,'hora_termino')->textInput() ?>
        <?= $form->field($modelIdentificacion,'updated_at')->textInput() ?>
        <?= $form->field($modelIdentificacion,'updated_by')->textInput() ?>


     */
    ?>

    <div class="row">

        <div class="col-md-4 ">
            <?= $form->field($modelIdentificacion,'tel_llamada', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Teléfono', 'autofocus' => 'autofocus', 'tabindex' => '1'])->label(false); ?>
        </div>
        <div class="col-md-4 ">
            <?php
            echo $form->field($modelIdentificacion,'tipo_llamada_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposllamadas::find()->all(), 'id', 'tipo_llamada'),
                'options' => ['placeholder' => 'Tipo de llamada ...', 'tabindex' => '2'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelIdentificacion,'tipificacion_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctipificaciones::find()->all(), 'id', 'tipificacion'),
                'options' => [
                    'placeholder' => 'Seleccione las tipificaciones ...',
                    'multiple' => true,
                    'tabindex' => '3'
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
            echo $form->field($modelIdentificacion,'tipo_emergencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposemergencias::find()->all(), 'id', 'tipo_emergencia'),
                'options' => ['placeholder' => 'Tipo Emergencia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'coorporacion_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccoorporaciones::find()->all(), 'id', 'coorporacion'),
                'options' => [
                    'placeholder' => 'Seleccione las corporaciones ...',
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
            echo $form->field($modelIdentificacion,'institucion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cinstituciones::find()->all(), 'id', function($model) {
                    return $model['institucion'].' > '.$model['institucion_area'];
                }),
                'options' => ['placeholder' => 'Institución ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'tipoasesoria_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposasesorias::find()->all(), 'id', 'tipoasesoria'),
                'options' => [
                    'placeholder' => 'Selecciona las Asesorías ...',
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
            echo $form->field($modelIdentificacion,'sexo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csexos::find()->all(), 'id', 'sexo'),
                'options' => ['placeholder' => 'Sexo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelIdentificacion,'apaterno')->textInput(['maxlength' => true, 'placeholder' => 'Ap. Paterno'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelIdentificacion,'amaterno')->textInput(['maxlength' => true, 'placeholder' => 'Ap. Materno'])->label(false) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'calle')->textInput(['maxlength' => true, 'placeholder'=> 'Calle'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelIdentificacion,'no_int')->textInput(['maxlength' => true, 'placeholder'=> 'No. Interior'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelIdentificacion,'no_ext')->textInput(['maxlength' => true, 'placeholder'=> 'No. Exterior'])->label(false) ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $form->field($modelIdentificacion,'colonia_id')->widget(Select2::classname(), [
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
            <?= $form->field($modelIdentificacion,'localidad')->textInput(['maxlength' => true, 'placeholder'=> 'Localidad'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'municipio')->textInput(['maxlength' => true, 'placeholder'=> 'Municipio'])->label(false) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($modelIdentificacion,'colonia_nueva')->textInput(['maxlength' => true, 'placeholder'=> 'Colonia Nueva'])->label(false) ?>
            <?= $form->field($modelIdentificacion,'colonia_foranea')->textInput(['maxlength' => true, 'placeholder'=> 'Colonia Foránea'])->label(false) ?>

        </div>

    </div>

    <div class="row">
        <div class="col-md-2">
            <?php
            echo $form->field($modelIdentificacion,'entidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Centidadesfederativas::find()->all(), 'id', 'entidad'),
                'options' => ['placeholder' => 'Estado ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelIdentificacion,'zona_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Czonas::find()->all(), 'id', 'zona'),
                'options' => ['placeholder' => 'Zona ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'congregacion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccongregaciones::find()->all(), 'id', 'congregacion'),
                'options' => ['placeholder' => 'Congregación o Ejido ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelIdentificacion,'religion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Creligiones::find()->all(), 'id', 'religion'),
                'options' => ['placeholder' => 'Religión ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'nacionalidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cnacionalidades::find()->all(), 'id', 'nacionalidad'),
                'options' => ['placeholder' => 'Nacionalidad ...'],
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
            echo $form->field($modelIdentificacion,'fecha_ult_incidente')->widget(DatePicker::className(), [
                'name' => 'fecha_incidente',
                'value' => date('dd-mm-yyyy', strtotime('+2 days')),
                'language'=> 'es',
                'options' => ['placeholder' => 'Ultimo incidente'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ])->label(false);
            ?>
        </div>


        <div class="col-md-4">
            <?php
            echo $form->field($modelIdentificacion,'zona_riesgo_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Czonasderiesgos::find()->all(), 'id', 'zona_riesgo'),
                'options' => [
                    'placeholder' => 'Selecciona las Zonas de Riesgo ...',
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
            echo $form->field($modelIdentificacion,'horario_riesgo_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Chorariosderiesgos::find()->all(), 'id', 'horario_riesgo'),
                'options' => [
                    'placeholder' => 'Selecciona el Horario de Riesgo ...',
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
            echo $form->field($modelIdentificacion,'nivel_riesgo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CnivelesRiesgos::find()->all(), 'id', 'nivel_riesgo'),
                'options' => [
                    'placeholder' => 'Selecciona el nivel de riesgo ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>


        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'lugar_nacimiento')->textInput(['maxlength' => true, 'placeholder'=> 'Lugar de Nacimiento'])->label(false) ?>
        </div>

        <div class="col-md-5">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelIdentificacion,'violencia_pareja_anterior')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'contacto_emergencia1')->textInput(['maxlength' => true, 'placeholder'=> 'Primer Contacto Emergencia'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'tel_emergencia1', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Teléfono'])->label(false); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'contacto_emergencia2')->textInput(['maxlength' => true, 'placeholder'=> 'Segundo Contacto Emergencia'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'tel_emergencia2', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Teléfono'])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class = "col-md-12 ">
                <?= $form->field($modelIdentificacion,'situacion_desencadenante')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelIdentificacion,'menor_18')->radioButtonGroup($data);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'nombre_tutela')->textInput(['maxlength' => true, 'placeholder'=> 'Nombre de quien tutela'])->label(false) ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'relacion_parentezco_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Crelacioparentezco::find()->all(), 'id', 'relacion_parentezco'),
                'options' => ['placeholder' => 'Parentezco ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3 ">
            <?= $form->field($modelIdentificacion,'tel_tutela', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Tel. Tutela'])->label(false); ?>
        </div>

    </div>

    <div class="row">
        <div class = "col-md-8 ">
            <?= $form->field($modelIdentificacion,'direccion_tutela')->textInput(['maxlength' => true, 'placeholder'=> 'Dirección de quien tutela'])->label(false) ?>
        </div>

        <?php /*
        <div class = "col-md-4 ">
            <?php
            echo $form->field($modelIdentificacion,'entero_servicio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Centeroservicios::find()->all(), 'id', 'entero_servicio'),
                'options' => ['placeholder' => '¿Como se enteró? ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        */ ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($modelIdentificacion,'observaciones')->textarea(['rows' => 6]) ?>
        </div>
    </div>

</div>

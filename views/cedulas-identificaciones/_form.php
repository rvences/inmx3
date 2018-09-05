<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\CedulasIdentificaciones */
/* @var $form yii\widgets\ActiveForm */


?>

<?php

$JS = <<< JS
    $('#cedulasidentificaciones-colonia_foranea').hide();
    $('#cedulasidentificaciones-colonia_nueva').hide();         
    $(document.body).on("change","#cedulasidentificaciones-colonia_id",function(){                    
        var val = $('#cedulasidentificaciones-colonia_id').val();
        if(val == 9999 ) {
            $('#cedulasidentificaciones-colonia_foranea').hide();
            $('#cedulasidentificaciones-colonia_nueva').show();
        }  else  if(val == 9998 ){
            $('#cedulasidentificaciones-colonia_foranea').show();
            $('#cedulasidentificaciones-colonia_nueva').hide();
        } else {
        $('#cedulasidentificaciones-colonia_foranea').hide();
            $('#cedulasidentificaciones-colonia_nueva').hide();
        }
    });
JS;
$this->registerJs($JS, $this::POS_READY);


?>

<div class="cedulas-identificaciones-form">

    <?php $form = ActiveForm::begin();

    echo $form->errorSummary([$model]);

    ?>
    <?php
    /*
         <?= $form->field($model, 'cedula_id')->textInput() ?>
        <?= $form->field($model, 'created_at')->textInput() ?>
        <?= $form->field($model, 'hora_inicio')->textInput() ?>
        <?= $form->field($model, 'created_by')->textInput() ?>
        <?= $form->field($model, 'hora_termino')->textInput() ?>
        <?= $form->field($model, 'updated_at')->textInput() ?>
        <?= $form->field($model, 'updated_by')->textInput() ?>


     */
    ?>
    <div class="row">
        <div class="col-md-1">Folio: 1</div><div class="col-md-2">Creado: 02-08-2018</div><div class="col-md-2">Hora: 15:54</div><div class="col-md-2">Atendió: Lic. Telefonico</div>

    </div>

    <div class="row">

        <div class="col-md-4 ">
            <?= $form->field($model, 'tel_llamada', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Teléfono', 'autofocus' => 'autofocus', 'tabindex' => '1'])->label(false); ?>
        </div>
        <div class="col-md-4 ">
            <?php
            echo $form->field($model, 'tipo_llamada_id')->widget(Select2::classname(), [
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
            echo $form->field($model, 'tipificacion_ids')->widget(Select2::classname(), [
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
            echo $form->field($model, 'tipo_emergencia_id')->widget(Select2::classname(), [
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
            echo $form->field($model, 'coorporacion_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccoorporaciones::find()->all(), 'id', 'coorporacion'),
                'options' => [
                    'placeholder' => 'Seleccione las coorporaciones ...',
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
            echo $form->field($model, 'institucion_id')->widget(Select2::classname(), [
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
            echo $form->field($model, 'tipoasesoria_ids')->widget(Select2::classname(), [
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
            echo $form->field($model, 'sexo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csexos::find()->all(), 'id', 'sexo'),
                'options' => ['placeholder' => 'Sexo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'apaterno')->textInput(['maxlength' => true, 'placeholder' => 'Ap. Paterno'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'amaterno')->textInput(['maxlength' => true, 'placeholder' => 'Ap. Materno'])->label(false) ?>
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

        <div class="col-md-2">
            <?php
            echo $form->field($model, 'zona_id')->widget(Select2::classname(), [
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
            echo $form->field($model, 'congregacion_id')->widget(Select2::classname(), [
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
            echo $form->field($model, 'religion_id')->widget(Select2::classname(), [
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
            echo $form->field($model, 'nacionalidad_id')->widget(Select2::classname(), [
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
            echo $form->field($model, 'fecha_ult_incidente')->widget(DatePicker::className(), [
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
            echo $form->field($model, 'zona_riesgo_ids')->widget(Select2::classname(), [
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
            echo $form->field($model, 'horario_riesgo_ids')->widget(Select2::classname(), [
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
            echo $form->field($model, 'tipo_riesgo_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposderiesgos::find()->all(), 'id', 'tipo_riesgo'),
                'options' => [
                    'placeholder' => 'Selecciona el Tipo de Riesgo ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>


        <div class="col-md-3">
            <?= $form->field($model, 'lugar_nacimiento')->textInput(['maxlength' => true, 'placeholder'=> 'Lugar de Nacimiento'])->label(false) ?>
        </div>

        <div class="col-md-5">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'violencia_pareja_anterior')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'contacto_emergencia1')->textInput(['maxlength' => true, 'placeholder'=> 'Primer Contacto Emergencia'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tel_emergencia1', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Teléfono'])->label(false); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'contacto_emergencia2')->textInput(['maxlength' => true, 'placeholder'=> 'Segundo Contacto Emergencia'])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tel_emergencia2', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Teléfono'])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class = "col-md-12 ">
                <?= $form->field($model, 'situacion_desencadenante')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'menor_18')->radioButtonGroup($data);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'nombre_tutela')->textInput(['maxlength' => true, 'placeholder'=> 'Nombre de quien tutela'])->label(false) ?>
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

        <div class="col-md-3 ">
            <?= $form->field($model, 'tel_tutela', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Tel. Tutela'])->label(false); ?>
        </div>

    </div>

    <div class="row">
        <div class = "col-md-8 ">
            <?= $form->field($model, 'direccion_tutela')->textInput(['maxlength' => true, 'placeholder'=> 'Dirección de quien tutela'])->label(false) ?>
        </div>

        <div class = "col-md-4 ">
            <?php
            echo $form->field($model, 'entero_servicio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Centeroservicios::find()->all(), 'id', 'entero_servicio'),
                'options' => ['placeholder' => '¿Como se enteró? ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
             <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <?php //$form = ActiveForm::begin(); ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



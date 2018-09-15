<?php
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasIdentificaciones */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="cedulas-identificaciones-form">

    <div class="row">

        <div class="col-md-4 ">
            <?= $form->field($modelIdentificacion,'tel_llamada', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'placeholder'=> 'Teléfono', 'readonly'=>true]); ?>
        </div>
        <div class="col-md-4 ">
            <?php
            echo $form->field($modelIdentificacion,'tipo_llamada_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposllamadas::find()->all(), 'id', 'tipo_llamada'),
                'options' => ['disabled'=> true, 'placeholder' => 'Tipo de llamada ...', 'tabindex' => '2'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelIdentificacion,'tipificacion_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctipificaciones::find()->all(), 'id', 'tipificacion'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Seleccione las tipificaciones ...',
                    'multiple' => true,
                    'tabindex' => '3'
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
            echo $form->field($modelIdentificacion,'tipo_emergencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposemergencias::find()->all(), 'id', 'tipo_emergencia'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Tipo Emergencia ...'
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'coorporacion_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccoorporaciones::find()->all(), 'id', 'coorporacion'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Seleccione las corporaciones ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [

                    'tags' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-5">
            <?php
            echo $form->field($modelIdentificacion,'institucion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cinstituciones::find()->all(), 'id', function($model) {
                    return $model['institucion'].' > '.$model['institucion_area'];
                }),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Institución ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'tipoasesoria_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposasesorias::find()->all(), 'id', 'tipoasesoria'),
                'options' => [
                    'disabled'=> true,

                    'placeholder' => 'Selecciona las Asesorías ...',
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
            echo $form->field($modelIdentificacion,'sexo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csexos::find()->all(), 'id', 'sexo'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Sexo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'nombre')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder' => 'Nombre']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelIdentificacion,'apaterno')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder' => 'Ap. Paterno']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelIdentificacion,'amaterno')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder' => 'Ap. Materno']) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'calle')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Calle']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelIdentificacion,'no_int')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'No. Interior']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelIdentificacion,'no_ext')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'No. Exterior']) ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $form->field($modelIdentificacion,'colonia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccolonias::find()->all(), 'id', function($model) {
                    return $model['colonia'].' > '.$model['delegacion'] . ' > ' . $model['cp'];
                }),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Colonia - Delegación - Código Postal ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelIdentificacion,'localidad')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Localidad']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'municipio')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Municipio']) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($modelIdentificacion,'colonia_nueva')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Colonia Nueva']) ?>
            <?= $form->field($modelIdentificacion,'colonia_foranea')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Colonia Foránea']) ?>

        </div>

    </div>

    <div class="row">
        <div class="col-md-2">
            <?php
            echo $form->field($modelIdentificacion,'entidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Centidadesfederativas::find()->all(), 'id', 'entidad'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Estado ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelIdentificacion,'zona_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Czonas::find()->all(), 'id', 'zona'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Zona ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'congregacion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccongregaciones::find()->all(), 'id', 'congregacion'),
                'options' => [
                    'disabled'=> true,

                    'placeholder' => 'Congregación o Ejido ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <?php
            echo $form->field($modelIdentificacion,'religion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Creligiones::find()->all(), 'id', 'religion'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Religión ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'nacionalidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cnacionalidades::find()->all(), 'id', 'nacionalidad'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Nacionalidad ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
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
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Ultimo incidente'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ]);
            ?>
        </div>


        <div class="col-md-4">
            <?php
            echo $form->field($modelIdentificacion,'zona_riesgo_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Czonasderiesgos::find()->all(), 'id', 'zona_riesgo'),
                'options' => [
                    'disabled'=> true,

                    'placeholder' => 'Selecciona las Zonas de Riesgo ...',
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
            echo $form->field($modelIdentificacion,'horario_riesgo_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Chorariosderiesgos::find()->all(), 'id', 'horario_riesgo'),
                'options' => [
                    'disabled'=> true,

                    'placeholder' => 'Selecciona el Horario de Riesgo ...',
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
            echo $form->field($modelIdentificacion,'nivel_riesgo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CnivelesRiesgos::find()->all(), 'id', 'nivel_riesgo'),
                'options' => [
                    'disabled'=> true,

                    'placeholder' => 'Selecciona el nivel de riesgo ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>


        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'lugar_nacimiento')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Lugar de Nacimiento']) ?>
        </div>

        <div class="col-md-5">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelIdentificacion,'violencia_pareja_anterior')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N']]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'contacto_emergencia1')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Primer Contacto Emergencia']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'tel_emergencia1', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Teléfono']); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'contacto_emergencia2')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Segundo Contacto Emergencia']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'tel_emergencia2', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Teléfono']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class = "col-md-12 ">
                <?= $form->field($modelIdentificacion,'situacion_desencadenante')->textarea(['rows' => 6, 'readonly'=>true]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelIdentificacion,'menor_18')->radioButtonGroup($data,  ['disabledItems'=> ['S', 'N']]);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($modelIdentificacion,'nombre_tutela')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Nombre de quien tutela']) ?>
        </div>

        <div class="col-md-3">
            <?php
            echo $form->field($modelIdentificacion,'relacion_parentezco_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Crelacioparentezco::find()->all(), 'id', 'relacion_parentezco'),
                'options' => [
                    'disabled'=> true,
                    'placeholder' => 'Parentezco ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-3 ">
            <?= $form->field($modelIdentificacion,'tel_tutela', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']
                ]
            ])->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Tel. Tutela']); ?>
        </div>

    </div>

    <div class="row">
        <div class = "col-md-8 ">
            <?= $form->field($modelIdentificacion,'direccion_tutela')->textInput(['maxlength' => true, 'readonly'=>true,  'placeholder'=> 'Dirección de quien tutela']) ?>
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
            ]);
            ?>
        </div>
        */ ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($modelIdentificacion,'observaciones')->textarea(['rows' => 6, 'readonly'=>true]) ?>
        </div>
    </div>

</div>

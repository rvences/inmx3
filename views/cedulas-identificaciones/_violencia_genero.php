<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $modelViolenciaGenero app\models\CedulasViolenciaGenero */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-violencia-genero-form">
    <div class="row">
        <div class="col-md-3">
            <?php $data = ['DIRECTA' => 'Directa', 'INDIRECTA' => 'Indirecta'];
            echo $form->field($modelViolenciaGenero, 'tipo_victima')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($modelViolenciaGenero, 'tipo_violencia_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CtiposViolencias::find()->all(), 'id', 'tipo_violencia'),
                'options' => [
                    'placeholder' => 'Selecciona el Tipo de Violencia ...',
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
            echo $form->field($modelViolenciaGenero, 'tipo_modalidad_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CmodalidadesViolencias::find()->all(), 'id', 'modalidad_violencia'),
                'options' => [
                    'placeholder' => 'Selecciona el Tipo de Modalidad ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-md-3 ">
            <?php
            echo $form->field($modelViolenciaGenero, 'lugar_violencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\ClugaresViolencias::find()->all(), 'id', 'lugar_violencia'),
                'options' => ['placeholder' => 'Lugar de Violencia ...', 'tabindex' => '2'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'domicilio_victima')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelViolenciaGenero, 'calle')->textInput(['maxlength' => true, 'placeholder'=> 'Calle'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelViolenciaGenero, 'no_int')->textInput(['maxlength' => true, 'placeholder'=> 'No. Interior'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($modelViolenciaGenero, 'no_ext')->textInput(['maxlength' => true, 'placeholder'=> 'No. Exterior'])->label(false) ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $form->field($modelViolenciaGenero, 'colonia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccolonias::find()->all(), 'id', function($modelViolenciaGenero) {
                    return $modelViolenciaGenero['colonia'].' > '.$modelViolenciaGenero['delegacion'] . ' > ' . $modelViolenciaGenero['cp'];
                }),
                'options' => ['placeholder' => 'Colonia - Delegación - Código Postal ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($modelViolenciaGenero, 'colonia_nueva')->textInput(['maxlength' => true, 'placeholder'=> 'Colonia Nueva'])->label(false) ?>
            <?= $form->field($modelViolenciaGenero, 'colonia_foranea')->textInput(['maxlength' => true, 'placeholder'=> 'Colonia Foránea'])->label(false) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'localidad')->textInput(['maxlength' => true, 'placeholder'=> 'Localidad'])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'municipio')->textInput(['maxlength' => true, 'placeholder'=> 'Municipio'])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelViolenciaGenero, 'entidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Centidadesfederativas::find()->all(), 'id', 'entidad'),
                'options' => ['placeholder' => 'Estado ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($modelViolenciaGenero, 'observaciones')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'consume_alcohol')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'penso_suicidarse')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'intento_suicidarse')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'hospitalizada_anteriormente')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'requiere_hospitalizacion')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'vigilancia_agresor')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'llamadas_libremente')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'visitas_libremente')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'recibio_amenazas')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'vive_agresor')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'vive_familia_agresor')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'vive_cerca_agresor')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'abandono_casa')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelViolenciaGenero, 'lugar_vivir')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($modelViolenciaGenero, 'evaluacion_psicologica')->textarea(['rows' => 6]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12"><h3>Violencia Sexual</h3></div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'tiempo_agresion_servicio')->textInput(['maxlength' => true, 'placeholder'=> 'Tiempo entre la agresión y el servicio'])->label(false) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'lugar_agresion')->textInput(['maxlength' => true, 'placeholder'=> 'Lugar de la agresión'])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelViolenciaGenero, 'solicito_ayuda')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'tipo_atencion')->textInput(['maxlength' => true, 'placeholder'=> 'Tipo de atención recibida'])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelViolenciaGenero, 'aplicaron_nom046')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'horas_despues_agresion')->textInput(['maxlength' => true, 'placeholder'=> 'Número de horas después de la agresión'])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_violencia', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items-violencia', // required: css class selector
            'widgetItem' => '.item-violencia', // required: css class
            'limit' => 4, // the maximum times, an element can be added (default 999)
            'min' => 0, // 0 or 1 (default 1)
            'insertButton' => '.add-item-violencia', // css class
            'deleteButton' => '.remove-item-violencia', // css class
            'model' => $modelsGR[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'institucion',
                'servicio',
                'calidad',
            ],
        ]); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>
                    <button type="button" class="add-item-violencia btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </h5>
            </div>
            <div class="panel-body">
                <div class="container-items-violencia"><!-- widgetBody -->
                    <?php foreach ($modelsGR as $i => $modelGR): ?>
                        <div class="item-violencia panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Ruta Crítica</h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item-violencia btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i> Eliminar</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelGR->isNewRecord) {
                                    echo Html::activeHiddenInput($modelGR, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $form->field($modelGR, "[{$i}]institucion")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($modelGR, "[{$i}]servicio")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?php $data = ['S' => 'Si', 'N' => 'No'];
                                        echo $form->field($modelGR, "[{$i}]calidad")->radioButtonGroup($data);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div><!-- .panel -->
        <?php DynamicFormWidget::end(); ?>















    </div>

    <div class="row">
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelViolenciaGenero, 'explicaron_derechos')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'institucion_atendio')->textInput(['maxlength' => true, 'placeholder'=> 'Institución que atendió '])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($modelViolenciaGenero, 'sintomatologia_emocional_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CsintomatologiasEmocionales::find()->all(), 'id', 'sintomatologia_emocional'),
                'options' => [
                    'placeholder' => 'Selecciona Sintomatología Emocional ...',
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
            echo $form->field($modelViolenciaGenero, 'sintomatologia_fisica_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CsintomatologiasFisicas::find()->all(), 'id', 'sintomatologia_fisica'),
                'options' => [
                    'placeholder' => 'Selecciona Sintomatología Física ...',
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
            echo $form->field($modelViolenciaGenero, 'creencias_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccreencias::find()->all(), 'id', 'creencia'),
                'options' => [
                    'placeholder' => 'Selecciona la Creencia ...',
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
            echo $form->field($modelViolenciaGenero, 'factores_psicosociales_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CfactoresPsicosociales::find()->all(), 'id', 'factor_psicosocial'),
                'options' => [
                    'placeholder' => 'Selecciona el factor Psicosocial ...',
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
            echo $form->field($modelViolenciaGenero, 'relacion_pareja_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CrelacionesParejas::find()->all(), 'id', 'relacion_pareja'),
                'options' => [
                    'placeholder' => 'Selecciona la relación de pareja ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'tiempo_convivencia_anios')->textInput(['maxlength' => true, 'placeholder'=> 'Tiempo de convivencia "Años" '])->label(false) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'tiempo_convivencia_anios')->textInput(['maxlength' => true, 'placeholder'=> 'Tiempo de convivencia "Meses" '])->label(false) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelViolenciaGenero, 'adaptacion_psicologica')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelViolenciaGenero, 'agresiones_previas')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-4">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelViolenciaGenero, 'autonomia')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($modelViolenciaGenero, 'relato_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Crelatos::find()->all(), 'id', 'relato'),
                'options' => [
                    'placeholder' => 'Selecciona el relato ...',
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
            echo $form->field($modelViolenciaGenero, 'relaciones_sociales_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CrelacionesSociales::find()->all(), 'id', 'relacion_social'),
                'options' => [
                    'placeholder' => 'Selecciona la relación social ...',
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
            echo $form->field($modelViolenciaGenero, 'tipo_demanda_ids')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CtiposDemandas::find()->all(), 'id', 'tipo_demanda'),
                'options' => [
                    'placeholder' => 'Selecciona el tipo de demanda ...',
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
            <?= $form->field($modelViolenciaGenero, 'tratamiento')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'relato_juridico')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($modelViolenciaGenero, 'situacion_problematica')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($modelViolenciaGenero, 'procedimiento_legal')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($modelViolenciaGenero, 'alcance_resultados')->textarea(['rows' => 6]) ?>
        </div>
    </div>

</div>

<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\EncuestaTelefonica */
/* @var $form yii\widgets\ActiveForm */
?>
<h1>Solo falta agregar dependencias y seguridad</h1>
<div class="encuesta-telefonica-form">



    <div class="row">
        <div class="col-md-5">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'asesoria_correcta')->radioButtonGroup($data)->label('¿La línea violeta Xalapa le proporcionó la asesoría correcta?');
            ?>
        </div>
        <div class="col-md-1">¿Por qué?</div>
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'asesoria_correcta_info')->textarea(['rows' => 2])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">

            <?php $lista = ArrayHelper::map(\app\models\CencuestaCalificaciones::find()->all(), 'id', 'calificacion');
            echo $form->field($model, 'atencion_correcta_id')->dropDownList($lista, ['prompt' => '[Selecciona]'])->label('Calificación ...');
            ?>


            <?php
            /*
            echo $form->field($model, 'atencion_correcta_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\CencuestaCalificaciones::find()->all(), 'id', 'calificacion'),
                'options' => ['placeholder' => 'Calificación ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('¿Cómo califica la atención brindada por la ejecutiva telefónica?');       */     ?>
        </div>
        <div class="col-md-1">¿Por qué?</div>
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'atencion_correcta_info')->textarea(['rows' => 2])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'volver_llamar')->radioButtonGroup($data)->label('¿Volvería a llamar a la línea violeta Xalapa?');
            ?>
        </div>
        <div class="col-md-1">¿Por qué?</div>
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'volver_llamar_info')->textarea(['rows' => 2])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'recomienda_linea')->radioButtonGroup($data)->label('¿Recomendaría que las mujeres llamaran a esta línea de asesoría?');
            ?>
        </div>
        <div class="col-md-1">¿Por qué?</div>
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'recomienda_linea_info')->textarea(['rows' => 3])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <?php
            echo $form->field($model, 'como_entero')->textarea(['rows' => 3])->label('¿Por qué medio de comunicación se enteró de la línea violeta Xalapa?');
            ?>
        </div>
        <div class="col-md-2">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'ayuda_adicional')->radioButtonGroup($data)->label('¿Le podemos ayudar en algo más?');
            ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $form->field($model, 'observaciones')->textarea(['rows' => 4])->label('Observaciones');
            ?>
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
            'model' => $modelsTD[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'institucion_id',
                'atencion',
                'observaciones',

            ],
        ]); ?>
        <div class="col-md-2">
            <button type="button" class="add-item btn btn-success "><i class="glyphicon glyphicon-plus"></i> Agregar Dependencia</button>
        </div>
        <div class="col-md-10">
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php foreach ($modelsTD as $i => $modelTD): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelTD->isNewRecord) {
                                    echo Html::activeHiddenInput($modelTD, "[{$i}]id");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-8">

                                        <?php $lista = ArrayHelper::map(\app\models\Cinstituciones::find()->all(), 'id', function($model) {
                                            return $model['institucion'].' > '.$model['institucion_area'];
                                        });
                                        echo $form->field($modelTD, "[{$i}]institucion_id")->dropDownList($lista, ['prompt' => '[Selecciona]'])->label('Nombre de la dependencia o institución');
                                        ?>
                                        <?php
                                        /*
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
                                         */
                                        ?>



                                    </div>
                                    <div class="col-md-4">
                                        <?php $data = ['S' => 'Si', 'N' => 'No'];
                                        echo $form->field($modelTD, "[{$i}]atencion")->radioButtonGroup($data)->label('¿La calidad de la atención fue buena?');
                                         ?>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-8">
                                        <?= $form->field($modelTD, "[{$i}]observaciones")->textarea(['rows'=>4])->label('Observaciones') ?>
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
    <br>

    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Regresar a listado', ['/encuesta-telefonica/index'], ['class'=>'btn btn-primary']) ?>
        </div>
    </div>


</div>

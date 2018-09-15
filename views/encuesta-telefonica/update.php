<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\tabs\TabsX;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\CedulasIdentificaciones */
/* @var $form yii\widgets\ActiveForm */


?>


<?php $form = ActiveForm::begin(['id' => 'dynamic-form']);
    echo $form->errorSummary([$model]);
    ?>

<div class="row bg-info">
    <?php
    ?>
    <div class="col-md-4">Ejecutiva: <b><?=$modelCedula->updatedBy->nombre?></b> </div>
    <div class="col-md-4">Folio: <b><?=$modelCedula->id?></b> </div>
    <div class="col-md-4">Fecha de Creación: <b><?=\Yii::$app->formatter->asTime($modelCedula->created_at, "php:d-m-Y H:i:s");?></b> </div>
</div>



<?php

$items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Encuesta',
        'content'=>Yii::$app->controller->renderPartial('_form', ['model' => $model, 'modelsTD' => $modelsTD, 'form'=> $form]),
        'active'=>true,
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Datos de Identificación',
        'content'=>Yii::$app->controller->renderPartial('_identificacion', ['modelIdentificacion' => $modelIdentificacion, 'modelCedula' => $modelCedula, 'form'=> $form]),
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Datos Generales',
        'content'=>Yii::$app->controller->renderPartial('_datos_generales', ['modelDatosGenerales' => $modelDatosGenerales, 'modelsGH' => $modelsGH, 'modelCedula' => $modelCedula, 'form'=> $form]),
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-glass"></i> Violencia de Género',
        'content'=>Yii::$app->controller->renderPartial('_violencia_genero', ['modelViolenciaGenero' => $modelViolenciaGenero, 'modelsGR' => $modelsGR, 'modelCedula' => $modelCedula, 'form'=> $form]),
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-folder-open"></i> Datos sobre el agresor',
        'content'=>Yii::$app->controller->renderPartial('_datos_agresor', ['modelDatosAgresor' => $modelDatosAgresor, 'modelCedula' => $modelCedula, 'form'=> $form]),
    ],

];

/*

 */
// Ajax Tabs Above

echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);

?>


<?php ActiveForm::end(); ?>

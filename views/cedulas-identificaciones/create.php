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


$form = ActiveForm::begin(['id' => 'dynamic-form']);

?>



<div class="row bg-info">
    <?php
    echo $form->errorSummary([$modelIdentificacion, $modelCedula, $modelDatosGenerales, $modelViolenciaGenero, $modelDatosAgresor]);
    ?>
    <div class="col-md-3">Ejecutiva: <b><?=$modelCedula->updatedBy->nombre?></b> </div>
    <div class="col-md-3">Folio: <b><?=$modelCedula->id?></b> </div>
    <div class="col-md-4">Fecha de Inicio: <b><?=\Yii::$app->formatter->asTime($modelCedula->created_at, "php:d-m-Y H:i:s");?></b> </div>
    <div class="col-md-2">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
</div>


<?php
$items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Datos de Identificación',
        'content'=>Yii::$app->controller->renderPartial('_identificacion', ['modelIdentificacion' => $modelIdentificacion, 'modelCedula' => $modelCedula, 'form'=> $form]),
        'active'=>true,
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
// Ajax Tabs Above

echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);

?>

<?php ActiveForm::end(); ?>

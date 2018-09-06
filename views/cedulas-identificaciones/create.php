<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CedulasIdentificaciones */

$this->title = 'Nuevas Cédulas Identificaciones';
        $this->params['breadcrumbs'][] = ['label' => 'Cedulas Identificaciones', 'url' => ['index']];
        $this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel-info">

    <div class="row bg-info">
        <div class="col-md-3">Ejecutiva: <b><?=$modelCedula->updatedBy->nombre?></b> </div>
        <div class="col-md-3">Folio: <b><?=$modelCedula->id?></b> </div>
        <div class="col-md-6">Fecha de Inicio: <b><?=\Yii::$app->formatter->asTime($modelCedula->created_at, "php:d-m-Y H:i:s");?></b> </div>

    </div>
    <div class="panel-heading"><h2>Datos de Identificación</h2></div>

    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
            'modelCedula' => $modelCedula,
        ]) ?>
    </div>

</div>

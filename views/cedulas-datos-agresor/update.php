<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasDatosAgresor */

$this->title = 'Actualizando Datos de la Cédula del Agresor: ' . $modelDatosAgresor->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Datos Agresores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelDatosAgresor->id, 'url' => ['view', 'id' => $modelDatosAgresor->id]];
$this->params['breadcrumbs'][] = 'Actualizando';
?>
<div class="cedulas-datos-agresor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelDatosAgresor' => $modelDatosAgresor,
        'modelCedula' => $modelCedula,
    ]) ?>

</div>

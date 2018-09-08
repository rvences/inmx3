<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasDatosGenerales */

$this->title = 'Actualizando Datos Generales de la Cédula: ' . $modelDatosGenerales->id;
$this->params['breadcrumbs'][] = ['label' => 'Cédulas Datos Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelDatosGenerales->id, 'url' => ['view', 'id' => $modelDatosGenerales->id]];
$this->params['breadcrumbs'][] = 'Actualizando';
?>
<div class="cedulas-datos-generales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelDatosGenerales' => $modelDatosGenerales,
        'modelsGH' => $modelsGH,
        'modelCedula' => $modelCedula,
    ]) ?>

</div>

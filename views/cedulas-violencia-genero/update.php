<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasViolenciaGenero */

$this->title = 'Actualizando Datos de la Cedulas de Violencia Genero: ' . $modelViolenciaGenero->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Violencia Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelViolenciaGenero->id, 'url' => ['view', 'id' => $modelViolenciaGenero->id]];
$this->params['breadcrumbs'][] = 'Actualizando';
?>
<div class="cedulas-violencia-genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelViolenciaGenero' => $modelViolenciaGenero,
        'modelsGR' => $modelsGR,
        'modelCedula' => $modelCedula,
    ]) ?>

</div>

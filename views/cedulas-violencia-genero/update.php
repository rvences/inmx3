<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasViolenciaGenero */

$this->title = 'Actualizando Datos de la Cedulas de Violencia Genero: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Violencia Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizando';
?>
<div class="cedulas-violencia-genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsGR' => $modelsGR,
        'modelCedula' => $modelCedula,
    ]) ?>

</div>

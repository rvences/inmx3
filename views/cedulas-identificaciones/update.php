<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasIdentificaciones */

$this->title = 'Update Cedulas Identificaciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Identificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cedulas-identificaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

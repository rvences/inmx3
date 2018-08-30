<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasDatosGenerales */

$this->title = 'Update Cedulas Datos Generales: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Datos Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cedulas-datos-generales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

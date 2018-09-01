<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasViolenciaGeneroRuta */

$this->title = 'Update Cedulas Violencia Genero Ruta: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Violencia Genero Rutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cedulas-violencia-genero-ruta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

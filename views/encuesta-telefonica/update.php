<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EncuestaTelefonica */

$this->title = 'Encuesta telefónica de la cédula: ' . $model->cedula_identificacion_id;

?>
<div class="encuesta-telefonica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsTD' => $modelsTD,
    ]) ?>

</div>

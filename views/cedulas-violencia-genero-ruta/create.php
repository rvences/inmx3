<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CedulasViolenciaGeneroRuta */

$this->title = 'Create Cedulas Violencia Genero Ruta';
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Violencia Genero Rutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-violencia-genero-ruta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

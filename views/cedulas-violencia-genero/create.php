<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CedulasViolenciaGenero */

$this->title = 'Nueva Cedulas Violencia Genero';
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Violencia Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-violencia-genero-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelsGR' => $modelsGR,
        'modelCedula' => $modelCedula,


    ]) ?>

</div>

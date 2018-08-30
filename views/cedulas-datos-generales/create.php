<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CedulasDatosGenerales */

$this->title = 'Nueva Cédulas Datos Generales';
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Datos Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-datos-generales-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelsGH' => $modelsGH,
    ]) ?>

</div>

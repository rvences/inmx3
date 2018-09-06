<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CedulasIdentificaciones */

$this->title = 'Nuevas Cédulas Identificaciones';
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Identificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-identificaciones-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

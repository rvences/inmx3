<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CedulasDatosAgresor */

$this->title = 'Nueva Cédulas Datos Agresor';
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Datos Agresores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-datos-agresor-create">

    <?= $this->render('_form', [
        'modelDatosAgresor' => $modelDatosAgresor,
        'modelCedula' => $modelCedula,
    ]) ?>

</div>

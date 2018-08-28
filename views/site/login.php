<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Button;
$this->title = 'INMX - Acceso';
?>

    <body class="text-center">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => [
            'class' => 'form-signin'
        ]

    ]); ?>

    <img class="img-responsive center-block" src="images/logo-armas.png">

    <h2>Inicie sesión</h2>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Usuario') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

    <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordar') ?>

    <div class="form-group">
        <div >
            <?= Html::submitButton('Acceder', ['class' => 'btn btn-primary center-block', 'name' => 'login-button']) ?>
        </div>

    </div>
    <img class="img-responsive center-block" src="images/logo-immx.png">


    <?php ActiveForm::end(); ?>

    </body>


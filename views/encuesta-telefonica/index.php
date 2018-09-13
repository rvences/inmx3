<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EncuestaTelefonicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encuesta Telefonicas';
?>
<div class="encuesta-telefonica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cedula_id',
            'search_telefono',
            'search_nombre',
            'asesoria_correcta',
            'volver_llamar',
            'recomienda_linea',
            'ayuda_adicional',


            //'cedula_identificacion_id',
            //
            //'asesoria_correcta_info:ntext',
            //'atencion_correcta',
            //'atencion_correcta_info:ntext',
            //'volver_llamar',
            //'volver_llamar_info:ntext',
            //'recomienda_linea',
            //'recomienda_linea_info:ntext',
            //'como_entero:ntext',
            //'ayuda_adicional',
            //'observaciones:ntext',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}',],
        ],
    ]); ?>
</div>

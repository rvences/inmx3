<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CedulasViolenciaGeneroRutaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cedulas Violencia Genero Rutas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-violencia-genero-ruta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cedulas Violencia Genero Ruta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula_id',
            'institucion',
            'servicio',
            'calidad',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

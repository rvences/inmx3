<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CedulasIdentificacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cedulas Identificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-identificaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cedulas Identificaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula_id',
            'tel_llamada',
            'created_at',
            'hora_inicio',
            //'hora_termino',
            //'fecha_ult_incidente',
            //'tipo_llamada_id',
            //'tipificacion_id',
            //'tipo_emergencia_id',
            //'coorporacion_id',
            //'institucion_id',
            //'tipoasesoria_ids',
            //'sexo_id',
            //'nombre',
            //'apaterno',
            //'amaterno',
            //'calle',
            //'domicilio',
            //'no_int',
            //'no_ext',
            //'colonia_id',
            //'localidad',
            //'municipio',
            //'entidad_id',
            //'zona',
            //'congregacion_id',
            //'religion_id',
            //'nacionalidad_id',
            //'zona_riesgo_ids',
            //'horario_riesgo_ids',
            //'tipo_riesgo_ids',
            //'lugar_nacimiento',
            //'violencia_pareja_anterior',
            //'created_by',
            //'contacto_emergencia1',
            //'tel_emergencia1',
            //'contacto_emergencia2',
            //'tel_emergencia2',
            //'situacion_desencadenante:ntext',
            //'menor_18',
            //'nombre_tutela',
            //'relacion_parentezco_id',
            //'tel_tutela',
            //'direccion_tutela',
            //'observaciones:ntext',
            //'entero_servicio_id',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

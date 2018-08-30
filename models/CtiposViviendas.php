<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipos_viviendas".
 *
 * @property int $id
 * @property string $tipo_vivienda
 *
 * @property CedulasDatosGenerales[] $cedulasDatosGenerales
 */
class CtiposViviendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipos_viviendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_vivienda'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_vivienda' => 'Tipo Vivienda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosGenerales()
    {
        return $this->hasMany(CedulasDatosGenerales::className(), ['vivienda_id' => 'id']);
    }
}

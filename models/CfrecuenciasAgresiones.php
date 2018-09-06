<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cfrecuencias_agresiones".
 *
 * @property int $id
 * @property string $frecuencia_agresion Frecuencia en la Agresión
 *
 * @property CedulasDatosAgresor[] $cedulasDatosAgresors
 */
class CfrecuenciasAgresiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cfrecuencias_agresiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['frecuencia_agresion'], 'required'],
            [['frecuencia_agresion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'frecuencia_agresion' => 'Frecuencia Agresion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosAgresors()
    {
        return $this->hasMany(CedulasDatosAgresor::className(), ['frecuencia_agresion_id' => 'id']);
    }
}

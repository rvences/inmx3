<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cdrogas_agresiones".
 *
 * @property int $id
 * @property string $droga_agresion Droga en la Agresión
 *
 * @property CedulasDatosAgresor[] $cedulasDatosAgresors
 */
class CdrogasAgresiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdrogas_agresiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['droga_agresion'], 'required'],
            [['droga_agresion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'droga_agresion' => 'Droga Agresion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosAgresors()
    {
        return $this->hasMany(CedulasDatosAgresor::className(), ['droga_agresion_id' => 'id']);
    }
}

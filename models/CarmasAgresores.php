<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carmas_agresores".
 *
 * @property int $id
 * @property string $arma_agresor Armas del Agresor
 *
 * @property CedulasDatosAgresor[] $cedulasDatosAgresors
 */
class CarmasAgresores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carmas_agresores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['arma_agresor'], 'required'],
            [['arma_agresor'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'arma_agresor' => 'Arma Agresor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosAgresors()
    {
        return $this->hasMany(CedulasDatosAgresor::className(), ['arma_agresor_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposatencion".
 *
 * @property int $id
 * @property string $tipoatencion Tipo de Atención
 *
 * @property Cedulas[] $cedulas
 */
class Ctiposatencion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposatencion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoatencion'], 'required'],
            [['tipoatencion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoatencion' => 'Tipoatencion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulas()
    {
        return $this->hasMany(Cedulas::className(), ['tipoatencion_id' => 'id']);
    }
}

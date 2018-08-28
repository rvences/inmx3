<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposllamadas".
 *
 * @property int $id
 * @property string $tipo_llamada
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Ctiposllamadas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposllamadas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_llamada'], 'required'],
            [['tipo_llamada'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_llamada' => 'Tipo Llamada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['tipo_llamada_id' => 'id']);
    }
}

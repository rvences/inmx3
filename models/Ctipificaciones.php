<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipificaciones".
 *
 * @property int $id
 * @property string $tipificacion
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Ctipificaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipificacion'], 'required'],
            [['tipificacion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipificacion' => 'Tipificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['tipificacion_id' => 'id']);
    }
}

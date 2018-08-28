<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "centeroservicios".
 *
 * @property int $id
 * @property string $entero_servicio Entero de los servicios
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Centeroservicios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'centeroservicios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entero_servicio'], 'required'],
            [['entero_servicio'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entero_servicio' => 'Entero Servicio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['entero_servicio_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cservicios_basicos".
 *
 * @property int $id
 * @property string $servicio_basico
 */
class CserviciosBasicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cservicios_basicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['servicio_basico'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'servicio_basico' => 'Servicio Basico',
        ];
    }
}

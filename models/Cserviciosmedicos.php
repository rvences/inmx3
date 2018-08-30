<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cserviciosmedicos".
 *
 * @property int $id
 * @property string $servicio_medico
 */
class Cserviciosmedicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cserviciosmedicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['servicio_medico'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'servicio_medico' => 'Servicio Medico',
        ];
    }
}

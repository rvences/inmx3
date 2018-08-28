<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "czonasderiesgos".
 *
 * @property int $id
 * @property string $zona_riesgo Zona de Riesgo
 */
class Czonasderiesgos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'czonasderiesgos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zona_riesgo'], 'required'],
            [['zona_riesgo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zona_riesgo' => 'Zona Riesgo',
        ];
    }
}

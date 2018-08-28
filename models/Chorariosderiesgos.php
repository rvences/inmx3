<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chorariosderiesgos".
 *
 * @property int $id
 * @property string $horario_riesgo Horario de Riesgo
 */
class Chorariosderiesgos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chorariosderiesgos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horario_riesgo'], 'required'],
            [['horario_riesgo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'horario_riesgo' => 'Horario Riesgo',
        ];
    }
}

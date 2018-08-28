<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposderiesgos".
 *
 * @property int $id
 * @property string $tipo_riesgo Tipo de Riesgo
 */
class Ctiposderiesgos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposderiesgos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_riesgo'], 'required'],
            [['tipo_riesgo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_riesgo' => 'Tipo Riesgo',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cindicadores_riesgos".
 *
 * @property int $id
 * @property string $indicador_riesgo Indicador de Riesgo
 */
class CindicadoresRiesgos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cindicadores_riesgos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indicador_riesgo'], 'required'],
            [['indicador_riesgo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'indicador_riesgo' => 'Indicador Riesgo',
        ];
    }
}

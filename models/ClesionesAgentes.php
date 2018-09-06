<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clesiones_agentes".
 *
 * @property int $id
 * @property string $lesion_agente Agente
 */
class ClesionesAgentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clesiones_agentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesion_agente'], 'required'],
            [['lesion_agente'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesion_agente' => 'Lesion Agente',
        ];
    }
}

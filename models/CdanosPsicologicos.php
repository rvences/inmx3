<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cdanos_psicologicos".
 *
 * @property int $id
 * @property string $dano_psicologico Dano Psicologico
 */
class CdanosPsicologicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdanos_psicologicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dano_psicologico'], 'required'],
            [['dano_psicologico'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dano_psicologico' => 'Dano Psicologico',
        ];
    }
}

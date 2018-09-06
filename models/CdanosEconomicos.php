<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cdanos_economicos".
 *
 * @property int $id
 * @property string $dano_economico Dano Economico
 */
class CdanosEconomicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdanos_economicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dano_economico'], 'required'],
            [['dano_economico'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dano_economico' => 'Dano Economico',
        ];
    }
}

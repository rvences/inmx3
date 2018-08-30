<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cocupaciones".
 *
 * @property int $id
 * @property string $ocupacion
 */
class Cocupaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cocupaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ocupacion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ocupacion' => 'Ocupacion',
        ];
    }
}

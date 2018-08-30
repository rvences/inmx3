<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cenfermedades".
 *
 * @property int $id
 * @property string $enfermedad
 */
class Cenfermedades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cenfermedades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enfermedad'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enfermedad' => 'Enfermedad',
        ];
    }
}

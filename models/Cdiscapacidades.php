<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cdiscapacidades".
 *
 * @property int $id
 * @property string $discapacidad
 */
class Cdiscapacidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdiscapacidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discapacidad'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discapacidad' => 'Discapacidad',
        ];
    }
}

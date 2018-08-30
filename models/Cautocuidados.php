<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cautocuidados".
 *
 * @property int $id
 * @property string $autocuidado
 */
class Cautocuidados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cautocuidados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autocuidado'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'autocuidado' => 'Autocuidado',
        ];
    }
}

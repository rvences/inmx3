<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ccoorporaciones".
 *
 * @property int $id
 * @property string $coorporacion
 */
class Ccoorporaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ccoorporaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coorporacion'], 'required'],
            [['coorporacion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'coorporacion' => 'Coorporacion',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clesiones_fisicas".
 *
 * @property int $id
 * @property string $lesion_fisica Lesión Física
 */
class ClesionesFisicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clesiones_fisicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesion_fisica'], 'required'],
            [['lesion_fisica'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesion_fisica' => 'Lesion Fisica',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csintomatologias_fisicas".
 *
 * @property int $id
 * @property string $sintomatologia_fisica Sintomatología Física
 */
class CsintomatologiasFisicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'csintomatologias_fisicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sintomatologia_fisica'], 'required'],
            [['sintomatologia_fisica'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sintomatologia_fisica' => 'Sintomatologia Fisica',
        ];
    }
}

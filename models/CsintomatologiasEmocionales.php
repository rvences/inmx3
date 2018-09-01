<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csintomatologias_emocionales".
 *
 * @property int $id
 * @property string $sintomatologia_emocional Sintomatología Emocional
 */
class CsintomatologiasEmocionales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'csintomatologias_emocionales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sintomatologia_emocional'], 'required'],
            [['sintomatologia_emocional'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sintomatologia_emocional' => 'Sintomatologia Emocional',
        ];
    }
}

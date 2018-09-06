<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "careas_lesionadas".
 *
 * @property int $id
 * @property string $area_lesionada Area lesionada
 */
class CareasLesionadas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'careas_lesionadas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_lesionada'], 'required'],
            [['area_lesionada'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'area_lesionada' => 'Area Lesionada',
        ];
    }
}

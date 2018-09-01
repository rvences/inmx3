<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crelaciones_sociales".
 *
 * @property int $id
 * @property string $relacion_social Relación Social
 */
class CrelacionesSociales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crelaciones_sociales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['relacion_social'], 'required'],
            [['relacion_social'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'relacion_social' => 'Relacion Social',
        ];
    }
}

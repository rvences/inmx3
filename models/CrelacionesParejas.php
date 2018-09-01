<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crelaciones_parejas".
 *
 * @property int $id
 * @property string $relacion_pareja Relación de Pareja
 */
class CrelacionesParejas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crelaciones_parejas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['relacion_pareja'], 'required'],
            [['relacion_pareja'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'relacion_pareja' => 'Relacion Pareja',
        ];
    }
}

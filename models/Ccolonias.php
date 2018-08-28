<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ccolonias".
 *
 * @property int $id
 * @property string $colonia
 * @property string $cp
 * @property string $delegacion
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Ccolonias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ccolonias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['colonia'], 'required'],
            [['colonia'], 'string', 'max' => 120],
            [['cp'], 'string', 'max' => 5],
            [['delegacion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'colonia' => 'Colonia',
            'cp' => 'Cp',
            'delegacion' => 'Delegacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['colonia_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csexos".
 *
 * @property int $id
 * @property string $sexo
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Csexos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'csexos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sexo'], 'required'],
            [['sexo'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sexo' => 'Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['sexo_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cnacionalidades".
 *
 * @property int $id
 * @property string $nacionalidad Nacionalidad
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Cnacionalidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cnacionalidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nacionalidad'], 'required'],
            [['nacionalidad'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nacionalidad' => 'Nacionalidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['nacionalidad_id' => 'id']);
    }
}

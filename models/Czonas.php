<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "czonas".
 *
 * @property int $id
 * @property string $zona Zonas
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Czonas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'czonas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zona'], 'required'],
            [['zona'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zona' => 'Zona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['zona_id' => 'id']);
    }
}

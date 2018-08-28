<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cinstituciones".
 *
 * @property int $id
 * @property string $institucion
 * @property string $institucion_area
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Cinstituciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cinstituciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institucion', 'institucion_area'], 'required'],
            [['institucion'], 'string', 'max' => 100],
            [['institucion_area'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institucion' => 'Institucion',
            'institucion_area' => 'Institucion Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['institucion_id' => 'id']);
    }
}

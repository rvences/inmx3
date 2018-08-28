<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "centidadesfederativas".
 *
 * @property int $id
 * @property string $entidad Entidad Federativa
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Centidadesfederativas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'centidadesfederativas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entidad'], 'required'],
            [['entidad'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entidad' => 'Entidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['entidad_id' => 'id']);
    }
}

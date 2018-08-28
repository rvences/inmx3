<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crelacioparentezco".
 *
 * @property int $id
 * @property string $relacion_parentezco Relación - Parentezco
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Crelacioparentezco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crelacioparentezco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['relacion_parentezco'], 'required'],
            [['relacion_parentezco'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'relacion_parentezco' => 'Relacion Parentezco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['relacion_parentezco_id' => 'id']);
    }
}

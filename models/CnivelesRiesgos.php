<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cniveles_riesgos".
 *
 * @property int $id
 * @property string $nivel_riesgo Nivel de Riesgo
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class CnivelesRiesgos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cniveles_riesgos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nivel_riesgo'], 'required'],
            [['nivel_riesgo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivel_riesgo' => 'Nivel Riesgo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['nivel_riesgo_id' => 'id']);
    }
}

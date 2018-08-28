<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposemergencias".
 *
 * @property int $id
 * @property string $tipo_emergencia
 * @property string $prioridad
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Ctiposemergencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposemergencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_emergencia'], 'required'],
            [['tipo_emergencia'], 'string', 'max' => 120],
            [['prioridad'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_emergencia' => 'Tipo Emergencia',
            'prioridad' => 'Prioridad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['tipo_emergencia_id' => 'id']);
    }
}

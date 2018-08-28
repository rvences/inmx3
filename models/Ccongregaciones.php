<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ccongregaciones".
 *
 * @property int $id
 * @property string $congregacion
 * @property string $cp
 * @property string $delegacion
 *
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Ccongregaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ccongregaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['congregacion'], 'required'],
            [['congregacion'], 'string', 'max' => 120],
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
            'congregacion' => 'Congregacion',
            'cp' => 'Cp',
            'delegacion' => 'Delegacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['congregacion_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cestadocedulas".
 *
 * @property int $id
 * @property string $estado_cedula
 *
 * @property Cedulas[] $cedulas
 */
class Cestadocedulas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cestadocedulas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado_cedula'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado_cedula' => 'Estado Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulas()
    {
        return $this->hasMany(Cedulas::className(), ['status_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cstatus_estudios".
 *
 * @property int $id
 * @property string $status_estudio
 *
 * @property CedulasDatosGenerales[] $cedulasDatosGenerales
 */
class CstatusEstudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cstatus_estudios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_estudio'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_estudio' => 'Status Estudio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosGenerales()
    {
        return $this->hasMany(CedulasDatosGenerales::className(), ['status_estudio_id' => 'id']);
    }
}

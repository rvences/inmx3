<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cniveles_estudios".
 *
 * @property int $id
 * @property string $nivel_estudio
 *
 * @property CedulasDatosGenerales[] $cedulasDatosGenerales
 */
class CnivelesEstudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cniveles_estudios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nivel_estudio'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivel_estudio' => 'Nivel Estudio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosGenerales()
    {
        return $this->hasMany(CedulasDatosGenerales::className(), ['nivel_estudio_id' => 'id']);
    }
}

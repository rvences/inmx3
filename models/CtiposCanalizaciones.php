<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipos_canalizaciones".
 *
 * @property int $id
 * @property string $tipo_canalizacion Tipos de Canalizaciones
 *
 * @property CedulasDatosAgresor[] $cedulasDatosAgresors
 */
class CtiposCanalizaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipos_canalizaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_canalizacion'], 'required'],
            [['tipo_canalizacion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_canalizacion' => 'Tipo Canalizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosAgresors()
    {
        return $this->hasMany(CedulasDatosAgresor::className(), ['tipo_canalizacion_id' => 'id']);
    }
}

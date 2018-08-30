<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cestados_civiles".
 *
 * @property int $id
 * @property string $estado_civil Estado Civil
 *
 * @property CedulasDatosGenerales[] $cedulasDatosGenerales
 */
class CestadosCiviles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cestados_civiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado_civil'], 'required'],
            [['estado_civil'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado_civil' => 'Estado Civil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosGenerales()
    {
        return $this->hasMany(CedulasDatosGenerales::className(), ['estado_civil_id' => 'id']);
    }
}

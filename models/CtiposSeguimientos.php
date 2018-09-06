<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipos_seguimientos".
 *
 * @property int $id
 * @property string $tipo_seguimiento Tipos de Seguimiento
 */
class CtiposSeguimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipos_seguimientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_seguimiento'], 'required'],
            [['tipo_seguimiento'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_seguimiento' => 'Tipo Seguimiento',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipos_violencias".
 *
 * @property int $id
 * @property string $tipo_violencia Tipos de Violencia
 */
class CtiposViolencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipos_violencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_violencia'], 'required'],
            [['tipo_violencia'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_violencia' => 'Tipo Violencia',
        ];
    }
}

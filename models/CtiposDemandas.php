<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipos_demandas".
 *
 * @property int $id
 * @property string $tipo_demanda Tipo Demanda
 */
class CtiposDemandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipos_demandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_demanda'], 'required'],
            [['tipo_demanda'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_demanda' => 'Tipo Demanda',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clugares_violencias".
 *
 * @property int $id
 * @property string $lugar_violencia Lugar de Violencia
 *
 * @property CedulasViolenciaGenero[] $cedulasViolenciaGeneros
 */
class ClugaresViolencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clugares_violencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lugar_violencia'], 'required'],
            [['lugar_violencia'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lugar_violencia' => 'Lugar Violencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasViolenciaGeneros()
    {
        return $this->hasMany(CedulasViolenciaGenero::className(), ['lugar_violencia_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cconvivencias".
 *
 * @property int $id
 * @property string $convivencia Convivencias
 *
 * @property CedulasDatosGenerales[] $cedulasDatosGenerales
 */
class Cconvivencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cconvivencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['convivencia'], 'required'],
            [['convivencia'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'convivencia' => 'Convivencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosGenerales()
    {
        return $this->hasMany(CedulasDatosGenerales::className(), ['convivencia_id' => 'id']);
    }
}

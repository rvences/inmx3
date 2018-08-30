<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmadres_solteras_apartir_de".
 *
 * @property int $id
 * @property string $apartir_de
 *
 * @property CedulasDatosGenerales[] $cedulasDatosGenerales
 */
class CmadresSolterasApartirDe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cmadres_solteras_apartir_de';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apartir_de'], 'required'],
            [['apartir_de'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apartir_de' => 'Apartir De',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasDatosGenerales()
    {
        return $this->hasMany(CedulasDatosGenerales::className(), ['madre_soltera_apartir_de_id' => 'id']);
    }
}

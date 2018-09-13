<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cencuesta_calificaciones".
 *
 * @property int $id
 * @property string $calificacion Calificaciones
 *
 * @property EncuestaTelefonica[] $encuestaTelefonicas
 */
class CencuestaCalificaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cencuesta_calificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calificacion'], 'required'],
            [['calificacion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'calificacion' => 'Calificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestaTelefonicas()
    {
        return $this->hasMany(EncuestaTelefonica::className(), ['atencion_correcta_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cedulas_violencia_genero_ruta".
 *
 * @property int $id
 * @property int $cedulas_violencia_genero_id
 * @property string $institucion
 * @property string $servicio
 * @property string $calidad
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 */
class CedulasViolenciaGeneroRuta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedulas_violencia_genero_ruta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedulas_violencia_genero_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['institucion', 'servicio'], 'string', 'max' => 100],
            [['calidad'], 'string', 'max' => 1],
            [['cedulas_violencia_genero_id'], 'exist', 'skipOnError' => true, 'targetClass' => CedulasViolenciaGenero::className(), 'targetAttribute' => ['cedulas_violencia_genero_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedulas_violencia_genero_id' => 'Cedulas Violencia Genero ID',
            'institucion' => 'Institucion',
            'servicio' => 'Servicio',
            'calidad' => 'Calidad',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasViolenciaGenero()
    {
        return $this->hasOne(CedulasViolenciaGenero::className(), ['id' => 'cedulas_violencia_genero_id']);
    }
}

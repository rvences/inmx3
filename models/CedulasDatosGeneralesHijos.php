<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cedulas_datos_generales_hijos".
 *
 * @property int $id
 * @property int $cedula_datos_generales_id
 * @property int $hijo_edad
 * @property int $hijo_sexo_id
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property User $createdBy
 * @property User $updatedBy0
 * @property User $createdBy0
 * @property CedulasDatosGenerales $cedulaDatosGenerales
 */
class CedulasDatosGeneralesHijos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedulas_datos_generales_hijos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['cedula_datos_generales_id', 'hijo_edad', 'hijo_sexo_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['cedula_datos_generales_id'], 'exist', 'skipOnError' => true, 'targetClass' => CedulasDatosGenerales::className(), 'targetAttribute' => ['cedula_datos_generales_id' => 'id']],        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula_id' => 'Cedula ID',
            'hijo_edad' => 'Edad del hijo',
            'hijo_sexo_id' => 'Sexo del hijo',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulaDatosGenerales()
    {
        return $this->hasOne(CedulasDatosGenerales::className(), ['id' => 'cedula_datos_generales_id']);
    }
}

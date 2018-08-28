<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cedulas".
 *
 * @property int $id
 * @property int $status_id
 * @property int $tipoatencion_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Ctiposatencion $tipoatencion
 * @property User $createdBy
 * @property Cestadocedulas $status
 * @property CedulasIdentificaciones[] $cedulasIdentificaciones
 */
class Cedulas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedulas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'tipoatencion_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['status_id', 'tipoatencion_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['tipoatencion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposatencion::className(), 'targetAttribute' => ['tipoatencion_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cestadocedulas::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => 'Status ID',
            'tipoatencion_id' => 'Tipoatencion ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
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
    public function getTipoatencion()
    {
        return $this->hasOne(Ctiposatencion::className(), ['id' => 'tipoatencion_id']);
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
    public function getStatus()
    {
        return $this->hasOne(Cestadocedulas::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasMany(CedulasIdentificaciones::className(), ['cedula_id' => 'id']);
    }
}

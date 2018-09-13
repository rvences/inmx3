<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "encuesta_telefonica_dependencia".
 *
 * @property int $id
 * @property int $encuestatelefonica_id
 * @property int $institucion_id
 * @property string $atencion
 * @property string $observaciones
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Cinstituciones $institucion
 * @property User $createdBy
 * @property EncuestaTelefonica $encuestatelefonica
 */
class EncuestaTelefonicaDependencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encuesta_telefonica_dependencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['encuestatelefonica_id', 'institucion_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['observaciones'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['atencion'], 'string', 'max' => 1],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cinstituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['encuestatelefonica_id'], 'exist', 'skipOnError' => true, 'targetClass' => EncuestaTelefonica::className(), 'targetAttribute' => ['encuestatelefonica_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'encuestatelefonica_id' => 'Encuestatelefonica ID',
            'institucion_id' => 'Institucion ID',
            'atencion' => 'Atencion',
            'observaciones' => 'Observaciones',
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
    public function getInstitucion()
    {
        return $this->hasOne(Cinstituciones::className(), ['id' => 'institucion_id']);
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
    public function getEncuestatelefonica()
    {
        return $this->hasOne(EncuestaTelefonica::className(), ['id' => 'encuestatelefonica_id']);
    }
}

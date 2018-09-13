<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "encuesta_telefonica".
 *
 * @property int $id
 * @property int $cedula_identificacion_id
 * @property string $asesoria_correcta
 * @property string $asesoria_correcta_info
 * @property int $atencion_correcta_id
 * @property string $atencion_correcta_info
 * @property string $volver_llamar
 * @property string $volver_llamar_info
 * @property string $recomienda_linea
 * @property string $recomienda_linea_info
 * @property string $como_entero
 * @property string $ayuda_adicional
 * @property string $observaciones
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property User $createdBy
 * @property CedulasIdentificaciones $cedulasIdentificaciones
 * @property EncuestaTelefonicaDependencia[] $encuestaTelefonicaDependencias
 */
class EncuestaTelefonica extends \yii\db\ActiveRecord
{
    /**
     * @var string
     */
    public $search_telefono;
    /**
     * @var string
     */
    public $search_nombre;
    public $cedula_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encuesta_telefonica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_identificacion_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'atencion_correcta_id', ], 'integer'],
            [['asesoria_correcta_info', 'atencion_correcta_info', 'volver_llamar_info', 'recomienda_linea_info', 'como_entero', 'observaciones'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['asesoria_correcta', 'volver_llamar', 'recomienda_linea', 'ayuda_adicional'], 'string', 'max' => 1],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['atencion_correcta_id'], 'exist', 'skipOnError' => true, 'targetClass' => CencuestaCalificaciones::className(), 'targetAttribute' => ['atencion_correcta_id' => 'id']],
            [['cedula_identificacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => CedulasIdentificaciones::className(), 'targetAttribute' => ['cedula_identificacion_id' => 'id']],        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula_identificacion_id' => 'Cedula Identificacion ID',
            'asesoria_correcta' => 'Asesoría correcta',
            'asesoria_correcta_info' => 'Asesoria Correcta Info',
            'atencion_correcta_id' => 'Atención correcta',
            'atencion_correcta_info' => 'Atencion Correcta Info',
            'volver_llamar' => 'Volvería a llamar',
            'volver_llamar_info' => 'Volver Llamar Info',
            'recomienda_linea' => 'Recomienda la línea',
            'recomienda_linea_info' => 'Recomienda Linea Info',
            'como_entero' => 'Como Entero',
            'ayuda_adicional' => 'Ayuda Adicional',
            'observaciones' => 'Observaciones',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'cedula_id' => 'Cédula',
            'search_telefono' => 'Teléfono',
            'search_nombre' => 'Usuaria/o',
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
    public function getAtencionCorrecta()
    {
        return $this->hasOne(CencuestaCalificaciones::className(), ['id' => 'atencion_correcta_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasIdentificaciones()
    {
        return $this->hasOne(CedulasIdentificaciones::className(), ['id' => 'cedula_identificacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestaTelefonicaDependencias()
    {
        return $this->hasMany(EncuestaTelefonicaDependencia::className(), ['encuestatelefonica_id' => 'id']);
    }
}

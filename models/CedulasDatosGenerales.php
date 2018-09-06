<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cedulas_datos_generales".
 *
 * @property int $id
 * @property int $cedula_id
 * @property int $edad
 * @property string $fecha_nac
 * @property string $grupo_etnico
 * @property int $no_hijos
 * @property string $vive_hijos
 * @property int $edad_primer_embarazo
 * @property int $embarazo_violencia
 * @property int $madre_soltera
 * @property int $madre_soltera_apartir_de_id
 * @property string $embarazada_actualmente
 * @property int $meses_embarazo
 * @property string $violencia_obstetrica
 * @property string $violencia_obstetrica_institucion
 * @property string $denuncio
 * @property int $no_gestaciones
 * @property string $mortalidad_hijo
 * @property int $mortalidad_hijo_edad
 * @property int $mortalidad_hijo_sexo_id
 * @property string $observaciones
 * @property int $estado_civil_id
 * @property int $convivencia_id
 * @property int $vivienda_id
 * @property int $servicios_basicos_ids
 * @property int $nivel_estudio_id
 * @property int $status_estudio_id
 * @property string $ocupacion_ids
 * @property string $fuente_ingresos_ids
 * @property int $numero_jornadas
 * @property int $numero_ingresos
 * @property int $horas_labor_hogar
 * @property int $horas_cuidado_otros
 * @property int $horas_trabajo
 * @property int $horas_recreacion
 * @property int $horas_autocuidado
 * @property int $horas_descanso
 * @property int $horas_autoempleo
 * @property int $ingreso_mensual
 * @property string $quien_administra_dinero
 * @property string $servidor_publico
 * @property string $servidor_publico_cargo
 * @property string $servidor_publico_institucion
 * @property string $programas_sociales_ids
 * @property string $servicios_medicos_ids
 * @property string $padece_enfermedades_ids
 * @property string $autocuidado
 * @property string $autocuidado_ids
 * @property string $padece_discapacidades_ids
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property CmadresSolterasApartirDe $madreSolteraApartirDe
 * @property CtiposViviendas $vivienda
 * @property CnivelesEstudios $nivelEstudio
 * @property CstatusEstudios $statusEstudio
 * @property CestadosCiviles $estadoCivil
 * @property Cconvivencias $convivencia
 * @property Csexos $mortalidadHijoSexo
 * @property User $createdBy
 * @property Cedulas $cedula
 */
class CedulasDatosGenerales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedulas_datos_generales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'edad', 'no_hijos', 'edad_primer_embarazo', 'embarazo_violencia', 'madre_soltera', 'madre_soltera_apartir_de_id', 'meses_embarazo', 'no_gestaciones', 'mortalidad_hijo_edad', 'mortalidad_hijo_sexo_id', 'estado_civil_id', 'convivencia_id', 'vivienda_id', 'servicios_basicos_ids', 'nivel_estudio_id', 'status_estudio_id', 'numero_jornadas', 'numero_ingresos', 'horas_labor_hogar', 'horas_cuidado_otros', 'horas_trabajo', 'horas_recreacion', 'horas_autocuidado', 'horas_descanso', 'horas_autoempleo', 'ingreso_mensual', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['fecha_nac'], 'safe'],
            [['observaciones'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['grupo_etnico', 'vive_hijos', 'embarazada_actualmente', 'violencia_obstetrica', 'denuncio', 'mortalidad_hijo', 'servidor_publico', 'autocuidado'], 'string', 'max' => 1],
            [['violencia_obstetrica_institucion', 'ocupacion_ids', 'fuente_ingresos_ids', 'quien_administra_dinero', 'servidor_publico_cargo', 'servidor_publico_institucion', 'programas_sociales_ids', 'servicios_medicos_ids', 'padece_enfermedades_ids', 'autocuidado_ids', 'padece_discapacidades_ids'], 'string', 'max' => 100],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['madre_soltera_apartir_de_id'], 'exist', 'skipOnError' => true, 'targetClass' => CmadresSolterasApartirDe::className(), 'targetAttribute' => ['madre_soltera_apartir_de_id' => 'id']],
            [['vivienda_id'], 'exist', 'skipOnError' => true, 'targetClass' => CtiposViviendas::className(), 'targetAttribute' => ['vivienda_id' => 'id']],
            [['nivel_estudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => CnivelesEstudios::className(), 'targetAttribute' => ['nivel_estudio_id' => 'id']],
            [['status_estudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => CstatusEstudios::className(), 'targetAttribute' => ['status_estudio_id' => 'id']],
            [['estado_civil_id'], 'exist', 'skipOnError' => true, 'targetClass' => CestadosCiviles::className(), 'targetAttribute' => ['estado_civil_id' => 'id']],
            [['convivencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cconvivencias::className(), 'targetAttribute' => ['convivencia_id' => 'id']],
            [['mortalidad_hijo_sexo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csexos::className(), 'targetAttribute' => ['mortalidad_hijo_sexo_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula_id' => 'Cedula ID',
            'edad' => 'Edad',
            'fecha_nac' => 'Fecha Nac',
            'grupo_etnico' => 'Grupo Etnico',
            'no_hijos' => 'No Hijos',
            'vive_hijos' => '¿Vive con sus hijas(os)',
            'edad_primer_embarazo' => 'Edad Primer Embarazo',
            'embarazo_violencia' => 'Embarazo por violencia sexual',
            'madre_soltera' => 'Madre Soltera',
            'madre_soltera_apartir_de_id' => 'Madre Soltera Apartir De ID',
            'embarazada_actualmente' => 'Embarazada Actualmente',
            'meses_embarazo' => 'Meses Embarazo',
            'violencia_obstetrica' => 'Violencia Obstetrica',
            'violencia_obstetrica_institucion' => 'Violencia Obstetrica Institucion',
            'denuncio' => 'Denuncio',
            'no_gestaciones' => 'No Gestaciones',
            'mortalidad_hijo' => 'Mortalidad de hijas(os)',
            'mortalidad_hijo_edad' => 'Mortalidad Hijo Edad',
            'mortalidad_hijo_sexo_id' => 'Mortalidad Hijo Sexo ID',
            'observaciones' => 'Observaciones',
            'estado_civil_id' => 'Estado Civil ID',
            'convivencia_id' => 'Convivencia ID',
            'vivienda_id' => 'Vivienda ID',
            'servicios_basicos_ids' => 'Servicios Basicos Ids',
            'nivel_estudio_id' => 'Nivel Estudio ID',
            'status_estudio_id' => 'Status Estudio ID',
            'ocupacion_ids' => 'Ocupacion Ids',
            'fuente_ingresos_ids' => 'Fuente Ingresos Ids',
            'numero_jornadas' => 'Numero Jornadas',
            'numero_ingresos' => 'Numero Ingresos',
            'horas_labor_hogar' => 'Horas Labor Hogar',
            'horas_cuidado_otros' => 'Horas Cuidado Otros',
            'horas_trabajo' => 'Horas Trabajo',
            'horas_recreacion' => 'Horas Recreacion',
            'horas_autocuidado' => 'Horas Autocuidado',
            'horas_descanso' => 'Horas Descanso',
            'horas_autoempleo' => 'Horas Autoempleo',
            'ingreso_mensual' => 'Ingreso Mensual',
            'quien_administra_dinero' => 'Quien Administra Dinero',
            'servidor_publico' => 'Servidor Publico',
            'servidor_publico_cargo' => 'Servidor Publico Cargo',
            'servidor_publico_institucion' => 'Servidor Publico Institucion',
            'programas_sociales_ids' => 'Programas Sociales Ids',
            'servicios_medicos_ids' => 'Servicios Medicos Ids',
            'padece_enfermedades_ids' => 'Padece Enfermedades Ids',
            'autocuidado' => 'Autocuidado',
            'autocuidado_ids' => 'Autocuidado Ids',
            'padece_discapacidades_ids' => 'Padece Discapacidades Ids',
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
    public function getMadreSolteraApartirDe()
    {
        return $this->hasOne(CmadresSolterasApartirDe::className(), ['id' => 'madre_soltera_apartir_de_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVivienda()
    {
        return $this->hasOne(CtiposViviendas::className(), ['id' => 'vivienda_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivelEstudio()
    {
        return $this->hasOne(CnivelesEstudios::className(), ['id' => 'nivel_estudio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusEstudio()
    {
        return $this->hasOne(CstatusEstudios::className(), ['id' => 'status_estudio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoCivil()
    {
        return $this->hasOne(CestadosCiviles::className(), ['id' => 'estado_civil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConvivencia()
    {
        return $this->hasOne(Cconvivencias::className(), ['id' => 'convivencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMortalidadHijoSexo()
    {
        return $this->hasOne(Csexos::className(), ['id' => 'mortalidad_hijo_sexo_id']);
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
    public function getCedula()
    {
        return $this->hasOne(Cedulas::className(), ['id' => 'cedula_id']);
    }
}

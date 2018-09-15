<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cedulas_datos_agresor".
 *
 * @property int $id
 * @property int $cedula_id
 * @property int $numero_agresores
 * @property string $nombre
 * @property string $apellidos
 * @property int $sexo_id
 * @property string $fecha_nac
 * @property int $edad
 * @property int $relacion_parentezco_id
 * @property int $estado_civil_id
 * @property string $calle
 * @property string $no_int
 * @property string $no_ext
 * @property int $colonia_id
 * @property string $colonia_nueva
 * @property string $colonia_foranea
 * @property string $localidad
 * @property string $municipio
 * @property int $entidad_id
 * @property int $nacionalidad_id
 * @property string $lugar_nacimiento
 * @property int $religion_id
 * @property int $vivienda_id
 * @property string $servicios_basicos_ids
 * @property int $nivel_estudio_id
 * @property int $status_estudio_id
 * @property string $idioma
 * @property string $ocupacion_ids
 * @property string $fuente_ingresos_ids
 * @property int $ingreso_mensual
 * @property string $servidor_publico
 * @property string $servidor_publico_cargo
 * @property string $servidor_publico_institucion
 * @property string $programas_sociales_ids
 * @property string $servicios_medicos_ids
 * @property string $padece_discapacidades_ids
 * @property int $droga_agresion_id
 * @property int $frecuencia_agresion_id
 * @property int $arma_agresor_id
 * @property int $lugar_violencia_id
 * @property string $lesion_fisica_ids
 * @property string $lesion_agente_ids
 * @property string $lesion_area_ids
 * @property string $danos_psicologicos_ids
 * @property string $danos_economicos_ids
 * @property string $indicador_riesgo_ids
 * @property string $victima_canalizada
 * @property int $tipo_canalizacion_id
 * @property string $tipo_seguimiento_ids
 * @property string $requiere_orden_proteccion
 * @property string $informo_proteccion_utilizar
 * @property string $fuero_federal
 * @property string $solicita_informacion_proteccion
 * @property string $banesvim
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property CarmasAgresores $armaAgresor
 * @property Ccolonias $colonia
 * @property CtiposViviendas $vivienda
 * @property CdrogasAgresiones $drogaAgresion
 * @property Centidadesfederativas $entidad
 * @property CfrecuenciasAgresiones $frecuenciaAgresion
 * @property CnivelesEstudios $nivelEstudio
 * @property ClugaresViolencias $lugarViolencia
 * @property Cnacionalidades $nacionalidad
 * @property Crelacioparentezco $relacionParentezco
 * @property Creligiones $religion
 * @property Csexos $sexo
 * @property CstatusEstudios $statusEstudio
 * @property CtiposCanalizaciones $tipoCanalizacion
 * @property CestadosCiviles $estadoCivil
 * @property User $createdBy
 * @property Cedulas $cedula
 */
class CedulasDatosAgresor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedulas_datos_agresor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'numero_agresores', 'sexo_id', 'edad', 'relacion_parentezco_id', 'estado_civil_id', 'colonia_id', 'entidad_id', 'nacionalidad_id', 'religion_id', 'vivienda_id', 'nivel_estudio_id', 'status_estudio_id', 'ingreso_mensual', 'droga_agresion_id', 'frecuencia_agresion_id', 'arma_agresor_id', 'lugar_violencia_id', 'tipo_canalizacion_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['fecha_nac'], 'safe'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            // [['servicios_basicos_ids', 'programas_sociales_ids', 'servicios_medicos_ids', 'padece_discapacidades_ids', 'lesion_fisica_ids', 'lesion_agente_ids', 'lesion_area_ids', 'danos_psicologicos_ids', 'danos_economicos_ids', 'indicador_riesgo_ids', 'tipo_seguimiento_ids', 'ocupacion_ids', 'fuente_ingresos_ids' ], 'safe'],
            [['nombre', 'apellidos', 'calle', 'colonia_nueva', 'colonia_foranea', 'localidad', 'municipio', 'lugar_nacimiento', 'idioma', 'servidor_publico_cargo', 'servidor_publico_institucion'], 'string', 'max' => 100],
            [['no_int', 'no_ext'], 'string', 'max' => 50],
            [['servidor_publico', 'victima_canalizada', 'requiere_orden_proteccion', 'informo_proteccion_utilizar', 'fuero_federal', 'solicita_informacion_proteccion'], 'string', 'max' => 1],
            [['banesvim'], 'string', 'max' => 15],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['arma_agresor_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarmasAgresores::className(), 'targetAttribute' => ['arma_agresor_id' => 'id']],
            [['colonia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccolonias::className(), 'targetAttribute' => ['colonia_id' => 'id']],
            [['vivienda_id'], 'exist', 'skipOnError' => true, 'targetClass' => CtiposViviendas::className(), 'targetAttribute' => ['vivienda_id' => 'id']],
            [['droga_agresion_id'], 'exist', 'skipOnError' => true, 'targetClass' => CdrogasAgresiones::className(), 'targetAttribute' => ['droga_agresion_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Centidadesfederativas::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['frecuencia_agresion_id'], 'exist', 'skipOnError' => true, 'targetClass' => CfrecuenciasAgresiones::className(), 'targetAttribute' => ['frecuencia_agresion_id' => 'id']],
            [['nivel_estudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => CnivelesEstudios::className(), 'targetAttribute' => ['nivel_estudio_id' => 'id']],
            [['lugar_violencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClugaresViolencias::className(), 'targetAttribute' => ['lugar_violencia_id' => 'id']],
            [['nacionalidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnacionalidades::className(), 'targetAttribute' => ['nacionalidad_id' => 'id']],
            [['relacion_parentezco_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crelacioparentezco::className(), 'targetAttribute' => ['relacion_parentezco_id' => 'id']],
            [['religion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Creligiones::className(), 'targetAttribute' => ['religion_id' => 'id']],
            [['sexo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csexos::className(), 'targetAttribute' => ['sexo_id' => 'id']],
            [['status_estudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => CstatusEstudios::className(), 'targetAttribute' => ['status_estudio_id' => 'id']],
            [['tipo_canalizacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => CtiposCanalizaciones::className(), 'targetAttribute' => ['tipo_canalizacion_id' => 'id']],
            [['estado_civil_id'], 'exist', 'skipOnError' => true, 'targetClass' => CestadosCiviles::className(), 'targetAttribute' => ['estado_civil_id' => 'id']],
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
            'cedula_id' => 'ID de la Cédula',
            'numero_agresores' => 'Número de agresores',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'sexo_id' => 'Sexo',
            'fecha_nac' => 'Fecha de Nacimiento',
            'edad' => 'Edad',
            'relacion_parentezco_id' => 'Relación - Parentezco',
            'estado_civil_id' => 'Estado civil',
            'calle' => 'Calle',
            'no_int' => 'Número interior',
            'no_ext' => 'Número exterior',
            'colonia_id' => 'Colonia de catálogo',
            'colonia_nueva' => 'Colonia Nueva',
            'colonia_foranea' => 'Colonia Foránea',
            'localidad' => 'Localidad',
            'municipio' => 'Municipio',
            'entidad_id' => 'Entidad federativa',
            'nacionalidad_id' => 'Nacionalidad',
            'lugar_nacimiento' => 'Lugar de nacimiento',
            'religion_id' => 'Religión',
            'vivienda_id' => 'Vivienda',
            'servicios_basicos_ids' => 'Servicios básicos',
            'nivel_estudio_id' => 'Nivel de estudio',
            'status_estudio_id' => 'Estatus de estudios',
            'idioma' => 'Idioma',
            'ocupacion_ids' => 'Ocupación',
            'fuente_ingresos_ids' => 'Fuente de ingresos',
            'ingreso_mensual' => 'Ingreso mensual',
            'servidor_publico' => 'Servidor(a) público(a)',
            'servidor_publico_cargo' => 'Cargo de servidor público',
            'servidor_publico_institucion' => 'Institución del servidor público',
            'programas_sociales_ids' => 'Programas sociales',
            'servicios_medicos_ids' => 'Servicios médicos',
            'padece_discapacidades_ids' => 'Padece discapacidad',
            'droga_agresion_id' => 'Efectos de drogas en la agresión',
            'frecuencia_agresion_id' => 'Frecuencia de la agresión',
            'arma_agresor_id' => '¿Posee algún tipo de arma ?',
            'lugar_violencia_id' => 'Lugar en que coincide con la víctima',
            'lesion_fisica_ids' => 'Lesión física',
            'lesion_agente_ids' => 'Lesión Agente',
            'lesion_area_ids' => 'Área lesionada',
            'danos_psicologicos_ids' => 'Daños psicológicos',
            'danos_economicos_ids' => 'Daños económicos o patrimoniales',
            'indicador_riesgo_ids' => 'Indicadores de riesgo',
            'victima_canalizada' => '¿La víctima ha sido canalizada ?',
            'tipo_canalizacion_id' => 'Tipo de canalización',
            'tipo_seguimiento_ids' => 'Tipo de seguimiento',
            'requiere_orden_proteccion' => '¿El caso requiere medida u orden de protección?',
            'informo_proteccion_utilizar' => '¿Se le informa a la usuaria la medida u orden de protección que debe solicitar?',
            'fuero_federal' => '¿El caso esta relacionado con delitos de fuero federal?',
            'solicita_informacion_proteccion' => '¿La usuaria solicita información para solicitar la protección?',
            'banesvim' => 'Folio BANESVIM',
            'created_at' => 'Fecha de Creación',
            'created_by' => 'Creado por',
            'updated_at' => 'Fecha de Actualización',
            'updated_by' => 'Actualizado por',
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
    public function getArmaAgresor()
    {
        return $this->hasOne(CarmasAgresores::className(), ['id' => 'arma_agresor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColonia()
    {
        return $this->hasOne(Ccolonias::className(), ['id' => 'colonia_id']);
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
    public function getDrogaAgresion()
    {
        return $this->hasOne(CdrogasAgresiones::className(), ['id' => 'droga_agresion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntidad()
    {
        return $this->hasOne(Centidadesfederativas::className(), ['id' => 'entidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuenciaAgresion()
    {
        return $this->hasOne(CfrecuenciasAgresiones::className(), ['id' => 'frecuencia_agresion_id']);
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
    public function getLugarViolencia()
    {
        return $this->hasOne(ClugaresViolencias::className(), ['id' => 'lugar_violencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNacionalidad()
    {
        return $this->hasOne(Cnacionalidades::className(), ['id' => 'nacionalidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelacionParentezco()
    {
        return $this->hasOne(Crelacioparentezco::className(), ['id' => 'relacion_parentezco_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReligion()
    {
        return $this->hasOne(Creligiones::className(), ['id' => 'religion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSexo()
    {
        return $this->hasOne(Csexos::className(), ['id' => 'sexo_id']);
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
    public function getTipoCanalizacion()
    {
        return $this->hasOne(CtiposCanalizaciones::className(), ['id' => 'tipo_canalizacion_id']);
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

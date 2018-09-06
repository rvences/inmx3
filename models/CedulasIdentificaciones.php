<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cedulas_identificaciones".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $tel_llamada
 * @property int $created_at
 * @property string $hora_inicio
 * @property string $hora_termino
 * @property string $fecha_ult_incidente
 * @property int $tipo_llamada_id
 * @property string $tipificacion_ids
 * @property int $tipo_emergencia_id
 * @property string $coorporacion_ids
 * @property int $institucion_id
 * @property string $tipoasesoria_ids
 * @property int $sexo_id
 * @property string $nombre
 * @property string $apaterno
 * @property string $amaterno
 * @property string $calle
 * @property string $no_int
 * @property string $no_ext
 * @property int $colonia_id
 * @property string $colonia_nueva
 * @property string $colonia_foranea
 * @property string $localidad
 * @property string $municipio
 * @property int $entidad_id
 * @property int $zona_id
 * @property int $congregacion_id
 * @property int $religion_id
 * @property int $nacionalidad_id
 * @property string $zona_riesgo_ids
 * @property string $horario_riesgo_ids
 * @property int $nivel_riesgo_id
 * @property string $lugar_nacimiento
 * @property string $violencia_pareja_anterior
 * @property int $created_by
 * @property string $contacto_emergencia1
 * @property string $tel_emergencia1
 * @property string $contacto_emergencia2
 * @property string $tel_emergencia2
 * @property string $situacion_desencadenante
 * @property string $menor_18
 * @property string $nombre_tutela
 * @property int $relacion_parentezco_id
 * @property string $tel_tutela
 * @property string $direccion_tutela
 * @property string $observaciones
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Ccolonias $colonia
 * @property Ccongregaciones $congregacion
 * @property Centidadesfederativas $entidad
 * @property Cinstituciones $institucion
 * @property Cnacionalidades $nacionalidad
 * @property CnivelesRiesgos $nivelRiesgo
 * @property Crelacioparentezco $relacionParentezco
 * @property Creligiones $religion
 * @property Csexos $sexo
 * @property Ctiposemergencias $tipoEmergencia
 * @property Ctiposllamadas $tipoLlamada
 * @property User $createdBy
 * @property Czonas $zona
 * @property Cedulas $cedula
 */
class CedulasIdentificaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedulas_identificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'hora_termino', 'hora_inicio',
               ], 'safe'],

            [['cedula_id', 'created_at', 'fecha_ult_incidente', 'tipo_llamada_id', 'tipo_emergencia_id', 'institucion_id', 'sexo_id', 'colonia_id', 'entidad_id', 'zona_id', 'congregacion_id', 'religion_id', 'nacionalidad_id', 'nivel_riesgo_id', 'created_by', 'relacion_parentezco_id', 'updated_at', 'updated_by'], 'integer'],
            [['fecha_ult_incidente'], 'safe'],
            //[['created_at', 'fecha_ult_incidente', 'created_by', 'updated_at', 'updated_by'], 'required'],
            //[['hora_inicio', 'hora_termino'], 'safe'],
            [['situacion_desencadenante', 'observaciones'], 'string'],
            [['tel_llamada', 'tel_emergencia1', 'tel_emergencia2', 'tel_tutela'], 'string', 'max' => 10],
            [['nombre', 'apaterno', 'amaterno', 'calle', 'colonia_nueva', 'colonia_foranea', 'localidad', 'municipio', 'lugar_nacimiento', 'contacto_emergencia1', 'contacto_emergencia2', 'nombre_tutela', 'direccion_tutela'], 'string', 'max' => 100],
            [['no_int', 'no_ext'], 'string', 'max' => 50],
            [['violencia_pareja_anterior', 'menor_18'], 'string', 'max' => 1],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['colonia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccolonias::className(), 'targetAttribute' => ['colonia_id' => 'id']],
            [['congregacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccongregaciones::className(), 'targetAttribute' => ['congregacion_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Centidadesfederativas::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cinstituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
            [['nacionalidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnacionalidades::className(), 'targetAttribute' => ['nacionalidad_id' => 'id']],
            [['nivel_riesgo_id'], 'exist', 'skipOnError' => true, 'targetClass' => CnivelesRiesgos::className(), 'targetAttribute' => ['nivel_riesgo_id' => 'id']],
            [['relacion_parentezco_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crelacioparentezco::className(), 'targetAttribute' => ['relacion_parentezco_id' => 'id']],
            [['religion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Creligiones::className(), 'targetAttribute' => ['religion_id' => 'id']],
            [['sexo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csexos::className(), 'targetAttribute' => ['sexo_id' => 'id']],
            [['tipo_emergencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposemergencias::className(), 'targetAttribute' => ['tipo_emergencia_id' => 'id']],
            [['tipo_llamada_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposllamadas::className(), 'targetAttribute' => ['tipo_llamada_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['zona_id'], 'exist', 'skipOnError' => true, 'targetClass' => Czonas::className(), 'targetAttribute' => ['zona_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],


            [['tel_llamada', 'tel_emergencia1', 'tel_emergencia2'], 'double'],

            [['tel_llamada', 'nombre', 'apaterno', 'amaterno', 'calle', 'no_int', 'no_ext', 'colonia_nueva',
                'colonia_foranea', 'localidad', 'municipio', 'lugar_nacimiento', 'contacto_emergencia1',
                'contacto_emergencia2', 'tel_emergencia1', 'tel_emergencia2', 'situacion_desencadenante', 'nombre_tutela',
                'tel_tutela', 'direccion_tutela', 'observaciones'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['nombre', 'apaterno', 'amaterno', 'calle', 'no_int', 'no_ext', 'colonia_nueva',
                'colonia_foranea', 'localidad', 'municipio', 'lugar_nacimiento', 'contacto_emergencia1',
                'contacto_emergencia2', 'situacion_desencadenante', 'nombre_tutela',
                'direccion_tutela', 'observaciones'], 'filter', 'filter' => 'strtoupper'],





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
            'tel_llamada' => 'Teléfono de la Llamada',
            'created_at' => 'Fecha de creación',
            'hora_inicio' => 'Hora Inicio',
            'hora_termino' => 'Hora Termino',
            'fecha_ult_incidente' => 'Fecha último Incidente',
            'tipo_llamada_id' => 'Tipo de llamada',
            'tipificacion_ids' => 'Tipificaciones',
            'tipo_emergencia_id' => 'Tipo de emergencia',
            'coorporacion_ids' => 'Coorporaciones',
            'institucion_id' => 'Institución a canalizar',
            'tipoasesoria_ids' => 'Tipo de asesorias',
            'sexo_id' => 'Sexo',
            'nombre' => 'Nombre',
            'apaterno' => 'Apellido paterno',
            'amaterno' => 'Apellido materno',
            'calle' => 'Calle',
            'no_int' => 'Número interior',
            'no_ext' => 'Número exterior',
            'colonia_id' => 'Colonia de catálogo',
            'colonia_nueva' => 'Colonia Nueva',
            'colonia_foranea' => 'Colonia Foránea',
            'localidad' => 'Localidad',
            'municipio' => 'Municipio',
            'entidad_id' => 'Entidad federativa',
            'zona_id' => 'Zona',
            'congregacion_id' => 'Congregación',
            'religion_id' => 'Religión',
            'nacionalidad_id' => 'Nacionalidad',
            'zona_riesgo_ids' => 'Zonas de riesgos por colonia',
            'horario_riesgo_ids' => 'Horarios del día de mayor riesgo',
            'nivel_riesgo_id' => 'Nivel de riesgo',
            'lugar_nacimiento' => 'Lugar de nacimiento',
            'violencia_pareja_anterior' => '¿Ha vivido violencia con su pareja anterior?',
            'created_by' => 'Atendida por',
            'contacto_emergencia1' => 'Contacto principal de emergencia',
            'tel_emergencia1' => 'Teléfono del contacto principal',
            'contacto_emergencia2' => 'Contacto secundario de emergencia',
            'tel_emergencia2' => 'Teléfono del contacto secundario',
            'situacion_desencadenante' => 'Situación desencadenante',
            'menor_18' => 'Menor de 18 años',
            'nombre_tutela' => 'Nombre de quién tutela',
            'relacion_parentezco_id' => 'Relacion - Parentezco del tutor',
            'tel_tutela' => 'Teléfono del tutor',
            'direccion_tutela' => 'Dirección del tutor',
            'observaciones' => 'Observaciones',
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
    public function getColonia()
    {
        return $this->hasOne(Ccolonias::className(), ['id' => 'colonia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongregacion()
    {
        return $this->hasOne(Ccongregaciones::className(), ['id' => 'congregacion_id']);
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
    public function getInstitucion()
    {
        return $this->hasOne(Cinstituciones::className(), ['id' => 'institucion_id']);
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
    public function getNivelRiesgo()
    {
        return $this->hasOne(CnivelesRiesgos::className(), ['id' => 'nivel_riesgo_id']);
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
    public function getTipoEmergencia()
    {
        return $this->hasOne(Ctiposemergencias::className(), ['id' => 'tipo_emergencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLlamada()
    {
        return $this->hasOne(Ctiposllamadas::className(), ['id' => 'tipo_llamada_id']);
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
    public function getZona()
    {
        return $this->hasOne(Czonas::className(), ['id' => 'zona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedula()
    {
        return $this->hasOne(Cedulas::className(), ['id' => 'cedula_id']);
    }
}

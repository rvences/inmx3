<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cedulas_identificaciones".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $tel_llamada
 * @property int $created_at
 * @property string $hora_inicio
 * @property string $hora_termino
 * @property int $fecha_ult_incidente
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
 * @property string $tipo_riesgo_ids
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
 * @property int $entero_servicio_id
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Ccolonias $colonia
 * @property Ccongregaciones $congregacion
 * @property Centeroservicios $enteroServicio
 * @property Centidadesfederativas $entidad
 * @property Cinstituciones $institucion
 * @property Cnacionalidades $nacionalidad
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
            [['cedula_id', 'created_at', 'fecha_ult_incidente', 'tipo_llamada_id', 'tipo_emergencia_id', 'institucion_id', 'sexo_id', 'colonia_id', 'entidad_id', 'zona_id', 'congregacion_id', 'religion_id', 'nacionalidad_id', 'created_by', 'relacion_parentezco_id', 'entero_servicio_id', 'updated_at', 'updated_by'], 'integer'],
            [['created_at', 'fecha_ult_incidente', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['hora_inicio', 'hora_termino'], 'safe'],
            [['situacion_desencadenante', 'observaciones'], 'string'],
            [['tel_llamada', 'tel_emergencia1', 'tel_emergencia2', 'tel_tutela'], 'string', 'max' => 10],
            [['tipificacion_ids', 'coorporacion_ids', 'tipoasesoria_ids', 'nombre', 'apaterno', 'amaterno', 'calle', 'colonia_nueva', 'colonia_foranea', 'localidad', 'municipio', 'zona_riesgo_ids', 'horario_riesgo_ids', 'tipo_riesgo_ids', 'lugar_nacimiento', 'contacto_emergencia1', 'contacto_emergencia2', 'nombre_tutela', 'direccion_tutela'], 'string', 'max' => 100],
            [['no_int', 'no_ext'], 'string', 'max' => 50],
            [['violencia_pareja_anterior', 'menor_18'], 'string', 'max' => 1],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['colonia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccolonias::className(), 'targetAttribute' => ['colonia_id' => 'id']],
            [['congregacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccongregaciones::className(), 'targetAttribute' => ['congregacion_id' => 'id']],
            [['entero_servicio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Centeroservicios::className(), 'targetAttribute' => ['entero_servicio_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Centidadesfederativas::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cinstituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
            [['nacionalidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnacionalidades::className(), 'targetAttribute' => ['nacionalidad_id' => 'id']],
            [['relacion_parentezco_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crelacioparentezco::className(), 'targetAttribute' => ['relacion_parentezco_id' => 'id']],
            [['religion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Creligiones::className(), 'targetAttribute' => ['religion_id' => 'id']],
            [['sexo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csexos::className(), 'targetAttribute' => ['sexo_id' => 'id']],
            [['tipo_emergencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposemergencias::className(), 'targetAttribute' => ['tipo_emergencia_id' => 'id']],
            [['tipo_llamada_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposllamadas::className(), 'targetAttribute' => ['tipo_llamada_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['zona_id'], 'exist', 'skipOnError' => true, 'targetClass' => Czonas::className(), 'targetAttribute' => ['zona_id' => 'id']],
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
            'tel_llamada' => 'Tel Llamada',
            'created_at' => 'Created At',
            'hora_inicio' => 'Hora Inicio',
            'hora_termino' => 'Hora Termino',
            'fecha_ult_incidente' => 'Fecha Ult Incidente',
            'tipo_llamada_id' => 'Tipo Llamada ID',
            'tipificacion_ids' => 'Tipificacion Ids',
            'tipo_emergencia_id' => 'Tipo Emergencia ID',
            'coorporacion_ids' => 'Coorporacion Ids',
            'institucion_id' => 'Institucion ID',
            'tipoasesoria_ids' => 'Tipoasesoria Ids',
            'sexo_id' => 'Sexo ID',
            'nombre' => 'Nombre',
            'apaterno' => 'Apaterno',
            'amaterno' => 'Amaterno',
            'calle' => 'Calle',
            'no_int' => 'No Int',
            'no_ext' => 'No Ext',
            'colonia_id' => 'Colonia ID',
            'colonia_nueva' => 'Colonia Nueva',
            'colonia_foranea' => 'Colonia Foranea',
            'localidad' => 'Localidad',
            'municipio' => 'Municipio',
            'entidad_id' => 'Entidad ID',
            'zona_id' => 'Zona ID',
            'congregacion_id' => 'Congregacion ID',
            'religion_id' => 'Religion ID',
            'nacionalidad_id' => 'Nacionalidad ID',
            'zona_riesgo_ids' => 'Zona Riesgo Ids',
            'horario_riesgo_ids' => 'Horario Riesgo Ids',
            'tipo_riesgo_ids' => 'Tipo Riesgo Ids',
            'lugar_nacimiento' => 'Lugar Nacimiento',
            'violencia_pareja_anterior' => '¿Ha vivido violencia con su pareja anterior?',
            'created_by' => 'Created By',
            'contacto_emergencia1' => 'Contacto Emergencia1',
            'tel_emergencia1' => 'Tel Emergencia1',
            'contacto_emergencia2' => 'Contacto Emergencia2',
            'tel_emergencia2' => 'Tel Emergencia2',
            'situacion_desencadenante' => 'Situacion Desencadenante',
            'menor_18' => 'Menor de 18 años',
            'nombre_tutela' => 'Nombre Tutela',
            'relacion_parentezco_id' => 'Relacion Parentezco ID',
            'tel_tutela' => 'Tel Tutela',
            'direccion_tutela' => 'Direccion Tutela',
            'observaciones' => 'Observaciones',
            'entero_servicio_id' => 'Entero Servicio ID',
            'updated_at' => 'Updated At',
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
    public function getEnteroServicio()
    {
        return $this->hasOne(Centeroservicios::className(), ['id' => 'entero_servicio_id']);
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

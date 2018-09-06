<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cedulas_violencia_genero".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $tipo_victima
 * @property string $tipo_violencia_ids
 * @property string $tipo_modalidad_ids
 * @property int $lugar_violencia_id
 * @property string $domicilio_victima
 * @property string $calle
 * @property string $no_int
 * @property string $no_ext
 * @property int $colonia_id
 * @property string $colonia_nueva
 * @property string $colonia_foranea
 * @property string $localidad
 * @property string $municipio
 * @property int $entidad_id
 * @property string $observaciones
 * @property string $consume_alcohol
 * @property string $penso_suicidarse
 * @property string $intento_suicidarse
 * @property string $hospitalizada_anteriormente
 * @property string $requiere_hospitalizacion
 * @property string $vigilancia_agresor
 * @property string $llamadas_libremente
 * @property string $visitas_libremente
 * @property string $recibio_amenazas
 * @property string $vive_agresor
 * @property string $vive_familia_agresor
 * @property string $vive_cerca_agresor
 * @property string $abandono_casa
 * @property string $lugar_vivir
 * @property string $evaluacion_psicologica
 * @property string $tiempo_agresion_servicio
 * @property string $lugar_agresion
 * @property string $solicito_ayuda
 * @property string $tipo_atencion
 * @property string $aplicaron_nom046
 * @property int $horas_despues_agresion
 * @property string $explicaron_derechos
 * @property string $institucion_atendio
 * @property string $sintomatologia_emocional_ids
 * @property string $sintomatologia_fisica_ids
 * @property string $creencias_ids
 * @property string $factores_psicosociales_ids
 * @property string $relacion_pareja_ids
 * @property int $tiempo_convivencia_anios
 * @property int $tiempo_convivencia_meses
 * @property string $adaptacion_psicologica
 * @property string $agresiones_previas
 * @property string $autonomia
 * @property string $relato_ids
 * @property string $relaciones_sociales_ids
 * @property string $tratamiento
 * @property string $tipo_demanda_ids
 * @property string $relato_juridico
 * @property string $situacion_problematica
 * @property string $procedimiento_legal
 * @property string $alcance_resultados
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Ccolonias $colonia
 * @property Centidadesfederativas $entidad
 * @property ClugaresViolencias $lugarViolencia
 * @property User $createdBy
 * @property Cedulas $cedula
 */
class CedulasViolenciaGenero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedulas_violencia_genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'lugar_violencia_id', 'colonia_id', 'entidad_id', 'horas_despues_agresion', 'tiempo_convivencia_anios', 'tiempo_convivencia_meses', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['observaciones', 'evaluacion_psicologica', 'tratamiento', 'relato_juridico', 'situacion_problematica', 'procedimiento_legal', 'alcance_resultados'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['tipo_victima'], 'string', 'max' => 9],
            [['tipo_violencia_ids', 'tipo_modalidad_ids', 'calle', 'colonia_nueva', 'colonia_foranea', 'localidad', 'municipio', 'tiempo_agresion_servicio', 'lugar_agresion', 'tipo_atencion', 'explicaron_derechos', 'institucion_atendio', 'sintomatologia_emocional_ids', 'sintomatologia_fisica_ids', 'creencias_ids', 'factores_psicosociales_ids', 'relacion_pareja_ids', 'relato_ids', 'relaciones_sociales_ids', 'tipo_demanda_ids'], 'string', 'max' => 100],
            [['domicilio_victima', 'consume_alcohol', 'penso_suicidarse', 'intento_suicidarse', 'hospitalizada_anteriormente', 'requiere_hospitalizacion', 'vigilancia_agresor', 'llamadas_libremente', 'visitas_libremente', 'recibio_amenazas', 'vive_agresor', 'vive_familia_agresor', 'vive_cerca_agresor', 'abandono_casa', 'lugar_vivir', 'solicito_ayuda', 'aplicaron_nom046', 'adaptacion_psicologica', 'agresiones_previas', 'autonomia'], 'string', 'max' => 1],
            [['no_int', 'no_ext'], 'string', 'max' => 50],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['colonia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccolonias::className(), 'targetAttribute' => ['colonia_id' => 'id']],
            [['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Centidadesfederativas::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            [['lugar_violencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClugaresViolencias::className(), 'targetAttribute' => ['lugar_violencia_id' => 'id']],
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
            'tipo_victima' => 'Tipo de víctima',
            'tipo_violencia_ids' => 'Tipo Violencia Ids',
            'tipo_modalidad_ids' => 'Tipo Modalidad Ids',
            'lugar_violencia_id' => 'Lugar Violencia ID',
            'domicilio_victima' => '¿El incidente ocurrió en el domicilio de la víctima?',
            'calle' => 'Calle',
            'no_int' => 'No Int',
            'no_ext' => 'No Ext',
            'colonia_id' => 'Colonia ID',
            'colonia_nueva' => 'Colonia Nueva',
            'colonia_foranea' => 'Colonia Foranea',
            'localidad' => 'Localidad',
            'municipio' => 'Municipio',
            'entidad_id' => 'Entidad ID',
            'observaciones' => 'Observaciones',
            'consume_alcohol' => '¿Consume alcohol, drogas y/o medicamentos controlados?',
            'penso_suicidarse' => '¿Ha pensado es suicidarse?',
            'intento_suicidarse' => '¿Ha intentado suicidarse?',
            'hospitalizada_anteriormente' => '¿Ha sido hospitalizada anteriormente por lesiones?',
            'requiere_hospitalizacion' => '¿Requiere hospitalización?',
            'vigilancia_agresor' => '¿Esta constantemente bajo la vigilancia de la persona agresora?',
            'llamadas_libremente' => '¿Puede hacer o recibir llamadas libremente?',
            'visitas_libremente' => '¿Puede hacer o recibir visitas libremente?',
            'recibio_amenazas' => '¿Ha recibido algún tipo de amenazas?',
            'vive_agresor' => '¿Vive con la persona agresora?',
            'vive_familia_agresor' => '¿Vive con la familia de la persona agresora?',
            'vive_cerca_agresor' => '¿Vive cerca de la persona agresora?',
            'abandono_casa' => '¿Tuvo que abandonar su casa?',
            'lugar_vivir' => '¿Tiene algún lugar donde vivir?',
            'evaluacion_psicologica' => 'Evaluación Psicologica',
            'tiempo_agresion_servicio' => 'Tiempo Agresión Servicio',
            'lugar_agresion' => 'Lugar Agresión',
            'solicito_ayuda' => 'Solicitó ayuda inmediata',
            'tipo_atencion' => 'Tipo de Atención',
            'aplicaron_nom046' => 'Le aplicaron la Nom046',
            'horas_despues_agresion' => 'Horas Despues de la agresión',
            'explicaron_derechos' => 'Le explicaron sus derechos',
            'institucion_atendio' => 'Institución que la atendió',
            'sintomatologia_emocional_ids' => 'Sintomatologia Emocional Ids',
            'sintomatologia_fisica_ids' => 'Sintomatologia Fisica Ids',
            'creencias_ids' => 'Creencias Ids',
            'factores_psicosociales_ids' => 'Factores Psicosociales Ids',
            'relacion_pareja_ids' => 'Relacion Pareja Ids',
            'tiempo_convivencia_anios' => 'Tiempo convivencia años',
            'tiempo_convivencia_meses' => 'Tiempo convivencia meses',
            'adaptacion_psicologica' => 'Adaptación psicológica',
            'agresiones_previas' => 'Agresiones previas',
            'autonomia' => 'Autonomia',
            'relato_ids' => 'Relato Ids',
            'relaciones_sociales_ids' => 'Relaciones Sociales Ids',
            'tratamiento' => 'Tratamiento',
            'tipo_demanda_ids' => 'Tipo Demanda Ids',
            'relato_juridico' => 'Relato Jurídico',
            'situacion_problematica' => 'Situación en que se encuentra su problemática',
            'procedimiento_legal' => 'Procedimiento legal',
            'alcance_resultados' => 'Alcance Resultados',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
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
    public function getEntidad()
    {
        return $this->hasOne(Centidadesfederativas::className(), ['id' => 'entidad_id']);
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

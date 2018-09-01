<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CedulasViolenciaGenero;

/**
 * CedulasViolenciaGeneroSearch represents the model behind the search form of `app\models\CedulasViolenciaGenero`.
 */
class CedulasViolenciaGeneroSearch extends CedulasViolenciaGenero
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'lugar_violencia_id', 'colonia_id', 'entidad_id', 'horas_despues_agresion', 'tiempo_convivencia_anios', 'tiempo_convivencia_meses', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tipo_victima', 'tipo_violencia_ids', 'tipo_modalidad_ids', 'domicilio_victima', 'calle', 'no_int', 'no_ext', 'colonia_nueva', 'colonia_foranea', 'localidad', 'municipio', 'observaciones', 'consume_alcohol', 'penso_suicidarse', 'intento_suicidarse', 'hospitalizada_anteriormente', 'requiere_hospitalizacion', 'vigilancia_agresor', 'llamadas_libremente', 'visitas_libremente', 'recibio_amenazas', 'vive_agresor', 'vive_familia_agresor', 'vive_cerca_agresor', 'abandono_casa', 'lugar_vivir', 'evaluacion_psicologica', 'tiempo_agresion_servicio', 'lugar_agresion', 'solicito_ayuda', 'tipo_atencion', 'aplicaron_nom046', 'explicaron_derechos', 'institucion_atendio', 'sintomatologia_emocional_ids', 'sintomatologia_fisica_ids', 'creencias_ids', 'factores_psicosociales_ids', 'relacion_pareja_ids', 'adaptacion_psicologica', 'agresiones_previas', 'autonomia', 'relato_ids', 'relaciones_sociales_ids', 'tratamiento', 'tipo_demanda_ids', 'relato_juridico', 'situacion_problematica', 'procedimiento_legal', 'alcance_resultados'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CedulasViolenciaGenero::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cedula_id' => $this->cedula_id,
            'lugar_violencia_id' => $this->lugar_violencia_id,
            'colonia_id' => $this->colonia_id,
            'entidad_id' => $this->entidad_id,
            'horas_despues_agresion' => $this->horas_despues_agresion,
            'tiempo_convivencia_anios' => $this->tiempo_convivencia_anios,
            'tiempo_convivencia_meses' => $this->tiempo_convivencia_meses,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'tipo_victima', $this->tipo_victima])
            ->andFilterWhere(['like', 'tipo_violencia_ids', $this->tipo_violencia_ids])
            ->andFilterWhere(['like', 'tipo_modalidad_ids', $this->tipo_modalidad_ids])
            ->andFilterWhere(['like', 'domicilio_victima', $this->domicilio_victima])
            ->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'no_int', $this->no_int])
            ->andFilterWhere(['like', 'no_ext', $this->no_ext])
            ->andFilterWhere(['like', 'colonia_nueva', $this->colonia_nueva])
            ->andFilterWhere(['like', 'colonia_foranea', $this->colonia_foranea])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'consume_alcohol', $this->consume_alcohol])
            ->andFilterWhere(['like', 'penso_suicidarse', $this->penso_suicidarse])
            ->andFilterWhere(['like', 'intento_suicidarse', $this->intento_suicidarse])
            ->andFilterWhere(['like', 'hospitalizada_anteriormente', $this->hospitalizada_anteriormente])
            ->andFilterWhere(['like', 'requiere_hospitalizacion', $this->requiere_hospitalizacion])
            ->andFilterWhere(['like', 'vigilancia_agresor', $this->vigilancia_agresor])
            ->andFilterWhere(['like', 'llamadas_libremente', $this->llamadas_libremente])
            ->andFilterWhere(['like', 'visitas_libremente', $this->visitas_libremente])
            ->andFilterWhere(['like', 'recibio_amenazas', $this->recibio_amenazas])
            ->andFilterWhere(['like', 'vive_agresor', $this->vive_agresor])
            ->andFilterWhere(['like', 'vive_familia_agresor', $this->vive_familia_agresor])
            ->andFilterWhere(['like', 'vive_cerca_agresor', $this->vive_cerca_agresor])
            ->andFilterWhere(['like', 'abandono_casa', $this->abandono_casa])
            ->andFilterWhere(['like', 'lugar_vivir', $this->lugar_vivir])
            ->andFilterWhere(['like', 'evaluacion_psicologica', $this->evaluacion_psicologica])
            ->andFilterWhere(['like', 'tiempo_agresion_servicio', $this->tiempo_agresion_servicio])
            ->andFilterWhere(['like', 'lugar_agresion', $this->lugar_agresion])
            ->andFilterWhere(['like', 'solicito_ayuda', $this->solicito_ayuda])
            ->andFilterWhere(['like', 'tipo_atencion', $this->tipo_atencion])
            ->andFilterWhere(['like', 'aplicaron_nom046', $this->aplicaron_nom046])
            ->andFilterWhere(['like', 'explicaron_derechos', $this->explicaron_derechos])
            ->andFilterWhere(['like', 'institucion_atendio', $this->institucion_atendio])
            ->andFilterWhere(['like', 'sintomatologia_emocional_ids', $this->sintomatologia_emocional_ids])
            ->andFilterWhere(['like', 'sintomatologia_fisica_ids', $this->sintomatologia_fisica_ids])
            ->andFilterWhere(['like', 'creencias_ids', $this->creencias_ids])
            ->andFilterWhere(['like', 'factores_psicosociales_ids', $this->factores_psicosociales_ids])
            ->andFilterWhere(['like', 'relacion_pareja_ids', $this->relacion_pareja_ids])
            ->andFilterWhere(['like', 'adaptacion_psicologica', $this->adaptacion_psicologica])
            ->andFilterWhere(['like', 'agresiones_previas', $this->agresiones_previas])
            ->andFilterWhere(['like', 'autonomia', $this->autonomia])
            ->andFilterWhere(['like', 'relato_ids', $this->relato_ids])
            ->andFilterWhere(['like', 'relaciones_sociales_ids', $this->relaciones_sociales_ids])
            ->andFilterWhere(['like', 'tratamiento', $this->tratamiento])
            ->andFilterWhere(['like', 'tipo_demanda_ids', $this->tipo_demanda_ids])
            ->andFilterWhere(['like', 'relato_juridico', $this->relato_juridico])
            ->andFilterWhere(['like', 'situacion_problematica', $this->situacion_problematica])
            ->andFilterWhere(['like', 'procedimiento_legal', $this->procedimiento_legal])
            ->andFilterWhere(['like', 'alcance_resultados', $this->alcance_resultados]);

        return $dataProvider;
    }
}

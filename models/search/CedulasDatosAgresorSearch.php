<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CedulasDatosAgresor;

/**
 * CedulasDatosAgresorSearch represents the model behind the search form of `app\models\CedulasDatosAgresor`.
 */
class CedulasDatosAgresorSearch extends CedulasDatosAgresor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'numero_agresores', 'sexo_id', 'edad', 'relacion_parentezco_id', 'estado_civil_id', 'colonia_id', 'entidad_id', 'nacionalidad_id', 'religion_id', 'vivienda_id', 'servicios_basicos_ids', 'nivel_estudio_id', 'status_estudio_id', 'ingreso_mensual', 'droga_agresion_id', 'frecuencia_agresion_id', 'arma_agresor_id', 'lugar_violencia_id', 'tipo_canalizacion_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['nombre', 'apellidos', 'fecha_nac', 'calle', 'no_int', 'no_ext', 'colonia_nueva', 'colonia_foranea', 'localidad', 'municipio', 'lugar_nacimiento', 'idioma', 'ocupacion_ids', 'fuente_ingresos_ids', 'servidor_publico', 'servidor_publico_cargo', 'servidor_publico_institucion', 'programas_sociales_ids', 'servicios_medicos_ids', 'padece_discapacidades_ids', 'lesion_fisica_ids', 'lesion_agente_ids', 'lesion_area_ids', 'danos_psicologicos_ids', 'danos_economicos_ids', 'indicador_riesgo_ids', 'victima_canalizada', 'tipo_seguimiento_ids', 'requiere_orden_proteccion', 'informo_proteccion_utilizar', 'fuero_federal', 'solicita_informacion_proteccion', 'banesvim'], 'safe'],
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
        $query = CedulasDatosAgresor::find();

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
            'numero_agresores' => $this->numero_agresores,
            'sexo_id' => $this->sexo_id,
            'fecha_nac' => $this->fecha_nac,
            'edad' => $this->edad,
            'relacion_parentezco_id' => $this->relacion_parentezco_id,
            'estado_civil_id' => $this->estado_civil_id,
            'colonia_id' => $this->colonia_id,
            'entidad_id' => $this->entidad_id,
            'nacionalidad_id' => $this->nacionalidad_id,
            'religion_id' => $this->religion_id,
            'vivienda_id' => $this->vivienda_id,
            'servicios_basicos_ids' => $this->servicios_basicos_ids,
            'nivel_estudio_id' => $this->nivel_estudio_id,
            'status_estudio_id' => $this->status_estudio_id,
            'ingreso_mensual' => $this->ingreso_mensual,
            'droga_agresion_id' => $this->droga_agresion_id,
            'frecuencia_agresion_id' => $this->frecuencia_agresion_id,
            'arma_agresor_id' => $this->arma_agresor_id,
            'lugar_violencia_id' => $this->lugar_violencia_id,
            'tipo_canalizacion_id' => $this->tipo_canalizacion_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'no_int', $this->no_int])
            ->andFilterWhere(['like', 'no_ext', $this->no_ext])
            ->andFilterWhere(['like', 'colonia_nueva', $this->colonia_nueva])
            ->andFilterWhere(['like', 'colonia_foranea', $this->colonia_foranea])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'lugar_nacimiento', $this->lugar_nacimiento])
            ->andFilterWhere(['like', 'idioma', $this->idioma])
            ->andFilterWhere(['like', 'ocupacion_ids', $this->ocupacion_ids])
            ->andFilterWhere(['like', 'fuente_ingresos_ids', $this->fuente_ingresos_ids])
            ->andFilterWhere(['like', 'servidor_publico', $this->servidor_publico])
            ->andFilterWhere(['like', 'servidor_publico_cargo', $this->servidor_publico_cargo])
            ->andFilterWhere(['like', 'servidor_publico_institucion', $this->servidor_publico_institucion])
            ->andFilterWhere(['like', 'programas_sociales_ids', $this->programas_sociales_ids])
            ->andFilterWhere(['like', 'servicios_medicos_ids', $this->servicios_medicos_ids])
            ->andFilterWhere(['like', 'padece_discapacidades_ids', $this->padece_discapacidades_ids])
            ->andFilterWhere(['like', 'lesion_fisica_ids', $this->lesion_fisica_ids])
            ->andFilterWhere(['like', 'lesion_agente_ids', $this->lesion_agente_ids])
            ->andFilterWhere(['like', 'lesion_area_ids', $this->lesion_area_ids])
            ->andFilterWhere(['like', 'danos_psicologicos_ids', $this->danos_psicologicos_ids])
            ->andFilterWhere(['like', 'danos_economicos_ids', $this->danos_economicos_ids])
            ->andFilterWhere(['like', 'indicador_riesgo_ids', $this->indicador_riesgo_ids])
            ->andFilterWhere(['like', 'victima_canalizada', $this->victima_canalizada])
            ->andFilterWhere(['like', 'tipo_seguimiento_ids', $this->tipo_seguimiento_ids])
            ->andFilterWhere(['like', 'requiere_orden_proteccion', $this->requiere_orden_proteccion])
            ->andFilterWhere(['like', 'informo_proteccion_utilizar', $this->informo_proteccion_utilizar])
            ->andFilterWhere(['like', 'fuero_federal', $this->fuero_federal])
            ->andFilterWhere(['like', 'solicita_informacion_proteccion', $this->solicita_informacion_proteccion])
            ->andFilterWhere(['like', 'banesvim', $this->banesvim]);

        return $dataProvider;
    }
}

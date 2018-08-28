<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CedulasIdentificaciones;

/**
 * CedulasIdentificacionesSearch represents the model behind the search form of `app\models\CedulasIdentificaciones`.
 */
class CedulasIdentificacionesSearch extends CedulasIdentificaciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'created_at', 'fecha_ult_incidente', 'tipo_llamada_id', 'tipificacion_id', 'tipo_emergencia_id', 'coorporacion_id', 'institucion_id', 'sexo_id', 'colonia_id', 'entidad_id', 'congregacion_id', 'religion_id', 'nacionalidad_id', 'created_by', 'relacion_parentezco_id', 'entero_servicio_id', 'updated_at', 'updated_by'], 'integer'],
            [['tel_llamada', 'hora_inicio', 'hora_termino', 'tipoasesoria_ids', 'nombre', 'apaterno', 'amaterno', 'calle', 'domicilio', 'no_int', 'no_ext', 'localidad', 'municipio', 'zona', 'zona_riesgo_ids', 'horario_riesgo_ids', 'tipo_riesgo_ids', 'lugar_nacimiento', 'violencia_pareja_anterior', 'contacto_emergencia1', 'tel_emergencia1', 'contacto_emergencia2', 'tel_emergencia2', 'situacion_desencadenante', 'menor_18', 'nombre_tutela', 'tel_tutela', 'direccion_tutela', 'observaciones'], 'safe'],
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
        $query = CedulasIdentificaciones::find();

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
            'created_at' => $this->created_at,
            'hora_inicio' => $this->hora_inicio,
            'hora_termino' => $this->hora_termino,
            'fecha_ult_incidente' => $this->fecha_ult_incidente,
            'tipo_llamada_id' => $this->tipo_llamada_id,
            'tipificacion_id' => $this->tipificacion_id,
            'tipo_emergencia_id' => $this->tipo_emergencia_id,
            'coorporacion_id' => $this->coorporacion_id,
            'institucion_id' => $this->institucion_id,
            'sexo_id' => $this->sexo_id,
            'colonia_id' => $this->colonia_id,
            'entidad_id' => $this->entidad_id,
            'congregacion_id' => $this->congregacion_id,
            'religion_id' => $this->religion_id,
            'nacionalidad_id' => $this->nacionalidad_id,
            'created_by' => $this->created_by,
            'relacion_parentezco_id' => $this->relacion_parentezco_id,
            'entero_servicio_id' => $this->entero_servicio_id,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'tel_llamada', $this->tel_llamada])
            ->andFilterWhere(['like', 'tipoasesoria_ids', $this->tipoasesoria_ids])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apaterno', $this->apaterno])
            ->andFilterWhere(['like', 'amaterno', $this->amaterno])
            ->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'no_int', $this->no_int])
            ->andFilterWhere(['like', 'no_ext', $this->no_ext])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'zona', $this->zona])
            ->andFilterWhere(['like', 'zona_riesgo_ids', $this->zona_riesgo_ids])
            ->andFilterWhere(['like', 'horario_riesgo_ids', $this->horario_riesgo_ids])
            ->andFilterWhere(['like', 'tipo_riesgo_ids', $this->tipo_riesgo_ids])
            ->andFilterWhere(['like', 'lugar_nacimiento', $this->lugar_nacimiento])
            ->andFilterWhere(['like', 'violencia_pareja_anterior', $this->violencia_pareja_anterior])
            ->andFilterWhere(['like', 'contacto_emergencia1', $this->contacto_emergencia1])
            ->andFilterWhere(['like', 'tel_emergencia1', $this->tel_emergencia1])
            ->andFilterWhere(['like', 'contacto_emergencia2', $this->contacto_emergencia2])
            ->andFilterWhere(['like', 'tel_emergencia2', $this->tel_emergencia2])
            ->andFilterWhere(['like', 'situacion_desencadenante', $this->situacion_desencadenante])
            ->andFilterWhere(['like', 'menor_18', $this->menor_18])
            ->andFilterWhere(['like', 'nombre_tutela', $this->nombre_tutela])
            ->andFilterWhere(['like', 'tel_tutela', $this->tel_tutela])
            ->andFilterWhere(['like', 'direccion_tutela', $this->direccion_tutela])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}

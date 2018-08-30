<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CedulasDatosGenerales;

/**
 * CedulasDatosGeneralesSearch represents the model behind the search form of `app\models\CedulasDatosGenerales`.
 */
class CedulasDatosGeneralesSearch extends CedulasDatosGenerales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'edad', 'no_hijos', 'edad_primer_embarazo', 'embarazo_violencia', 'madre_soltera', 'madre_soltera_apartir_de_id', 'meses_embarazo', 'no_gestaciones', 'mortalidad_hijo_edad', 'mortalidad_hijo_sexo_id', 'estado_civil_id', 'convivencia_id', 'vivienda_id', 'servicios_basicos_ids', 'nivel_estudio_id', 'status_estudio_id', 'numero_jornadas', 'numero_ingresos', 'horas_labor_hogar', 'horas_cuidado_otros', 'horas_trabajo', 'horas_recreacion', 'horas_autocuidado', 'horas_descanso', 'horas_autoempleo', 'ingreso_mensual', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['fecha_nac', 'grupo_etnico', 'vive_hijos', 'embarazada_actualmente', 'violencia_obstetrica', 'violencia_obstetrica_institucion', 'denuncio', 'mortalidad_hijo', 'observaciones', 'ocupacion_ids', 'fuente_ingresos_ids', 'quien_administra_dinero', 'servidor_publico', 'servidor_publico_cargo', 'servidor_publico_institucion', 'programas_sociales_ids', 'servicios_medicos_ids', 'padece_enfermedades_ids', 'autocuidado', 'autocuidado_ids', 'padece_discapacidades_ids'], 'safe'],
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
        $query = CedulasDatosGenerales::find();

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
            'edad' => $this->edad,
            'fecha_nac' => $this->fecha_nac,
            'no_hijos' => $this->no_hijos,
            'edad_primer_embarazo' => $this->edad_primer_embarazo,
            'embarazo_violencia' => $this->embarazo_violencia,
            'madre_soltera' => $this->madre_soltera,
            'madre_soltera_apartir_de_id' => $this->madre_soltera_apartir_de_id,
            'meses_embarazo' => $this->meses_embarazo,
            'no_gestaciones' => $this->no_gestaciones,
            'mortalidad_hijo_edad' => $this->mortalidad_hijo_edad,
            'mortalidad_hijo_sexo_id' => $this->mortalidad_hijo_sexo_id,
            'estado_civil_id' => $this->estado_civil_id,
            'convivencia_id' => $this->convivencia_id,
            'vivienda_id' => $this->vivienda_id,
            'servicios_basicos_ids' => $this->servicios_basicos_ids,
            'nivel_estudio_id' => $this->nivel_estudio_id,
            'status_estudio_id' => $this->status_estudio_id,
            'numero_jornadas' => $this->numero_jornadas,
            'numero_ingresos' => $this->numero_ingresos,
            'horas_labor_hogar' => $this->horas_labor_hogar,
            'horas_cuidado_otros' => $this->horas_cuidado_otros,
            'horas_trabajo' => $this->horas_trabajo,
            'horas_recreacion' => $this->horas_recreacion,
            'horas_autocuidado' => $this->horas_autocuidado,
            'horas_descanso' => $this->horas_descanso,
            'horas_autoempleo' => $this->horas_autoempleo,
            'ingreso_mensual' => $this->ingreso_mensual,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'grupo_etnico', $this->grupo_etnico])
            ->andFilterWhere(['like', 'vive_hijos', $this->vive_hijos])
            ->andFilterWhere(['like', 'embarazada_actualmente', $this->embarazada_actualmente])
            ->andFilterWhere(['like', 'violencia_obstetrica', $this->violencia_obstetrica])
            ->andFilterWhere(['like', 'violencia_obstetrica_institucion', $this->violencia_obstetrica_institucion])
            ->andFilterWhere(['like', 'denuncio', $this->denuncio])
            ->andFilterWhere(['like', 'mortalidad_hijo', $this->mortalidad_hijo])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'ocupacion_ids', $this->ocupacion_ids])
            ->andFilterWhere(['like', 'fuente_ingresos_ids', $this->fuente_ingresos_ids])
            ->andFilterWhere(['like', 'quien_administra_dinero', $this->quien_administra_dinero])
            ->andFilterWhere(['like', 'servidor_publico', $this->servidor_publico])
            ->andFilterWhere(['like', 'servidor_publico_cargo', $this->servidor_publico_cargo])
            ->andFilterWhere(['like', 'servidor_publico_institucion', $this->servidor_publico_institucion])
            ->andFilterWhere(['like', 'programas_sociales_ids', $this->programas_sociales_ids])
            ->andFilterWhere(['like', 'servicios_medicos_ids', $this->servicios_medicos_ids])
            ->andFilterWhere(['like', 'padece_enfermedades_ids', $this->padece_enfermedades_ids])
            ->andFilterWhere(['like', 'autocuidado', $this->autocuidado])
            ->andFilterWhere(['like', 'autocuidado_ids', $this->autocuidado_ids])
            ->andFilterWhere(['like', 'padece_discapacidades_ids', $this->padece_discapacidades_ids]);

        return $dataProvider;
    }
}

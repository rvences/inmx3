<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CedulasViolenciaGeneroRuta;

/**
 * CedulasViolenciaGeneroRutaSearch represents the model behind the search form of `app\models\CedulasViolenciaGeneroRuta`.
 */
class CedulasViolenciaGeneroRutaSearch extends CedulasViolenciaGeneroRuta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['institucion', 'servicio', 'calidad'], 'safe'],
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
        $query = CedulasViolenciaGeneroRuta::find();

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
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'institucion', $this->institucion])
            ->andFilterWhere(['like', 'servicio', $this->servicio])
            ->andFilterWhere(['like', 'calidad', $this->calidad]);

        return $dataProvider;
    }
}

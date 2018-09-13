<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EncuestaTelefonica;
use yii\db\Expression;

/**
 * EncuestaTelefonicaSearch represents the model behind the search form of `app\models\EncuestaTelefonica`.
 */
class EncuestaTelefonicaSearch extends EncuestaTelefonica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['search_telefono', 'search_nombre'], 'safe'],
            [['id', 'cedula_identificacion_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['asesoria_correcta', 'asesoria_correcta_info', 'atencion_correcta', 'atencion_correcta_info', 'volver_llamar', 'volver_llamar_info', 'recomienda_linea', 'recomienda_linea_info', 'como_entero', 'ayuda_adicional', 'observaciones'], 'safe'],
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

        $fullName = new Expression('CONCAT_WS(" ", c.nombre, c.apaterno, c.amaterno)');
        $query = EncuestaTelefonica::find();

        $query->select([
            'e.*',
            'search_telefono' => 'c.tel_llamada',
            'search_nombre' => $fullName,
            'cedula_id' => 'c.cedula_id',
            'apaterno' => 'c.apaterno',
            'amaterno' => 'c.amaterno'

        ]);
        $query->alias('e');
        $query->joinWith('cedulasIdentificaciones c');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'search_telefono',
                    'search_nombre' => [
                        'asc' => [(string)$fullName => SORT_ASC],
                        'desc' => [(string)$fullName => SORT_DESC],
                    ],
                    'asesoria_correcta',
                ],
                'defaultOrder' => [
                    'asesoria_correcta' => SORT_ASC,
                ]
            ]

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
            'cedula_identificacion_id' => $this->cedula_identificacion_id,

        ]);

        $query->andFilterWhere(['like', 'asesoria_correcta', $this->asesoria_correcta])
            ->andFilterWhere(['like', 'tel_llamada', $this->search_telefono])
            ->andFilterWhere(['like', $fullName, $this->search_nombre]);
        return $dataProvider;
    }
}

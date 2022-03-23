<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diagnosa;

/**
 * DiagnosaSearch represents the model behind the search form of `app\models\Diagnosa`.
 */
class DiagnosaSearch extends Diagnosa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_diagnosa', 'nama_diagnosa', 'solusi'], 'safe'],
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
        $query = Diagnosa::find();

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
        $query->andFilterWhere(['like', 'kode_diagnosa', $this->kode_diagnosa])
            ->andFilterWhere(['like', 'nama_diagnosa', $this->nama_diagnosa])
            ->andFilterWhere(['like', 'solusi', $this->solusi]);

        return $dataProvider;
    }
}

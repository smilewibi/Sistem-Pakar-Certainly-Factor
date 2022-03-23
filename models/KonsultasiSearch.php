<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Konsultasi;

/**
 * KonsultasiSearch represents the model behind the search form of `app\models\Konsultasi`.
 */
class KonsultasiSearch extends Konsultasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_konsultasi', 'usia_penderita', 'id_user'], 'integer'],
            [['nama_penderita', 'jenkel', 'alamat_penderita', 'kkode_diagnosa', 'tanggal'], 'safe'],
            [['hasil_cf'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Konsultasi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
			'defaultOrder' => [
					'id_konsultasi' => SORT_DESC,
				]
			],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_konsultasi' => $this->id_konsultasi,
            'tanggal' => $this->tanggal,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nama_penderita', $this->nama_penderita])
            ->andFilterWhere(['like', 'jenkel', $this->jenkel])
            ->andFilterWhere(['like', 'alamat_penderita', $this->alamat_penderita])
            ->andFilterWhere(['like', 'kkode_diagnosa', $this->kkode_diagnosa]);

        return $dataProvider;
    }
}

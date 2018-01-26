<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DaftarPeriksa;

/**
 * DaftarPeriksaSearch represents the model behind the search form of `common\models\DaftarPeriksa`.
 */
class DaftarPeriksaSearch extends DaftarPeriksa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DAFTAR', 'ID_PASIEN', 'ID_DOKTER', 'ID_URUT'], 'integer'],
            [['TANGGAL_PERIKAS', 'KELUHAN', 'STATUS', 'WAKTU_DAFTAR'], 'safe'],
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
        $query = DaftarPeriksa::find();

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
            'ID_DAFTAR' => $this->ID_DAFTAR,
            'ID_PASIEN' => $this->ID_PASIEN,
            'ID_DOKTER' => $this->ID_DOKTER,
            'TANGGAL_PERIKAS' => $this->TANGGAL_PERIKAS,
            'WAKTU_DAFTAR' => $this->WAKTU_DAFTAR,
            'ID_URUT' => $this->ID_URUT,
        ]);

        $query->andFilterWhere(['like', 'KELUHAN', $this->KELUHAN])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS]);

        return $dataProvider;
    }
}

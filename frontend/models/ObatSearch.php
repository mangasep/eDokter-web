<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Obat;

/**
 * ObatSearch represents the model behind the search form of `common\models\Obat`.
 */
class ObatSearch extends Obat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_OBAT', 'HARGA', 'JUMLAH_STOK'], 'integer'],
            [['NAMA_OBAT', 'PRODUKSI', 'TANGGAL_MASUK'], 'safe'],
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
        $query = Obat::find();

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
            'ID_OBAT' => $this->ID_OBAT,
            'HARGA' => $this->HARGA,
            'JUMLAH_STOK' => $this->JUMLAH_STOK,
            'TANGGAL_MASUK' => $this->TANGGAL_MASUK,
        ]);

        $query->andFilterWhere(['like', 'NAMA_OBAT', $this->NAMA_OBAT])
            ->andFilterWhere(['like', 'PRODUKSI', $this->PRODUKSI]);

        return $dataProvider;
    }
}

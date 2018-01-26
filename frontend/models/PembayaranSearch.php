<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pembayaran;

/**
 * PembayaranSearch represents the model behind the search form of `common\models\Pembayaran`.
 */
class PembayaranSearch extends Pembayaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PEMBAYARAN', 'ID_RESEP', 'ID_PERIKSA', 'STATUS'], 'integer'],
            [['BIAYA_PERIKSA', 'TOTAL', 'BAYAR', 'KEMBALI'], 'safe'],
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
        $query = Pembayaran::find();

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
            'ID_PEMBAYARAN' => $this->ID_PEMBAYARAN,
            'ID_RESEP' => $this->ID_RESEP,
            'ID_PERIKSA' => $this->ID_PERIKSA,
            'STATUS' => $this->STATUS,
        ]);

        $query->andFilterWhere(['like', 'BIAYA_PERIKSA', $this->BIAYA_PERIKSA])
            ->andFilterWhere(['like', 'TOTAL', $this->TOTAL])
            ->andFilterWhere(['like', 'BAYAR', $this->BAYAR])
            ->andFilterWhere(['like', 'KEMBALI', $this->KEMBALI]);

        return $dataProvider;
    }
}

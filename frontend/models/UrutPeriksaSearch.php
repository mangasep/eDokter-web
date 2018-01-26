<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UrutPeriksa;

/**
 * UrutPeriksaSearch represents the model behind the search form of `common\models\UrutPeriksa`.
 */
class UrutPeriksaSearch extends UrutPeriksa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_URUT', 'NO_URUT'], 'integer'],
            [['WAKTU_PERIKSA'], 'safe'],
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
        $query = UrutPeriksa::find();

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
            'ID_URUT' => $this->ID_URUT,
            'NO_URUT' => $this->NO_URUT,
            'WAKTU_PERIKSA' => $this->WAKTU_PERIKSA,
        ]);

        return $dataProvider;
    }
}

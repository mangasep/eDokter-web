<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Periksa;

/**
 * PeriksaSearch represents the model behind the search form of `common\models\Periksa`.
 */
class PeriksaSearch extends Periksa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PERIKSA', 'ID_DOKTER', 'ID_PASIEN'], 'integer'],
            [['DIAGNOSA', 'CATATAN'], 'safe'],
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
        $query = Periksa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['ID_DAFTAR' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_PERIKSA' => $this->ID_PERIKSA,
            'ID_DOKTER' => $this->ID_DOKTER,
            'ID_PASIEN' => $this->ID_PASIEN,
        ]);

        $query->andFilterWhere(['like', 'DIAGNOSA', $this->DIAGNOSA])
            ->andFilterWhere(['like', 'CATATAN', $this->CATATAN]);

        return $dataProvider;
    }
}

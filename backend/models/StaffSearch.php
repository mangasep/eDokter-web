<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Staff;

/**
 * StaffSearch represents the model behind the search form of `common\models\Staff`.
 */
class StaffSearch extends Staff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_STAFF', 'user_id', 'STATUS'], 'integer'],
            [['NAMA_STAFF', 'EMAIL', 'USERNAME', 'PASSWORD', 'NO_TELPN', 'ALAMAT', 'AGAMA', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'JOB_DESC', 'pic', 'created_at', 'updated_at'], 'safe'],
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
        $query = Staff::find();

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
            'ID_STAFF' => $this->ID_STAFF,
            'user_id' => $this->user_id,
            'TANGGAL_LAHIR' => $this->TANGGAL_LAHIR,
            'STATUS' => $this->STATUS,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'NAMA_STAFF', $this->NAMA_STAFF])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'USERNAME', $this->USERNAME])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD])
            ->andFilterWhere(['like', 'NO_TELPN', $this->NO_TELPN])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'AGAMA', $this->AGAMA])
            ->andFilterWhere(['like', 'TEMPAT_LAHIR', $this->TEMPAT_LAHIR])
            ->andFilterWhere(['like', 'JOB_DESC', $this->JOB_DESC])
            ->andFilterWhere(['like', 'pic', $this->pic]);

        return $dataProvider;
    }
}

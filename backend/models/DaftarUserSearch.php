<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DokterUser;

/**
 * DaftarUserSearch represents the model behind the search form of `common\models\DokterUser`.
 */
class DaftarUserSearch extends DokterUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DOKTER', 'ID_USER', 'STATUS', 'STATUS_AKUN'], 'integer'],
            [['NAMA_DOKTER', 'EMAIL', 'USERNAME', 'PASSWORD', 'NO_TELPN', 'ALAMAT', 'AGAMA', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'NO_PRAKTEK', 'SPESIALIS'], 'safe'],
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
        $query = DokterUser::find();

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
            'ID_DOKTER' => $this->ID_DOKTER,
            'ID_USER' => $this->ID_USER,
            'TANGGAL_LAHIR' => $this->TANGGAL_LAHIR,
            'STATUS' => $this->STATUS,
            'STATUS_AKUN' => $this->STATUS_AKUN,
        ]);

        $query->andFilterWhere(['like', 'NAMA_DOKTER', $this->NAMA_DOKTER])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'USERNAME', $this->USERNAME])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD])
            ->andFilterWhere(['like', 'NO_TELPN', $this->NO_TELPN])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'AGAMA', $this->AGAMA])
            ->andFilterWhere(['like', 'TEMPAT_LAHIR', $this->TEMPAT_LAHIR])
            ->andFilterWhere(['like', 'NO_PRAKTEK', $this->NO_PRAKTEK])
            ->andFilterWhere(['like', 'SPESIALIS', $this->SPESIALIS]);

        return $dataProvider;
    }
}

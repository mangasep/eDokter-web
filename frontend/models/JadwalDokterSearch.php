<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JadwalDokter;

/**
 * JadwalDokterSearch represents the model behind the search form of `common\models\JadwalDokter`.
 */
class JadwalDokterSearch extends JadwalDokter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_JADWAL', 'ID_DOKTER'], 'integer'],
            [['WAKTU_MULAI', 'WAKTU_SELESAI'], 'safe'],
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
        $query = JadwalDokter::find();

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
            'ID_JADWAL' => $this->ID_JADWAL,
            'WAKTU_MULAI' => $this->WAKTU_MULAI,
            'WAKTU_SELESAI' => $this->WAKTU_SELESAI,
            'ID_DOKTER' => $this->ID_DOKTER,
        ]);

        return $dataProvider;
    }
}

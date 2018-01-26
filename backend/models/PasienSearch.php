<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pasien;

/**
 * PasienSearch represents the model behind the search form of `common\models\Pasien`.
 */
class PasienSearch extends Pasien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PASIEN', 'ID_USER', 'BERAT_BADAN', 'TINGGI_BADAN', 'STATUS'], 'integer'],
            [['NAMA_PASIEN', 'EMAIL', 'USERNAME', 'PASSWORD', 'NO_TELPN', 'ALAMAT', 'AGAMA', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'GOL_DARAH'], 'safe'],
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
        $query = Pasien::find();

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
            'ID_PASIEN' => $this->ID_PASIEN,
            'ID_USER' => $this->ID_USER,
            'TANGGAL_LAHIR' => $this->TANGGAL_LAHIR,
            'BERAT_BADAN' => $this->BERAT_BADAN,
            'TINGGI_BADAN' => $this->TINGGI_BADAN,
            'STATUS' => $this->STATUS,
        ]);

        $query->andFilterWhere(['like', 'NAMA_PASIEN', $this->NAMA_PASIEN])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'USERNAME', $this->USERNAME])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD])
            ->andFilterWhere(['like', 'NO_TELPN', $this->NO_TELPN])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'AGAMA', $this->AGAMA])
            ->andFilterWhere(['like', 'TEMPAT_LAHIR', $this->TEMPAT_LAHIR])
            ->andFilterWhere(['like', 'GOL_DARAH', $this->GOL_DARAH]);

        return $dataProvider;
    }
}

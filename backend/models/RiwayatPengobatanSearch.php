<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RiwayatPengobatan;

/**
 * RiwayatPengobatanSearch represents the model behind the search form about `backend\models\RiwayatPengobatan`.
 */
class RiwayatPengobatanSearch extends RiwayatPengobatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'anamnesa_id', 'lama_pengobatan'], 'integer'],
            [['nama_obat', 'frekuensi', 'lama_pengobatan_waktu'], 'safe'],
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
        $query = RiwayatPengobatan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'anamnesa_id' => $this->anamnesa_id,
            'lama_pengobatan' => $this->lama_pengobatan,
        ]);

        $query->andFilterWhere(['like', 'nama_obat', $this->nama_obat])
            ->andFilterWhere(['like', 'frekuensi', $this->frekuensi])
            ->andFilterWhere(['like', 'lama_pengobatan_waktu', $this->lama_pengobatan_waktu]);

        return $dataProvider;
    }
}

<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AsuransiProvider;

/**
 * AsuransiProviderSearch represents the model behind the search form about `backend\models\AsuransiProvider`.
 */
class AsuransiProviderSearch extends AsuransiProvider
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pasien_id'], 'integer'],
            [['alamat', 'penanggung_jawab', 'no_pks', 'tgl_mulai_ks', 'tgl_selesai_ks'], 'safe'],
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
        $query = AsuransiProvider::find();

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
            'pasien_id' => $this->pasien_id,
            'tgl_mulai_ks' => $this->tgl_mulai_ks,
            'tgl_selesai_ks' => $this->tgl_selesai_ks,
        ]);

        $query->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'penanggung_jawab', $this->penanggung_jawab])
            ->andFilterWhere(['like', 'no_pks', $this->no_pks]);

        return $dataProvider;
    }
}

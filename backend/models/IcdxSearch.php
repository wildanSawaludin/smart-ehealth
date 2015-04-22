<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Icdx;

/**
 * IcdxSearch represents the model behind the search form about `backend\models\Icdx`.
 */
class IcdxSearch extends Icdx
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'penyakit_primer'], 'integer'],
            [['kode', 'inggris', 'indonesia', 'nama_lazim', 'anamnesa', 'pemeriksaan_fisik', 'pemeriksaan_penunjang', 'terapi_tindakan', 'gizi_nutrisi'], 'safe'],
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
        $query = Icdx::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'penyakit_primer' => $this->penyakit_primer,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'inggris', $this->inggris])
            ->andFilterWhere(['like', 'indonesia', $this->indonesia])
            ->andFilterWhere(['like', 'nama_lazim', $this->nama_lazim])
            ->andFilterWhere(['like', 'anamnesa', $this->anamnesa])
            ->andFilterWhere(['like', 'pemeriksaan_fisik', $this->pemeriksaan_fisik])
            ->andFilterWhere(['like', 'pemeriksaan_penunjang', $this->pemeriksaan_penunjang])
            ->andFilterWhere(['like', 'terapi_tindakan', $this->terapi_tindakan])
            ->andFilterWhere(['like', 'gizi_nutrisi', $this->gizi_nutrisi]);

        return $dataProvider;
    }
}

<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pasien;

/**
 * PasienSearch represents the model behind the search form about `backend\models\Pasien`.
 */
class PasienSearch extends Pasien {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['nama', 'tempat_lahir', 'tgl_lahir', 'jenkel', 'goldar', 'agama', 'pekerjaan', 'warga_negara', 'alamat', 'notelp', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'marital_status', 'nama_pasangan', 'pekerjaan_pasangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Pasien::find();

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
            'tgl_lahir' => $this->tgl_lahir
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
                ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
                ->andFilterWhere(['like', 'jenkel', $this->jenkel])
                ->andFilterWhere(['like', 'goldar', $this->goldar])
                ->andFilterWhere(['like', 'agama', $this->agama])
                ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
                ->andFilterWhere(['like', 'warga_negara', $this->warga_negara])
                ->andFilterWhere(['like', 'alamat', $this->alamat])
                ->andFilterWhere(['like', 'notelp', $this->notelp])
                ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
                ->andFilterWhere(['like', 'pekerjaan_ayah', $this->pekerjaan_ayah])
                ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
                ->andFilterWhere(['like', 'pekerjaan_ibu', $this->pekerjaan_ibu])
                ->andFilterWhere(['like', 'marital_status', $this->marital_status])
                ->andFilterWhere(['like', 'nama_pasangan', $this->nama_pasangan])
                ->andFilterWhere(['like', 'pekerjaan_pasangan', $this->pekerjaan_pasangan]);

        return $dataProvider;
    }

}

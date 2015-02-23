<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Anamnesa;

/**
 * AnamnesaSearch represents the model behind the search form about `backend\models\Anamnesa`.
 */
class AnamnesaSearch extends Anamnesa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'registrasi_id', 'user_id', 'keluhan_berlangsung_nil', 'keluhan_durasi_nil', 'keluhan_menjalar_pil', 'keljalar_kepala_pil', 'keljalar_wajah_pil', 'keljalar_mata_pil', 'keljalar_hidung_pil', 'keljalar_mulut_pil', 'keljalar_telinga_pil', 'keljalar_leher_pil', 'keljalar_tenggorokan_pil', 'keljalar_bahu_pil', 'keljalar_tangan_pil', 'keljalar_dada_pil', 'keljalar_perut_pil', 'keljalar_pinggang_pil', 'keljalar_punggung_pil', 'keljalar_kelamin_pil', 'keljalar_kaki_pil', 'keljalar_seltub_pil', 'kel_tembus_pil', 'kel_punkel_nil', 'riwayat_penyakit_pil', 'riwayatsakit_icdx_id', 'riwayat_penyakit_nil', 'riwayat_perawatan_pil', 'riwayat_perawatan_nil', 'riwayat_pengobatan_pil', 'riwayat_pengobatan_id', 'riwayat_keluarga_pil', 'riwayatkel_icdx_id', 'riwayat_lainnya_pil', 'riwayat_alergi_pil', 'alergi_obat_pil', 'alergi_makanan_pil', 'alergi_sabun_pil', 'alergi_udara_pil', 'alergi_debu_pil', 'alergi_lainnya_pil', 'riwayat_transfusi_pil', 'transfusi_wb_pil', 'transfusi_wb_jumlah', 'transfusi_trombosit_pil', 'transfusi_trombosit_jumlah', 'transfusi_eritrosit_pil', 'transfusi_eritrosit_jumlah', 'riwayat_imunisasi_pil', 'kebiasaan_obat_pil', 'kebiasaan_obat_id', 'kebiasaan_rokok_pil', 'kebiasaan_rokok_jmlh', 'kebiasaan_rokok_nil', 'kebiasaan_alkohol_pil', 'kebiasaan_alkohol_nil', 'perawatan_mandi_pil', 'perawatan_mandi_jmlh', 'perawatan_rambut_pil', 'perawatan_rambut_jmlh', 'perawatan_kuku_pil', 'perawatan_kuku_jmlh', 'perawatan_tidur_pil', 'perawatan_tidur_jmlh', 'kebiasaan_nutrisi_pil', 'nutrisi_selera_pil', 'makan_frekuensi_pil', 'makan_pembatasan_pil', 'makan_menu_pil', 'minum_jenis_pil', 'minum_frekuensi_pil', 'minum_cara_pil', 'kebiasan_olahraga_pil', 'olahraga_frekuensi_kali', 'kebiasaan_kegiatan_pil', 'kegiatan_frekuensi_kali', 'psikososial_hubkel_pil', 'psikososial_temting_pil', 'psikososial_tingber_pil'], 'integer'],
            [['keluhan', 'keluhan_rincian', 'keluhan_lokasi', 'keluhan_lokasi_umum', 'keluhan_sub_lokasi', 'keluhan_berlangsung_lama', 'keluhan_faktor_pencetus', 'keluhan_durasi_lama', 'keluhan_durasi_jenis', 'keluhan_durasi_pereda', 'keluhan_durasi_pemberat', 'keljalar_kepala', 'keljalar_wajah', 'keljalar_mata', 'keljalar_mulut', 'keljalar_telinga', 'keljalar_leher', 'keljalar_bahu', 'keljalar_tangan', 'keljalar_dada', 'keljalar_perut', 'keljalar_punggung', 'keljalar_kelamin', 'keljalar_kaki', 'kel_punkel_lama', 'kel_kemunculan', 'kel_kemunculan_saat', 'kel_penjelasan_awal', 'kel_penjelasan_kemudian', 'kel_penjelasan_saat', 'riwayat_penyakit_nama', 'riwayat_penyakit_lama', 'riwayat_perawatan_waktu', 'riwayat_perawatan_tempat', 'riwayat_perawatan_lama', 'alergi_obat_jenis', 'alergi_makanan', 'alergi_sabun', 'alergi_udara', 'alergi_lainnya', 'transfusi_wb_waktu', 'transfusi_wb_ukuran', 'transfusi_trombosit_waktu', 'transfusi_trombosit_ukuran', 'transfusi_eritrosit_waktu', 'transfusi_eritrosit_ukuran', 'riwayat_imunisasi', 'kebiasaan_rokok_satuan', 'kebiasaan_rokok_lama', 'kebiasaan_rokok_awal', 'kebiasaan_rokok_berhenti', 'kebiasaan_rokok_jenis', 'kebiasaan_alkohol_lama', 'kebiasaan_alkohol_awal', 'kebiasaan_alkohol_berhenti', 'kebiasaan_alkohol_jenis', 'kebiasaan_perawatan_pil', 'perawatan_mandi_lama', 'perawatan_mandi_oleh', 'perawatan_rambut_lama', 'perawatan_rambut_oleh', 'perawatan_kuku_lama', 'perawatan_kuku_oleh', 'perawatan_tidur_lama', 'perawatan_tidur_oleh', 'nutrisi_selera_makan', 'makan_frekuensi', 'makan_pembatasan_asupan', 'makan_menu_pokok', 'makan_menu_lauk', 'makan_menu_sayur', 'makan_menu_buah', 'minum_jenis', 'minum_frekuensi', 'minum_cara_pemenuhan', 'olahraga_jenis', 'olahraga_frekuensi_lama', 'kegiatan_jenis', 'kegiatan_frekuensi_lama', 'faktor_resiko_riwayat', 'faktor_resiko_kebiasaan', 'psikososial_hubkel', 'psikososial_temting', 'psikososial_tingber'], 'safe'],
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
        $query = Anamnesa::find();

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
            'parent_id' => $this->parent_id,
            'registrasi_id' => $this->registrasi_id,
            'user_id' => $this->user_id,
            'keluhan_berlangsung_nil' => $this->keluhan_berlangsung_nil,
            'keluhan_durasi_nil' => $this->keluhan_durasi_nil,
            'keluhan_menjalar_pil' => $this->keluhan_menjalar_pil,
            'keljalar_kepala_pil' => $this->keljalar_kepala_pil,
            'keljalar_wajah_pil' => $this->keljalar_wajah_pil,
            'keljalar_mata_pil' => $this->keljalar_mata_pil,
            'keljalar_hidung_pil' => $this->keljalar_hidung_pil,
            'keljalar_mulut_pil' => $this->keljalar_mulut_pil,
            'keljalar_telinga_pil' => $this->keljalar_telinga_pil,
            'keljalar_leher_pil' => $this->keljalar_leher_pil,
            'keljalar_tenggorokan_pil' => $this->keljalar_tenggorokan_pil,
            'keljalar_bahu_pil' => $this->keljalar_bahu_pil,
            'keljalar_tangan_pil' => $this->keljalar_tangan_pil,
            'keljalar_dada_pil' => $this->keljalar_dada_pil,
            'keljalar_perut_pil' => $this->keljalar_perut_pil,
            'keljalar_pinggang_pil' => $this->keljalar_pinggang_pil,
            'keljalar_punggung_pil' => $this->keljalar_punggung_pil,
            'keljalar_kelamin_pil' => $this->keljalar_kelamin_pil,
            'keljalar_kaki_pil' => $this->keljalar_kaki_pil,
            'keljalar_seltub_pil' => $this->keljalar_seltub_pil,
            'kel_tembus_pil' => $this->kel_tembus_pil,
            'kel_punkel_nil' => $this->kel_punkel_nil,
            'riwayat_penyakit_pil' => $this->riwayat_penyakit_pil,
            'riwayatsakit_icdx_id' => $this->riwayatsakit_icdx_id,
            'riwayat_penyakit_nil' => $this->riwayat_penyakit_nil,
            'riwayat_perawatan_pil' => $this->riwayat_perawatan_pil,
            'riwayat_perawatan_waktu' => $this->riwayat_perawatan_waktu,
            'riwayat_perawatan_nil' => $this->riwayat_perawatan_nil,
            'riwayat_pengobatan_pil' => $this->riwayat_pengobatan_pil,
            'riwayat_pengobatan_id' => $this->riwayat_pengobatan_id,
            'riwayat_keluarga_pil' => $this->riwayat_keluarga_pil,
            'riwayatkel_icdx_id' => $this->riwayatkel_icdx_id,
            'riwayat_lainnya_pil' => $this->riwayat_lainnya_pil,
            'riwayat_alergi_pil' => $this->riwayat_alergi_pil,
            'alergi_obat_pil' => $this->alergi_obat_pil,
            'alergi_makanan_pil' => $this->alergi_makanan_pil,
            'alergi_sabun_pil' => $this->alergi_sabun_pil,
            'alergi_udara_pil' => $this->alergi_udara_pil,
            'alergi_debu_pil' => $this->alergi_debu_pil,
            'alergi_lainnya_pil' => $this->alergi_lainnya_pil,
            'riwayat_transfusi_pil' => $this->riwayat_transfusi_pil,
            'transfusi_wb_pil' => $this->transfusi_wb_pil,
            'transfusi_wb_waktu' => $this->transfusi_wb_waktu,
            'transfusi_wb_jumlah' => $this->transfusi_wb_jumlah,
            'transfusi_trombosit_pil' => $this->transfusi_trombosit_pil,
            'transfusi_trombosit_waktu' => $this->transfusi_trombosit_waktu,
            'transfusi_trombosit_jumlah' => $this->transfusi_trombosit_jumlah,
            'transfusi_eritrosit_pil' => $this->transfusi_eritrosit_pil,
            'transfusi_eritrosit_waktu' => $this->transfusi_eritrosit_waktu,
            'transfusi_eritrosit_jumlah' => $this->transfusi_eritrosit_jumlah,
            'riwayat_imunisasi_pil' => $this->riwayat_imunisasi_pil,
            'kebiasaan_obat_pil' => $this->kebiasaan_obat_pil,
            'kebiasaan_obat_id' => $this->kebiasaan_obat_id,
            'kebiasaan_rokok_pil' => $this->kebiasaan_rokok_pil,
            'kebiasaan_rokok_jmlh' => $this->kebiasaan_rokok_jmlh,
            'kebiasaan_rokok_nil' => $this->kebiasaan_rokok_nil,
            'kebiasaan_alkohol_pil' => $this->kebiasaan_alkohol_pil,
            'kebiasaan_alkohol_nil' => $this->kebiasaan_alkohol_nil,
            'perawatan_mandi_pil' => $this->perawatan_mandi_pil,
            'perawatan_mandi_jmlh' => $this->perawatan_mandi_jmlh,
            'perawatan_rambut_pil' => $this->perawatan_rambut_pil,
            'perawatan_rambut_jmlh' => $this->perawatan_rambut_jmlh,
            'perawatan_kuku_pil' => $this->perawatan_kuku_pil,
            'perawatan_kuku_jmlh' => $this->perawatan_kuku_jmlh,
            'perawatan_tidur_pil' => $this->perawatan_tidur_pil,
            'perawatan_tidur_jmlh' => $this->perawatan_tidur_jmlh,
            'kebiasaan_nutrisi_pil' => $this->kebiasaan_nutrisi_pil,
            'nutrisi_selera_pil' => $this->nutrisi_selera_pil,
            'makan_frekuensi_pil' => $this->makan_frekuensi_pil,
            'makan_pembatasan_pil' => $this->makan_pembatasan_pil,
            'makan_menu_pil' => $this->makan_menu_pil,
            'minum_jenis_pil' => $this->minum_jenis_pil,
            'minum_frekuensi_pil' => $this->minum_frekuensi_pil,
            'minum_cara_pil' => $this->minum_cara_pil,
            'kebiasan_olahraga_pil' => $this->kebiasan_olahraga_pil,
            'olahraga_frekuensi_kali' => $this->olahraga_frekuensi_kali,
            'kebiasaan_kegiatan_pil' => $this->kebiasaan_kegiatan_pil,
            'kegiatan_frekuensi_kali' => $this->kegiatan_frekuensi_kali,
            'psikososial_hubkel_pil' => $this->psikososial_hubkel_pil,
            'psikososial_temting_pil' => $this->psikososial_temting_pil,
            'psikososial_tingber_pil' => $this->psikososial_tingber_pil,
        ]);

        $query->andFilterWhere(['like', 'keluhan', $this->keluhan])
            ->andFilterWhere(['like', 'keluhan_rincian', $this->keluhan_rincian])
            ->andFilterWhere(['like', 'keluhan_lokasi', $this->keluhan_lokasi])
            ->andFilterWhere(['like', 'keluhan_lokasi_umum', $this->keluhan_lokasi_umum])
            ->andFilterWhere(['like', 'keluhan_sub_lokasi', $this->keluhan_sub_lokasi])
            ->andFilterWhere(['like', 'keluhan_berlangsung_lama', $this->keluhan_berlangsung_lama])
            ->andFilterWhere(['like', 'keluhan_faktor_pencetus', $this->keluhan_faktor_pencetus])
            ->andFilterWhere(['like', 'keluhan_durasi_lama', $this->keluhan_durasi_lama])
            ->andFilterWhere(['like', 'keluhan_durasi_jenis', $this->keluhan_durasi_jenis])
            ->andFilterWhere(['like', 'keluhan_durasi_pereda', $this->keluhan_durasi_pereda])
            ->andFilterWhere(['like', 'keluhan_durasi_pemberat', $this->keluhan_durasi_pemberat])
            ->andFilterWhere(['like', 'keljalar_kepala', $this->keljalar_kepala])
            ->andFilterWhere(['like', 'keljalar_wajah', $this->keljalar_wajah])
            ->andFilterWhere(['like', 'keljalar_mata', $this->keljalar_mata])
            ->andFilterWhere(['like', 'keljalar_mulut', $this->keljalar_mulut])
            ->andFilterWhere(['like', 'keljalar_telinga', $this->keljalar_telinga])
            ->andFilterWhere(['like', 'keljalar_leher', $this->keljalar_leher])
            ->andFilterWhere(['like', 'keljalar_bahu', $this->keljalar_bahu])
            ->andFilterWhere(['like', 'keljalar_tangan', $this->keljalar_tangan])
            ->andFilterWhere(['like', 'keljalar_dada', $this->keljalar_dada])
            ->andFilterWhere(['like', 'keljalar_perut', $this->keljalar_perut])
            ->andFilterWhere(['like', 'keljalar_punggung', $this->keljalar_punggung])
            ->andFilterWhere(['like', 'keljalar_kelamin', $this->keljalar_kelamin])
            ->andFilterWhere(['like', 'keljalar_kaki', $this->keljalar_kaki])
            ->andFilterWhere(['like', 'kel_punkel_lama', $this->kel_punkel_lama])
            ->andFilterWhere(['like', 'kel_kemunculan', $this->kel_kemunculan])
            ->andFilterWhere(['like', 'kel_kemunculan_saat', $this->kel_kemunculan_saat])
            ->andFilterWhere(['like', 'kel_penjelasan_awal', $this->kel_penjelasan_awal])
            ->andFilterWhere(['like', 'kel_penjelasan_kemudian', $this->kel_penjelasan_kemudian])
            ->andFilterWhere(['like', 'kel_penjelasan_saat', $this->kel_penjelasan_saat])
            ->andFilterWhere(['like', 'riwayat_penyakit_nama', $this->riwayat_penyakit_nama])
            ->andFilterWhere(['like', 'riwayat_penyakit_lama', $this->riwayat_penyakit_lama])
            ->andFilterWhere(['like', 'riwayat_perawatan_tempat', $this->riwayat_perawatan_tempat])
            ->andFilterWhere(['like', 'riwayat_perawatan_lama', $this->riwayat_perawatan_lama])
            ->andFilterWhere(['like', 'alergi_obat_jenis', $this->alergi_obat_jenis])
            ->andFilterWhere(['like', 'alergi_makanan', $this->alergi_makanan])
            ->andFilterWhere(['like', 'alergi_sabun', $this->alergi_sabun])
            ->andFilterWhere(['like', 'alergi_udara', $this->alergi_udara])
            ->andFilterWhere(['like', 'alergi_lainnya', $this->alergi_lainnya])
            ->andFilterWhere(['like', 'transfusi_wb_ukuran', $this->transfusi_wb_ukuran])
            ->andFilterWhere(['like', 'transfusi_trombosit_ukuran', $this->transfusi_trombosit_ukuran])
            ->andFilterWhere(['like', 'transfusi_eritrosit_ukuran', $this->transfusi_eritrosit_ukuran])
            ->andFilterWhere(['like', 'riwayat_imunisasi', $this->riwayat_imunisasi])
            ->andFilterWhere(['like', 'kebiasaan_rokok_satuan', $this->kebiasaan_rokok_satuan])
            ->andFilterWhere(['like', 'kebiasaan_rokok_lama', $this->kebiasaan_rokok_lama])
            ->andFilterWhere(['like', 'kebiasaan_rokok_awal', $this->kebiasaan_rokok_awal])
            ->andFilterWhere(['like', 'kebiasaan_rokok_berhenti', $this->kebiasaan_rokok_berhenti])
            ->andFilterWhere(['like', 'kebiasaan_rokok_jenis', $this->kebiasaan_rokok_jenis])
            ->andFilterWhere(['like', 'kebiasaan_alkohol_lama', $this->kebiasaan_alkohol_lama])
            ->andFilterWhere(['like', 'kebiasaan_alkohol_awal', $this->kebiasaan_alkohol_awal])
            ->andFilterWhere(['like', 'kebiasaan_alkohol_berhenti', $this->kebiasaan_alkohol_berhenti])
            ->andFilterWhere(['like', 'kebiasaan_alkohol_jenis', $this->kebiasaan_alkohol_jenis])
            ->andFilterWhere(['like', 'kebiasaan_perawatan_pil', $this->kebiasaan_perawatan_pil])
            ->andFilterWhere(['like', 'perawatan_mandi_lama', $this->perawatan_mandi_lama])
            ->andFilterWhere(['like', 'perawatan_mandi_oleh', $this->perawatan_mandi_oleh])
            ->andFilterWhere(['like', 'perawatan_rambut_lama', $this->perawatan_rambut_lama])
            ->andFilterWhere(['like', 'perawatan_rambut_oleh', $this->perawatan_rambut_oleh])
            ->andFilterWhere(['like', 'perawatan_kuku_lama', $this->perawatan_kuku_lama])
            ->andFilterWhere(['like', 'perawatan_kuku_oleh', $this->perawatan_kuku_oleh])
            ->andFilterWhere(['like', 'perawatan_tidur_lama', $this->perawatan_tidur_lama])
            ->andFilterWhere(['like', 'perawatan_tidur_oleh', $this->perawatan_tidur_oleh])
            ->andFilterWhere(['like', 'nutrisi_selera_makan', $this->nutrisi_selera_makan])
            ->andFilterWhere(['like', 'makan_frekuensi', $this->makan_frekuensi])
            ->andFilterWhere(['like', 'makan_pembatasan_asupan', $this->makan_pembatasan_asupan])
            ->andFilterWhere(['like', 'makan_menu_pokok', $this->makan_menu_pokok])
            ->andFilterWhere(['like', 'makan_menu_lauk', $this->makan_menu_lauk])
            ->andFilterWhere(['like', 'makan_menu_sayur', $this->makan_menu_sayur])
            ->andFilterWhere(['like', 'makan_menu_buah', $this->makan_menu_buah])
            ->andFilterWhere(['like', 'minum_jenis', $this->minum_jenis])
            ->andFilterWhere(['like', 'minum_frekuensi', $this->minum_frekuensi])
            ->andFilterWhere(['like', 'minum_cara_pemenuhan', $this->minum_cara_pemenuhan])
            ->andFilterWhere(['like', 'olahraga_jenis', $this->olahraga_jenis])
            ->andFilterWhere(['like', 'olahraga_frekuensi_lama', $this->olahraga_frekuensi_lama])
            ->andFilterWhere(['like', 'kegiatan_jenis', $this->kegiatan_jenis])
            ->andFilterWhere(['like', 'kegiatan_frekuensi_lama', $this->kegiatan_frekuensi_lama])
            ->andFilterWhere(['like', 'faktor_resiko_riwayat', $this->faktor_resiko_riwayat])
            ->andFilterWhere(['like', 'faktor_resiko_kebiasaan', $this->faktor_resiko_kebiasaan])
            ->andFilterWhere(['like', 'psikososial_hubkel', $this->psikososial_hubkel])
            ->andFilterWhere(['like', 'psikososial_temting', $this->psikososial_temting])
            ->andFilterWhere(['like', 'psikososial_tingber', $this->psikososial_tingber]);

        return $dataProvider;
    }
}

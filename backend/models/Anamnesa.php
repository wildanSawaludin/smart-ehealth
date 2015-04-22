<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "anamnesa".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $registrasi_id
 * @property integer $user_id
 * @property string $keluhan
 * @property string $keluhan_rincian
 * @property string $keluhan_lokasi
 * @property string $keluhan_lokasi_umum
 * @property string $keluhan_sub_lokasi
 * @property integer $keluhan_berlangsung_nil
 * @property string $keluhan_berlangsung_lama
 * @property string $keluhan_faktor_pencetus
 * @property integer $keluhan_durasi_nil
 * @property string $keluhan_durasi_lama
 * @property string $keluhan_durasi_jenis
 * @property string $keluhan_durasi_pereda
 * @property string $keluhan_durasi_pemberat
 * @property string $keluhan_frekuensi
 * @property integer $keluhan_menjalar_pil
 * @property integer $keljalar_kepala_pil
 * @property string $keljalar_kepala
 * @property integer $keljalar_wajah_pil
 * @property string $keljalar_wajah
 * @property integer $keljalar_mata_pil
 * @property string $keljalar_mata
 * @property integer $keljalar_hidung_pil
 * @property integer $keljalar_mulut_pil
 * @property string $keljalar_mulut
 * @property integer $keljalar_telinga_pil
 * @property string $keljalar_telinga
 * @property integer $keljalar_leher_pil
 * @property string $keljalar_leher
 * @property integer $keljalar_tenggorokan_pil
 * @property integer $keljalar_bahu_pil
 * @property string $keljalar_bahu
 * @property integer $keljalar_tangan_pil
 * @property string $keljalar_tangan
 * @property integer $keljalar_dada_pil
 * @property string $keljalar_dada
 * @property integer $keljalar_perut_pil
 * @property string $keljalar_perut
 * @property integer $keljalar_pinggang_pil
 * @property integer $keljalar_punggung_pil
 * @property string $keljalar_punggung
 * @property integer $keljalar_kelamin_pil
 * @property string $keljalar_kelamin
 * @property integer $keljalar_kaki_pil
 * @property string $keljalar_kaki
 * @property integer $keljalar_seltub_pil
 * @property integer $kel_tembus_pil
 * @property integer $kel_punkel_nil
 * @property string $kel_punkel_lama
 * @property string $kel_kemunculan
 * @property string $kel_kemunculan_saat
 * @property string $kel_penjelasan_awal
 * @property string $kel_penjelasan_kemudian
 * @property string $kel_penjelasan_saat
 * @property integer $riwayat_penyakit_pil
 * @property integer $riwayatsakit_icdx_id
 * @property integer $riwayat_penyakit_nil
 * @property string $riwayat_penyakit_lama
 * @property integer $riwayat_perawatan_pil
 * @property string $riwayat_perawatan_waktu
 * @property string $riwayat_perawatan_tempat
 * @property integer $riwayat_perawatan_nil
 * @property string $riwayat_perawatan_lama
 * @property integer $riwayat_pengobatan_pil
 * @property integer $riwayat_keluarga_pil
 * @property integer $riwayatkel_icdx_id
 * @property integer $riwayat_lainnya_pil
 * @property integer $riwayat_alergi_pil
 * @property integer $alergi_obat_pil
 * @property string $alergi_obat_jenis
 * @property integer $alergi_makanan_pil
 * @property string $alergi_makanan
 * @property integer $alergi_sabun_pil
 * @property string $alergi_sabun
 * @property integer $alergi_udara_pil
 * @property string $alergi_udara
 * @property integer $alergi_debu_pil
 * @property integer $alergi_lainnya_pil
 * @property string $alergi_lainnya
 * @property integer $riwayat_transfusi_pil
 * @property integer $transfusi_wb_pil
 * @property string $transfusi_wb_waktu
 * @property integer $transfusi_wb_jumlah
 * @property string $transfusi_wb_ukuran
 * @property integer $transfusi_trombosit_pil
 * @property string $transfusi_trombosit_waktu
 * @property integer $transfusi_trombosit_jumlah
 * @property string $transfusi_trombosit_ukuran
 * @property integer $transfusi_eritrosit_pil
 * @property string $transfusi_eritrosit_waktu
 * @property integer $transfusi_eritrosit_jumlah
 * @property string $transfusi_eritrosit_ukuran
 * @property integer $riwayat_imunisasi_pil
 * @property string $riwayat_imunisasi
 * @property integer $kebiasaan_obat_pil
 * @property integer $kebiasaan_rokok_pil
 * @property integer $kebiasaan_rokok_jmlh
 * @property string $kebiasaan_rokok_satuan
 * @property integer $kebiasaan_rokok_nil
 * @property string $kebiasaan_rokok_lama
 * @property string $kebiasaan_rokok_awal
 * @property string $kebiasaan_rokok_berhenti
 * @property string $kebiasaan_rokok_jenis
 * @property integer $kebiasaan_alkohol_pil
 * @property integer $kebiasaan_alkohol_nil
 * @property string $kebiasaan_alkohol_lama
 * @property string $kebiasaan_alkohol_awal
 * @property string $kebiasaan_alkohol_berhenti
 * @property string $kebiasaan_alkohol_jenis
 * @property string $kebiasaan_perawatan_pil
 * @property integer $perawatan_mandi_pil
 * @property integer $perawatan_mandi_jmlh
 * @property string $perawatan_mandi_lama
 * @property string $perawatan_mandi_oleh
 * @property integer $perawatan_rambut_pil
 * @property integer $perawatan_rambut_jmlh
 * @property string $perawatan_rambut_lama
 * @property string $perawatan_rambut_oleh
 * @property integer $perawatan_kuku_pil
 * @property integer $perawatan_kuku_jmlh
 * @property string $perawatan_kuku_lama
 * @property string $perawatan_kuku_oleh
 * @property integer $perawatan_tidur_pil
 * @property integer $perawatan_tidur_jmlh
 * @property string $perawatan_tidur_lama
 * @property string $perawatan_tidur_oleh
 * @property integer $kebiasaan_nutrisi_pil
 * @property integer $nutrisi_selera_pil
 * @property string $nutrisi_selera_makan
 * @property integer $makan_frekuensi_pil
 * @property string $makan_frekuensi
 * @property integer $makan_pembatasan_pil
 * @property string $makan_pembatasan_asupan
 * @property integer $makan_menu_pil
 * @property string $makan_menu_pokok
 * @property string $makan_menu_lauk
 * @property string $makan_menu_sayur
 * @property string $makan_menu_buah
 * @property integer $minum_jenis_pil
 * @property string $minum_jenis
 * @property integer $minum_frekuensi_pil
 * @property string $minum_frekuensi
 * @property integer $minum_cara_pil
 * @property string $minum_cara_pemenuhan
 * @property integer $kebiasaan_olahraga_pil
 * @property string $olahraga_jenis
 * @property integer $olahraga_frekuensi_kali
 * @property string $olahraga_frekuensi_lama
 * @property integer $kebiasaan_kegiatan_pil
 * @property string $kegiatan_jenis
 * @property integer $kegiatan_frekuensi_kali
 * @property string $kegiatan_frekuensi_lama
 * @property string $faktor_resiko_riwayat
 * @property string $faktor_resiko_kebiasaan
 * @property integer $psikososial_hubkel_pil
 * @property string $psikososial_hubkel
 * @property integer $psikososial_temting_pil
 * @property string $psikososial_temting
 * @property integer $psikososial_tingber_pil
 * @property string $psikososial_tingber
 *
 * @property KebiasaanObat $kebiasaanObat
 * @property Icdx $riwayatsakitIcdx
 * @property Icdx $riwayatkelIcdx
 * @property Registrasi $registrasi
 * @property RiwayatPengobatan $riwayatPengobatan
 * @property Users $user
 * @property KebiasaanObat[] $kebiasaanObats
 * @property RiwayatPengobatan[] $riwayatPengobatans
 */
class Anamnesa extends \yii\db\ActiveRecord
{
    public $faktor_resiko_riwayat_1;
    public $faktor_resiko_riwayat_2;
    public $faktor_resiko_kebiasaan_1;
    public $faktor_resiko_kebiasaan_2;
    public $psikososial_tingber_1;
    public $psikososial_tingber_2;
    
    public $keluhan_tambahan1;
    public $keluhan_tambahan2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anamnesa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'registrasi_id', 'user_id', 'keluhan_berlangsung_nil', 'keluhan_durasi_nil', 'keluhan_menjalar_pil', 'keljalar_kepala_pil', 'keljalar_wajah_pil', 'keljalar_mata_pil', 'keljalar_hidung_pil', 'keljalar_mulut_pil', 'keljalar_telinga_pil', 'keljalar_leher_pil', 'keljalar_tenggorokan_pil', 'keljalar_bahu_pil', 'keljalar_tangan_pil', 'keljalar_dada_pil', 'keljalar_perut_pil', 'keljalar_pinggang_pil', 'keljalar_punggung_pil', 'keljalar_kelamin_pil', 'keljalar_kaki_pil', 'keljalar_seltub_pil', 'kel_tembus_pil', 'kel_punkel_nil', 'riwayat_penyakit_pil', 'riwayatsakit_icdx_id', 'riwayat_penyakit_nil', 'riwayat_perawatan_pil', 'riwayat_perawatan_nil', 'riwayat_pengobatan_pil', 'riwayat_keluarga_pil', 'riwayatkel_icdx_id', 'riwayat_lainnya_pil', 'riwayat_alergi_pil', 'alergi_obat_pil', 'alergi_makanan_pil', 'alergi_sabun_pil', 'alergi_udara_pil', 'alergi_debu_pil', 'alergi_lainnya_pil', 'riwayat_transfusi_pil', 'transfusi_wb_pil', 'transfusi_wb_jumlah', 'transfusi_trombosit_pil', 'transfusi_trombosit_jumlah', 'transfusi_eritrosit_pil', 'transfusi_eritrosit_jumlah', 'riwayat_imunisasi_pil', 'kebiasaan_obat_pil', 'kebiasaan_rokok_pil', 'kebiasaan_rokok_jmlh', 'kebiasaan_rokok_nil', 'kebiasaan_alkohol_pil', 'kebiasaan_alkohol_nil', 'perawatan_mandi_pil', 'perawatan_mandi_jmlh', 'perawatan_rambut_pil', 'perawatan_rambut_jmlh', 'perawatan_kuku_pil', 'perawatan_kuku_jmlh', 'perawatan_tidur_pil', 'perawatan_tidur_jmlh', 'kebiasaan_nutrisi_pil', 'nutrisi_selera_pil', 'makan_frekuensi_pil', 'makan_pembatasan_pil', 'makan_menu_pil', 'makan_pokok_lainnya_pil', 'makan_lauk_lainnya_pil', 'makan_sayuran_lainnya_pil', 'makan_buah_lainnya_pil', 'minum_jenis_pil', 'minum_frekuensi_pil', 'minum_cara_pil', 'kebiasaan_olahraga_pil', 'olahraga_frekuensi_kali', 'kebiasaan_kegiatan_pil', 'kegiatan_frekuensi_kali', 'psikososial_hubkel_pil', 'psikososial_temting_pil', 'psikososial_tingber_pil', 'olahraga_jenis_lainnya_pil'], 'integer'],
            [['keluhan_berlangsung_lama', 'keluhan_durasi_lama', 'keluhan_frekuensi','kel_punkel_lama', 'kel_kemunculan', 'riwayat_penyakit_lama', 'riwayat_perawatan_tempat', 'riwayat_perawatan_lama', 'transfusi_wb_ukuran', 'transfusi_trombosit_ukuran', 'transfusi_eritrosit_ukuran', 'kebiasaan_rokok_satuan', 'kebiasaan_rokok_lama', 'kebiasaan_rokok_awal', 'kebiasaan_rokok_berhenti', 'kebiasaan_alkohol_lama', 'kebiasaan_alkohol_awal', 'kebiasaan_alkohol_berhenti', 'perawatan_mandi_lama', 'perawatan_mandi_oleh', 'perawatan_rambut_lama', 'perawatan_rambut_oleh', 'perawatan_kuku_lama', 'perawatan_kuku_oleh', 'perawatan_tidur_lama', 'perawatan_tidur_oleh', 'nutrisi_selera_makan', 'makan_frekuensi', 'minum_jenis', 'minum_frekuensi', 'olahraga_frekuensi_lama', 'kegiatan_frekuensi_lama', 'psikososial_hubkel', 'psikososial_temting'], 'string'],
            [['riwayat_perawatan_waktu', 'transfusi_wb_waktu', 'transfusi_trombosit_waktu', 'transfusi_eritrosit_waktu'], 'safe'],
//            [['transfusi_wb_waktu'], 'required'],
            [['keluhan', 'keluhan_rincian', 'keluhan_lokasi', 'keluhan_lokasi_umum', 'keluhan_sub_lokasi', 'keluhan_durasi_jenis', 'keluhan_durasi_pereda', 'keluhan_durasi_pemberat', 'makan_menu_pokok', 'makan_menu_lauk', 'makan_menu_sayur', 'makan_menu_buah', 'minum_cara_pemenuhan', 'psikososial_tingber', 'makan_pokok_lainnya', 'makan_lauk_lainnya', 'makan_sayuran_lainnya', 'makan_buah_lainnya'], 'string', 'max' => 50],
            [['keluhan_faktor_pencetus'], 'string', 'max' => 200],
            [['keljalar_kepala', 'keljalar_wajah', 'keljalar_mata', 'keljalar_mulut', 'keljalar_telinga', 'keljalar_leher', 'keljalar_bahu', 'keljalar_tangan', 'keljalar_dada', 'keljalar_perut', 'keljalar_punggung', 'keljalar_kelamin', 'keljalar_kaki', 'kel_kemunculan_saat', 'kel_penjelasan_awal', 'kel_penjelasan_kemudian', 'kel_penjelasan_saat', 'alergi_obat_jenis', 'alergi_makanan', 'alergi_sabun', 'alergi_udara', 'alergi_lainnya', 'riwayat_imunisasi', 'makan_pembatasan_asupan', 'olahraga_jenis', 'faktor_resiko_riwayat', 'faktor_resiko_kebiasaan', 'olahraga_jenis_lainnya'], 'string', 'max' => 100],
            [['kebiasaan_rokok_jenis', 'kebiasaan_alkohol_jenis', 'kebiasaan_perawatan_pil', 'kegiatan_jenis'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'registrasi_id' => Yii::t('app', 'Registrasi ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'keluhan' => Yii::t('app', 'Keluhan'),
            'keluhan_rincian' => Yii::t('app', 'Keluhan Rincian'),
            'keluhan_lokasi' => Yii::t('app', 'Keluhan Lokasi'),
            'keluhan_lokasi_umum' => Yii::t('app', 'Keluhan Lokasi Umum'),
            'keluhan_sub_lokasi' => Yii::t('app', 'Keluhan Sub Lokasi'),
            'keluhan_berlangsung_nil' => Yii::t('app', 'Keluhan Berlangsung Nil'),
            'keluhan_berlangsung_lama' => Yii::t('app', 'Keluhan Berlangsung Lama'),
            'keluhan_faktor_pencetus' => Yii::t('app', 'Keluhan Faktor Pencetus'),
            'keluhan_durasi_nil' => Yii::t('app', 'Keluhan Durasi Nil'),
            'keluhan_durasi_lama' => Yii::t('app', 'Keluhan Durasi Lama'),
            'keluhan_durasi_jenis' => Yii::t('app', 'Keluhan Durasi Jenis'),
            'keluhan_durasi_pereda' => Yii::t('app', 'Keluhan Durasi Pereda'),
            'keluhan_durasi_pemberat' => Yii::t('app', 'Keluhan Durasi Pemberat'),
            'keluhan_frekuensi' => Yii::t('app', 'Keluhan Frekuensi'),
            'keluhan_menjalar_pil' => Yii::t('app', 'Keluhan Menjalar Pil'),
            'keljalar_kepala_pil' => Yii::t('app', 'Keljalar Kepala Pil'),
            'keljalar_kepala' => Yii::t('app', 'Keljalar Kepala'),
            'keljalar_wajah_pil' => Yii::t('app', 'Keljalar Wajah Pil'),
            'keljalar_wajah' => Yii::t('app', 'Keljalar Wajah'),
            'keljalar_mata_pil' => Yii::t('app', 'Keljalar Mata Pil'),
            'keljalar_mata' => Yii::t('app', 'Keljalar Mata'),
            'keljalar_hidung_pil' => Yii::t('app', 'Keljalar Hidung Pil'),
            'keljalar_mulut_pil' => Yii::t('app', 'Keljalar Mulut Pil'),
            'keljalar_mulut' => Yii::t('app', 'Keljalar Mulut'),
            'keljalar_telinga_pil' => Yii::t('app', 'Keljalar Telinga Pil'),
            'keljalar_telinga' => Yii::t('app', 'Keljalar Telinga'),
            'keljalar_leher_pil' => Yii::t('app', 'Keljalar Leher Pil'),
            'keljalar_leher' => Yii::t('app', 'Keljalar Leher'),
            'keljalar_tenggorokan_pil' => Yii::t('app', 'Keljalar Tenggorokan Pil'),
            'keljalar_bahu_pil' => Yii::t('app', 'Keljalar Bahu Pil'),
            'keljalar_bahu' => Yii::t('app', 'Keljalar Bahu'),
            'keljalar_tangan_pil' => Yii::t('app', 'Keljalar Tangan Pil'),
            'keljalar_tangan' => Yii::t('app', 'Keljalar Tangan'),
            'keljalar_dada_pil' => Yii::t('app', 'Keljalar Dada Pil'),
            'keljalar_dada' => Yii::t('app', 'Keljalar Dada'),
            'keljalar_perut_pil' => Yii::t('app', 'Keljalar Perut Pil'),
            'keljalar_perut' => Yii::t('app', 'Keljalar Perut'),
            'keljalar_pinggang_pil' => Yii::t('app', 'Keljalar Pinggang Pil'),
            'keljalar_punggung_pil' => Yii::t('app', 'Keljalar Punggung Pil'),
            'keljalar_punggung' => Yii::t('app', 'Keljalar Punggung'),
            'keljalar_kelamin_pil' => Yii::t('app', 'Keljalar Kelamin Pil'),
            'keljalar_kelamin' => Yii::t('app', 'Keljalar Kelamin'),
            'keljalar_kaki_pil' => Yii::t('app', 'Keljalar Kaki Pil'),
            'keljalar_kaki' => Yii::t('app', 'Keljalar Kaki'),
            'keljalar_seltub_pil' => Yii::t('app', 'Keljalar Seltub Pil'),
            'kel_tembus_pil' => Yii::t('app', 'Kel Tembus Pil'),
            'kel_punkel_nil' => Yii::t('app', 'Kel Punkel Nil'),
            'kel_punkel_lama' => Yii::t('app', 'Kel Punkel Lama'),
            'kel_kemunculan' => Yii::t('app', 'Kel Kemunculan'),
            'kel_kemunculan_saat' => Yii::t('app', 'Kel Kemunculan Saat'),
            'kel_penjelasan_awal' => Yii::t('app', 'Kel Penjelasan Awal'),
            'kel_penjelasan_kemudian' => Yii::t('app', 'Kel Penjelasan Kemudian'),
            'kel_penjelasan_saat' => Yii::t('app', 'Kel Penjelasan Saat'),
            'riwayat_penyakit_pil' => Yii::t('app', 'Riwayat Penyakit Pil'),
            'riwayatsakit_icdx_id' => Yii::t('app', 'Riwayatsakit Icdx ID'),
            'riwayat_penyakit_nil' => Yii::t('app', 'Riwayat Penyakit Nil'),
            'riwayat_penyakit_lama' => Yii::t('app', 'Riwayat Penyakit Lama'),
            'riwayat_perawatan_pil' => Yii::t('app', 'Riwayat Perawatan Pil'),
            'riwayat_perawatan_waktu' => Yii::t('app', 'Riwayat Perawatan Waktu'),
            'riwayat_perawatan_tempat' => Yii::t('app', 'Riwayat Perawatan Tempat'),
            'riwayat_perawatan_nil' => Yii::t('app', 'Riwayat Perawatan Nil'),
            'riwayat_perawatan_lama' => Yii::t('app', 'Riwayat Perawatan Lama'),
            'riwayat_pengobatan_pil' => Yii::t('app', 'Riwayat Pengobatan Pil'),
            'riwayat_keluarga_pil' => Yii::t('app', 'Riwayat Keluarga Pil'),
            'riwayatkel_icdx_id' => Yii::t('app', 'Riwayatkel Icdx ID'),
            'riwayat_lainnya_pil' => Yii::t('app', 'Riwayat Lainnya Pil'),
            'riwayat_alergi_pil' => Yii::t('app', 'Riwayat Alergi Pil'),
            'alergi_obat_pil' => Yii::t('app', 'Alergi Obat Pil'),
            'alergi_obat_jenis' => Yii::t('app', 'Alergi Obat Jenis'),
            'alergi_makanan_pil' => Yii::t('app', 'Alergi Makanan Pil'),
            'alergi_makanan' => Yii::t('app', 'Alergi Makanan'),
            'alergi_sabun_pil' => Yii::t('app', 'Alergi Sabun Pil'),
            'alergi_sabun' => Yii::t('app', 'Alergi Sabun'),
            'alergi_udara_pil' => Yii::t('app', 'Alergi Udara Pil'),
            'alergi_udara' => Yii::t('app', 'Alergi Udara'),
            'alergi_debu_pil' => Yii::t('app', 'Alergi Debu Pil'),
            'alergi_lainnya_pil' => Yii::t('app', 'Alergi Lainnya Pil'),
            'alergi_lainnya' => Yii::t('app', 'Alergi Lainnya'),
            'riwayat_transfusi_pil' => Yii::t('app', 'Riwayat Transfusi Pil'),
            'transfusi_wb_pil' => Yii::t('app', 'Transfusi Wb Pil'),
            'transfusi_wb_waktu' => Yii::t('app', 'Transfusi Wb Waktu'),
            'transfusi_wb_jumlah' => Yii::t('app', 'Transfusi Wb Jumlah'),
            'transfusi_wb_ukuran' => Yii::t('app', 'Transfusi Wb Ukuran'),
            'transfusi_trombosit_pil' => Yii::t('app', 'Transfusi Trombosit Pil'),
            'transfusi_trombosit_waktu' => Yii::t('app', 'Transfusi Trombosit Waktu'),
            'transfusi_trombosit_jumlah' => Yii::t('app', 'Transfusi Trombosit Jumlah'),
            'transfusi_trombosit_ukuran' => Yii::t('app', 'Transfusi Trombosit Ukuran'),
            'transfusi_eritrosit_pil' => Yii::t('app', 'Transfusi Eritrosit Pil'),
            'transfusi_eritrosit_waktu' => Yii::t('app', 'Transfusi Eritrosit Waktu'),
            'transfusi_eritrosit_jumlah' => Yii::t('app', 'Transfusi Eritrosit Jumlah'),
            'transfusi_eritrosit_ukuran' => Yii::t('app', 'Transfusi Eritrosit Ukuran'),
            'riwayat_imunisasi_pil' => Yii::t('app', 'Riwayat Imunisasi Pil'),
            'riwayat_imunisasi' => Yii::t('app', 'Riwayat Imunisasi'),
            'kebiasaan_obat_pil' => Yii::t('app', 'Kebiasaan Obat Pil'),
            'kebiasaan_rokok_pil' => Yii::t('app', 'Kebiasaan Rokok Pil'),
            'kebiasaan_rokok_jmlh' => Yii::t('app', 'Kebiasaan Rokok Jmlh'),
            'kebiasaan_rokok_satuan' => Yii::t('app', 'Kebiasaan Rokok Satuan'),
            'kebiasaan_rokok_nil' => Yii::t('app', 'Kebiasaan Rokok Nil'),
            'kebiasaan_rokok_lama' => Yii::t('app', 'Kebiasaan Rokok Lama'),
            'kebiasaan_rokok_awal' => Yii::t('app', 'Kebiasaan Rokok Awal'),
            'kebiasaan_rokok_berhenti' => Yii::t('app', 'Kebiasaan Rokok Berhenti'),
            'kebiasaan_rokok_jenis' => Yii::t('app', 'Kebiasaan Rokok Jenis'),
            'kebiasaan_alkohol_pil' => Yii::t('app', 'Kebiasaan Alkohol Pil'),
            'kebiasaan_alkohol_nil' => Yii::t('app', 'Kebiasaan Alkohol Nil'),
            'kebiasaan_alkohol_lama' => Yii::t('app', 'Kebiasaan Alkohol Lama'),
            'kebiasaan_alkohol_awal' => Yii::t('app', 'Kebiasaan Alkohol Awal'),
            'kebiasaan_alkohol_berhenti' => Yii::t('app', 'Kebiasaan Alkohol Berhenti'),
            'kebiasaan_alkohol_jenis' => Yii::t('app', 'Kebiasaan Alkohol Jenis'),
            'kebiasaan_perawatan_pil' => Yii::t('app', 'Kebiasaan Perawatan Pil'),
            'perawatan_mandi_pil' => Yii::t('app', 'Perawatan Mandi Pil'),
            'perawatan_mandi_jmlh' => Yii::t('app', 'Perawatan Mandi Jmlh'),
            'perawatan_mandi_lama' => Yii::t('app', 'Perawatan Mandi Lama'),
            'perawatan_mandi_oleh' => Yii::t('app', 'Perawatan Mandi Oleh'),
            'perawatan_rambut_pil' => Yii::t('app', 'Perawatan Rambut Pil'),
            'perawatan_rambut_jmlh' => Yii::t('app', 'Perawatan Rambut Jmlh'),
            'perawatan_rambut_lama' => Yii::t('app', 'Perawatan Rambut Lama'),
            'perawatan_rambut_oleh' => Yii::t('app', 'Perawatan Rambut Oleh'),
            'perawatan_kuku_pil' => Yii::t('app', 'Perawatan Kuku Pil'),
            'perawatan_kuku_jmlh' => Yii::t('app', 'Perawatan Kuku Jmlh'),
            'perawatan_kuku_lama' => Yii::t('app', 'Perawatan Kuku Lama'),
            'perawatan_kuku_oleh' => Yii::t('app', 'Perawatan Kuku Oleh'),
            'perawatan_tidur_pil' => Yii::t('app', 'Perawatan Tidur Pil'),
            'perawatan_tidur_jmlh' => Yii::t('app', 'Perawatan Tidur Jmlh'),
            'perawatan_tidur_lama' => Yii::t('app', 'Perawatan Tidur Lama'),
            'perawatan_tidur_oleh' => Yii::t('app', 'Perawatan Tidur Oleh'),
            'kebiasaan_nutrisi_pil' => Yii::t('app', 'Kebiasaan Nutrisi Pil'),
            'nutrisi_selera_pil' => Yii::t('app', 'Nutrisi Selera Pil'),
            'nutrisi_selera_makan' => Yii::t('app', 'Nutrisi Selera Makan'),
            'makan_frekuensi_pil' => Yii::t('app', 'Makan Frekuensi Pil'),
            'makan_frekuensi' => Yii::t('app', 'Makan Frekuensi'),
            'makan_pembatasan_pil' => Yii::t('app', 'Makan Pembatasan Pil'),
            'makan_pembatasan_asupan' => Yii::t('app', 'Makan Pembatasan Asupan'),
            'makan_menu_pil' => Yii::t('app', 'Makan Menu Pil'),
            'makan_menu_pokok' => Yii::t('app', 'Makan Menu Pokok'),
            'makan_menu_lauk' => Yii::t('app', 'Makan Menu Lauk'),
            'makan_menu_sayur' => Yii::t('app', 'Makan Menu Sayur'),
            'makan_menu_buah' => Yii::t('app', 'Makan Menu Buah'),
            'makan_pokok_lainnya' => Yii::t('app', 'Makan Pokok Lainnya'),
            'makan_lauk_lainnya' => Yii::t('app', 'Makan Lauk Lainnya'),
            'makan_sayuran_lainnya' => Yii::t('app', 'Makan Sayuran Lainnya'),
            'makan_buah_lainnya' => Yii::t('app', 'Makan Buah Lainnya'),
            'minum_jenis_pil' => Yii::t('app', 'Minum Jenis Pil'),
            'minum_jenis' => Yii::t('app', 'Minum Jenis'),
            'minum_frekuensi_pil' => Yii::t('app', 'Minum Frekuensi Pil'),
            'minum_frekuensi' => Yii::t('app', 'Minum Frekuensi'),
            'minum_cara_pil' => Yii::t('app', 'Minum Cara Pil'),
            'minum_cara_pemenuhan' => Yii::t('app', 'Minum Cara Pemenuhan'),
            'kebiasaan_olahraga_pil' => Yii::t('app', 'Kebiasaan Olahraga Pil'),
            'olahraga_jenis' => Yii::t('app', 'Olahraga Jenis'),
            'olahraga_frekuensi_kali' => Yii::t('app', 'Olahraga Frekuensi Kali'),
            'olahraga_frekuensi_lama' => Yii::t('app', 'Olahraga Frekuensi Lama'),
            'kebiasaan_kegiatan_pil' => Yii::t('app', 'Kebiasaan Kegiatan Pil'),
            'kegiatan_jenis' => Yii::t('app', 'Kegiatan Jenis'),
            'kegiatan_frekuensi_kali' => Yii::t('app', 'Kegiatan Frekuensi Kali'),
            'kegiatan_frekuensi_lama' => Yii::t('app', 'Kegiatan Frekuensi Lama'),
            'faktor_resiko_riwayat' => Yii::t('app', 'Faktor Resiko Riwayat'),
            'faktor_resiko_kebiasaan' => Yii::t('app', 'Faktor Resiko Kebiasaan'),
            'psikososial_hubkel_pil' => Yii::t('app', 'Hubungan dengan keluarga'),
            'psikososial_hubkel' => Yii::t('app', 'Psikososial Hubkel'),
            'psikososial_temting_pil' => Yii::t('app', 'Tempat tinggal'),
            'psikososial_temting' => Yii::t('app', 'Psikososial Temting'),
            'psikososial_tingber_pil' => Yii::t('app', 'Tinggal bersama'),
            'psikososial_tingber' => Yii::t('app', 'Psikososial Tingber'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKebiasaanObat()
    {
        return $this->hasOne(KebiasaanObat::className(), ['id' => 'kebiasaan_obat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatsakitIcdx()
    {
        return $this->hasOne(Icdx::className(), ['id' => 'riwayatsakit_icdx_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatsakitIcdxKel()
    {
        return $this->hasOne(Icdx::className(), ['id' => 'riwayatkel_icdx_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatkelIcdx()
    {
        return $this->hasOne(Icdx::className(), ['id' => 'riwayatkel_icdx_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::className(), ['id' => 'registrasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatPengobatan()
    {
        return $this->hasOne(RiwayatPengobatan::className(), ['id' => 'riwayat_pengobatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKebiasaanObats()
    {
        return $this->hasMany(KebiasaanObat::className(), ['anamnesa_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatPengobatans()
    {
        return $this->hasMany(RiwayatPengobatan::className(), ['anamnesa_id' => 'id']);
    }
    
  public function getOptionsKeluhanLanglama()
{ 
   return array(
'detik'=>'detik','menit'=>'menit','jam'=>'jam','hari'=>'hari','minggu'=>'minggu','bulan'=>'bulan','tahun'=>'tahun',
   );
}

  public function getOptionsKeluhanDurasilama()
{ 
   return array(
'menit'=>'menit','jam'=>'jam','hari'=>'hari','minggu'=>'minggu','bulan'=>'bulan','tahun'=>'tahun',
   );
}

  public function getOptionsKeluhanPunkel()
{ 
   return array(
'menit'=>'menit','jam'=>'jam','hari'=>'hari','minggu'=>'minggu','bulan'=>'bulan','tahun'=>'tahun',
   );
}

  public function getOptionsKeluhanKemunculan()
{ 
   return array(
'Perlahan'=>'Perlahan','Berulang'=>'Berulang','Spontan/tiba-tiba'=>'Spontan/tiba-tiba',
   );
}

  public function getOptionsKeluhanFrekuensi()
{ 
   return array(
   'Sepanjang hari'=>'Sepanjang hari','Tidak menentu'=>'Tidak menentu','1 kali sehari'=>'1 kali sehari','2 kali sehari'=>'2 kali sehari','3 kali sehari'=>'3 kali sehari','> 3 kali sehari'=>'> 3 kali sehari','1 kali seminggu'=>'1 kali seminggu','2 kali seminggu'=>'2 kali seminggu','3 kali seminggu'=>'3 kali seminggu','> 3 kali seminggu'=>'> 3 kali seminggu',
   );
}
 
}

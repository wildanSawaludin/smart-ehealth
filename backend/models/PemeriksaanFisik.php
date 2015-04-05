<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan_fisik".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property integer $user_id
 * @property string $st_keadaan_umum
 * @property string $st_kesadaran
 * @property string $kesadaran_gcs_e
 * @property string $kesadaran_gcs_v
 * @property string $kesadaran_gcs_m
 * @property string $st_bb
 * @property string $st_tb
 * @property integer $tb_lengan_pil
 * @property string $tb_lengan_nil
 * @property integer $tb_kepala_pil
 * @property string $tb_kepala_nil
 * @property integer $tb_dada_pil
 * @property string $tb_dada_nil
 * @property integer $tb_perut_pil
 * @property string $tb_perut_nil
 * @property string $st_tmt
 * @property string $st_status_gizi
 * @property string $st_habitus
 * @property integer $ttv_td_dias
 * @property integer $ttv_td_sis
 * @property integer $ttv_nadi
 * @property integer $nadi_irama_pil
 * @property string $nadi_irama
 * @property integer $nadi_kuang_pil
 * @property string $nadi_kuang
 * @property integer $nadi_kika_pil
 * @property string $nadi_kika
 * @property integer $nadi_amplitudo_pil
 * @property string $nadi_amplitudo
 * @property integer $ttv_pernapasan
 * @property integer $pernapasan_irama_pil
 * @property string $pernapasan_irama
 * @property string $ttv_suhu
 * @property integer $suhu_axilla_pil
 * @property string $suhu_axilla
 * @property integer $suhu_oral_pil
 * @property string $suhu_oral
 * @property integer $suhu_rectal_pil
 * @property string $suhu_rectal
 * @property integer $evaluasi_kulit_pil
 * @property string $evaluasi_kulit
 * @property integer $kulit_inspwarna_pil
 * @property string $kulit_inspeksi_warna
 * @property integer $kulit_insplembab_pil
 * @property string $kulit_inspeksi_kelembaban
 * @property integer $kulit_insplesi_pil
 * @property integer $kulit_leslok_pil
 * @property string $kulit_lesi_lokasi
 * @property integer $kulit_lestuk_pil
 * @property string $kulit_lesi_bentuk
 * @property integer $kulit_lestip_pil
 * @property string $kulit_lesi_tipe
 * @property integer $kulit_leswarna_pil
 * @property string $kulit_lesi_warna
 * @property integer $kulit_palptem_pil
 * @property string $kulit_palpasi_temperatur
 * @property integer $kulit_palpteks_pil
 * @property string $kulit_palpasi_tekstur
 * @property integer $kulit_palptur_pil
 * @property string $kulit_palpasi_turgor
 * @property integer $evaluasi_kepala_pil
 * @property string $evaluasi_kepala
 * @property integer $kepala_inspben_pil
 * @property string $kepala_inspeksi_bentuk
 * @property integer $kepala_inspkul_pil
 * @property string $kepala_inspeksi_kulit
 * @property integer $kepala_leslok_pil
 * @property string $kepala_lesi_lokasi
 * @property integer $kepala_lestuk_pil
 * @property string $kepala_lesi_bentuk
 * @property integer $kepala_lestip_pil
 * @property string $kepala_lesi_tipe
 * @property integer $kepala_leswarna_pil
 * @property string $kepala_lesi_warna
 * @property integer $kepala_inspwaram_pil
 * @property string $kepala_inspeksi_waram
 * @property integer $kepala_inspkuaram_pil
 * @property string $kepala_inspeksi_kuaram
 * @property integer $kepala_inspdisram_pil
 * @property string $kepala_inspeksi_disram
 * @property integer $kepala_inspbenjah_pil
 * @property string $kepala_inspesksi_benjah
 * @property integer $kepala_inspkuljah_pil
 * @property string $kepala_inspeksi_kuljah
 * @property integer $kepala_inspekspresi_pil
 * @property string $kepala_inspeksi_ekspresi
 * @property integer $kepala_inspsutalis_pil
 * @property string $kepala_inspeksi_sutalis
 * @property integer $kepala_inspfonan_pil
 * @property string $kepala_inspeksi_fonan
 * @property integer $kepala_palpfonan_pil
 * @property string $kepala_palpasi_fonan
 * @property integer $kepala_palprambut_pil
 * @property string $kepala_palpasi_rambut
 * @property integer $kepala_palptekstur_pil
 * @property string $kepala_palpasi_tekstur
 * @property integer $kepala_palpkulkep_pil
 * @property string $kepala_palpasi_kulkep
 * @property integer $kepala_palpkuljah_pil
 * @property string $kepala_palpasi_kuljah
 * @property integer $evaluasi_mata_pil
 * @property string $evaluasi_mata
 * @property integer $mata_inspposisi_pil
 * @property string $mata_posisi_kanan
 * @property string $mata_posisi_kiri
 * @property integer $mata_inspkelopak_pil
 * @property string $mata_kelopak_kanan
 * @property string $mata_kelopak_kiri
 * @property string $mata_alis_kanan
 * @property string $mata_alis_kiri
 * @property integer $mata_inspebra_pil
 * @property string $mata_palpebra_kanan
 * @property string $mata_palpebra_kiri
 * @property string $mata_aparlak_kanan
 * @property string $mata_aparlak_kiri
 * @property integer $mata_inspkonjung_pil
 * @property string $mata_konjungtiva_kanan
 * @property string $mata_konjungtiva_kiri
 * @property integer $mata_inspsklera_pil
 * @property string $mata_sklera_kanan
 * @property string $mata_sklera_kiri
 * @property integer $mata_inspkornea_pil
 * @property string $mata_kornea_kanan
 * @property string $mata_kornea_kiri
 * @property integer $mata_inspirlen_pil
 * @property string $mata_iris_kanan
 * @property string $mata_iris_kiri
 * @property integer $mata_insppupil_pil
 * @property string $mata_pupil_kanan
 * @property string $mata_pupil_kiri
 * @property string $mata_refcah_kanan
 * @property string $mata_refcah_kiri
 * @property integer $mata_inspretina_pil
 * @property string $mata_retina_kanan
 * @property string $mata_retina_kiri
 * @property integer $mata_inspoeo_pil
 * @property string $mata_oeo_kanan
 * @property string $mata_oeo_kiri
 * @property integer $mata_inspmekmus_pil
 * @property string $mata_mekmus_kanan
 * @property string $mata_mekmus_kiri
 * @property integer $mata_inspreffun_pil
 * @property string $mata_reffun_kanan
 * @property string $mata_reffun_kiri
 * @property integer $mata_inspdisop_pil
 * @property string $mata_disop_kanan
 * @property string $mata_disop_kiri
 * @property string $mata_palpkel_kanan
 * @property string $mata_palpkel_kiri
 * @property string $mata_palpglan_kanan
 * @property string $mata_palpglan_kiri
 * @property integer $mata_ujivisus_kanan1
 * @property integer $mata_ujivisus_kanan2
 * @property integer $mata_ujivisus_kiri1
 * @property integer $mata_ujivisus_kiri2
 * @property string $mata_ujifront_kanan
 * @property string $mata_ujifront_kiri
 * @property integer $mata_ujitonom_kanan
 * @property integer $mata_ujitonom_kiri
 * @property integer $evaluasi_telinga_pil
 * @property string $evaluasi_telinga
 * @property string $telinga_inspeksi_aurikula
 * @property string $telinga_inspeksi_liang
 * @property string $telinga_inspeksi_gendang
 * @property string $telinga_palpasi_tragus
 * @property string $telinga_palpasi_mastoid
 * @property string $telinga_palpasi_aurikula
 * @property string $telinga_uji_bisik
 * @property string $telinga_uji_garputala
 * @property string $telinga_uji_audiogram
 * @property string $telinga_uji_tympanogram
 * @property string $telinga_uji_vestibulogram
 * @property integer $evaluasi_hidung_pil
 * @property string $evaluasi_hidung
 * @property string $hidung_inspeksi_luar
 * @property string $hidung_inspeksi_mukosa
 * @property string $hidung_inspeksi_septum
 * @property string $hidung_palpasi_sinus
 * @property integer $evaluasi_mulut_pil
 * @property string $evaluasi_mulut
 * @property integer $mulut_inspbibir_pil
 * @property string $mulut_inspeksi_bibir
 * @property string $mulut_inspeksi_mukosa
 * @property integer $mulut_inspgusi_pil
 * @property string $mulut_inspeksi_gusi
 * @property integer $mulut_inspgigi_pil
 * @property string $mulut_inspeksi_gigi
 * @property string $mulut_inspeksi_palatum
 * @property integer $mulut_insplidah_pil
 * @property string $mulut_inspeksi_lidah
 * @property integer $lidah_leslok_pil
 * @property string $lidah_lesi_lokasi
 * @property integer $lidah_lestuk_pil
 * @property string $lidah_lesi_bentuk
 * @property integer $lidah_lestip_pil
 * @property string $lidah_lesi_tipe
 * @property integer $lidah_leswarna_pil
 * @property string $lidah_lesi_warna
 * @property string $mulut_inspeksi_dasar
 * @property integer $mulut_insptonsil_pil
 * @property string $mulut_inspeksi_tonsil
 * @property string $tonsil_membesar_kanan
 * @property string $tonsil_membesar_kiri
 * @property integer $mulut_inspfaring_pil
 * @property string $mulut_inspeksi_faring
 * @property string $mulut_palpasi_bibir
 * @property string $mulut_palpasi_mukosa
 * @property string $mulut_palpasi_lidah
 * @property integer $evaluasi_leher_pil
 * @property string $evaluasi_leher
 * @property integer $leher_inspleher_pil
 * @property string $leher_inspeksi_leher
 * @property integer $leher_insptrakea_pil
 * @property string $leher_inspeksi_trakea
 * @property integer $leher_inspkeltir_pil
 * @property string $leher_inspeksi_tiroid
 * @property integer $leher_inspkaduk_pil
 * @property string $leher_inspeksi_kuduk
 * @property integer $leher_palpkellim_pil
 * @property string $leher_palpasi_limfe
 * @property string $limfe_pembesaran_lokasi
 * @property string $limfe_pembesaran_bentuk
 * @property string $limfe_pembesaran_ukuran
 * @property integer $leher_palpkeltir_pil
 * @property string $leher_palpasi_tiroid
 * @property string $tiroid_pembesaran_tepi
 * @property string $tiroid_pembesaran_permukaan
 * @property string $tiroid_pembesaran_ukuran
 * @property integer $leher_palptumor_pil
 * @property string $leher_palpasi_tumor
 * @property string $leher_tumor_jenis
 * @property string $leher_tumor_tepi
 * @property string $leher_tumor_permukaan
 * @property string $leher_tumor_gerak
 * @property string $leher_tumor_ukuran
 * @property integer $leher_palptrakea_pil
 * @property string $leher_palpasi_trakea
 * @property string $leher_kanan_dvs
 * @property string $leher_kanan_caratis
 * @property string $leher_kiri_dvs
 * @property string $leher_kirii_caratis
 * @property string $leher_auskultasi_arteri
 * @property string $leher_auskultasi_tiroid
 * @property integer $evaluasi_punggung_pil
 * @property string $evaluasi_punggung
 * @property string $punggung_inspeksi_bentuk
 * @property string $punggung_palpasi
 * @property string $punggung_perkusi
 * @property integer $evaluasi_thopar_pil
 * @property string $evaluasi_thoraks_paru
 * @property string $paru_inspeksi_dada
 * @property string $paru_inspeksi_bentuk
 * @property string $paru_palpasi_dada
 * @property string $palpasi_tumor_lokasi
 * @property string $palpasi_tumor_konsistensi
 * @property string $palpasi_tumor_permukaan
 * @property string $palpasi_tumor_pulsasi
 * @property string $paru_palpasi_ekspansi
 * @property string $paru_palpasi_taktil
 * @property string $paru_batas_belkiri
 * @property string $paru_batas_belkanan
 * @property string $paru_perkusi_dada
 * @property string $paru_perkusi_kiri
 * @property string $paru_perkusi_kanan
 * @property string $paru_auskultasi_frekuensi
 * @property string $paru_auskultasi_irama
 * @property string $paru_auskultasi_napas
 * @property string $auskultasi_napas_tambahan
 * @property string $paru_auskultasi_lokasi
 * @property string $paru_auskultasi_transmisi
 * @property integer $evaluasi_jantung_pil
 * @property string $evaluasi_jantung
 * @property string $jantung_inspeksi_ictus
 * @property string $jantung_palpasi_ictus
 * @property string $jantung_perkusi_atas
 * @property string $jantung_perkusi_bawah
 * @property string $jantung_perkusi_kanan
 * @property string $jantung_perkusi_kiri
 * @property string $jantung_auskultasi_bunyi
 * @property string $auskultasi_bunyi_splittings1
 * @property string $auskultasi_bunyi_splittings2
 * @property string $jantung_auskultasi_tambahan
 * @property string $auskultasi_tambahan_jenis
 * @property string $auskultasi_tambahan_lokalisasi
 * @property string $auskultasi_tambahan_intensitas
 * @property string $auskultasi_tambahan_pitch
 * @property string $auskultasi_tambahan_konfig
 * @property string $auskultasi_tambahan_kualitas
 * @property string $auskultasi_tambahan_penjalaran
 * @property integer $evaluasi_payudara_pil
 * @property string $evaluasi_payudara
 * @property string $payudara_inspeksi_payudara
 * @property string $payudara_inspeksi_aksilla
 * @property string $payudara_inspeksi_kulit
 * @property string $inspeksi_kulit_kontur
 * @property string $payudara_inspeksi_puting
 * @property string $payudara_palpasi_payudara
 * @property string $payudara_palpasi_aksilla
 * @property integer $evaluasi_abdomen_pil
 * @property string $evaluasi_abdomen
 * @property string $abdomen_inspeksi_umbilikus
 * @property string $abdomen_inspeksi_pulsasi
 * @property string $abdomen_inspeksi_gerakan
 * @property string $abdomen_inspeksi_bentuk
 * @property string $abdomen_inspeksi_kulit
 * @property integer $abdomen_palpleo1_pil
 * @property string $palpasi_leopoldi_tinggi
 * @property string $palpasi_leopoldi_lingkar
 * @property string $palpasi_leopoldi_tafsiran
 * @property integer $abdomen_palpleo2_pil
 * @property string $palpasi_leopoldii_letak
 * @property integer $abdomen_palpleo3_pil
 * @property string $palpasi_leopoldiii_presentasi
 * @property integer $abdomen_palpleo4_pil
 * @property string $palpasi_leopoldvi_presentasi
 * @property string $abdomen_palpasi_abdomen
 * @property string $abdomen_tumor_lokalisasi
 * @property string $abdomen_tumor_regio
 * @property string $abdomen_tumor_konsistensi
 * @property string $abdomen_tumor_pergerakan
 * @property string $abdomen_tumor_ukuran
 * @property string $abdomen_tekan_regio
 * @property string $abdomen_palpasi_ascites
 * @property string $abdomen_palpasi_hati
 * @property string $palpasi_hati_derajat
 * @property string $palpasi_hati_permukaan
 * @property string $palpasi_hati_konsistensi
 * @property string $palpasi_hati_tepi
 * @property string $abdomen_palpasi_limpa
 * @property string $palpasi_limpa_derajat
 * @property string $palpasi_limpa_permukaan
 * @property string $palpasi_limpa_konsistensi
 * @property string $palpasi_limpa_tepi
 * @property string $abdomen_palpasi_ginjal
 * @property string $abdomen_perkusi_abdomen
 * @property string $abdomen_perkusi_ascites
 * @property integer $abdomen_ausleo2_pil
 * @property integer $auskultasi_leopoldii_denyut
 * @property string $auskultasi_leopoldii_irama
 * @property integer $abdomen_ausperista_pil
 * @property string $abdomen_auskultasi_peristaltik
 * @property string $abdomen_auskultasi_bising
 * @property integer $evaluasi_genitalia_pil
 * @property string $evaluasi_genitalia
 * @property string $genetalia_inspeksi_kulit
 * @property string $genetalia_inspeksi_penis
 * @property string $genetalia_inspeksi_scrotum
 * @property string $genetalia_inspeksi_vagina
 * @property string $inspeksi_vagina_cairan
 * @property string $genetalia_inspeksi_anus
 * @property string $genetalia_palpasi_kulit
 * @property string $genetalia_palpasi_penis
 * @property string $genetalia_palpasi_scrotum
 * @property string $genetalia_palpasi_vagina
 * @property string $genetalia_palpasi_anus
 * @property integer $evaluasi_ekstrimitas_pil
 * @property string $evaluasi_ekstrimitas
 * @property integer $ekstrimitas_atas_pil
 * @property string $ekstrimitas_atas
 * @property string $atas_inspeksi_bahu
 * @property string $atas_inspeksi_siku
 * @property string $atas_inspeksi_pergelangan
 * @property string $atas_inspeksi_kuku
 * @property string $atas_inspkuku_warna
 * @property string $atas_inspkuku_bentuk
 * @property string $atas_inspkuku_lesi
 * @property string $atas_palpasi_bahu
 * @property string $atas_palpasi_siku
 * @property string $atas_palpasi_pergelangan
 * @property string $atas_palpasi_kuku
 * @property integer $ekstrimitas_bawah_pil
 * @property string $ekstrimitas_bawah
 * @property string $bawah_inspeksi_pinggul
 * @property string $bawah_inspeksi_lutut
 * @property string $bawah_inspeksi_pergelangan
 * @property string $bawah_inspeksi_kuku
 * @property string $bawah_inspkuku_warna
 * @property string $bawah_inspkuku_bentuk
 * @property string $bawah_inspkuku_lesi
 * @property string $bawah_palpasi_pinggul
 * @property string $bawah_palpasi_lutut
 * @property string $bawah_palpasi_pergelangan
 * @property string $bawah_palpasi_kuku
 * @property integer $ekstrimitas_refleks_pil
 * @property integer $refleks_biceps_pil
 * @property string $refleks_biceps
 * @property integer $refleks_triceps_pil
 * @property string $refleks_triceps
 * @property integer $refleks_achilles_pil
 * @property string $refleks_achilles
 * @property integer $refleks_knee_pil
 * @property string $refleks_knee
 * @property integer $refleks_babynsky_pil
 * @property string $refleks_babynsky
 * @property integer $refleks_babynskyi_pil
 * @property string $refleks_babynskyi
 * @property integer $refleks_babynskyii_pil
 * @property string $refleks_babynskyii
 * @property integer $refleks_kernig_pil
 * @property string $refleks_kernig
 * @property integer $refleks_laseque_pil
 * @property string $refleks_laseque
 * @property integer $refleks_menghisap_pil
 * @property string $refleks_menghisap
 * @property integer $refleks_menggenggam_pil
 * @property string $refleks_menggenggam
 * @property integer $refleks_moro_pil
 * @property string $refleks_moro
 * @property integer $refleks_mencari_pil
 * @property string $refleks_mencari
 * @property integer $refleks_leher_pil
 * @property string $refleks_leher
 *
 * @property Registrasi $registrasi
 * @property User $user
 */
class PemeriksaanFisik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemeriksaan_fisik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id', 'user_id', 'tb_lengan_pil', 'tb_kepala_pil', 'tb_dada_pil', 'tb_perut_pil', 'ttv_td_dias', 'ttv_td_sis', 'ttv_nadi', 'nadi_irama_pil', 'nadi_kuang_pil', 'nadi_kika_pil', 'nadi_amplitudo_pil', 'ttv_pernapasan', 'pernapasan_irama_pil', 'suhu_axilla_pil', 'suhu_oral_pil', 'suhu_rectal_pil', 'evaluasi_kulit_pil', 'kulit_inspwarna_pil', 'kulit_insplembab_pil', 'kulit_insplesi_pil', 'kulit_leslok_pil', 'kulit_lestuk_pil', 'kulit_lestip_pil', 'kulit_leswarna_pil', 'kulit_palptem_pil', 'kulit_palpteks_pil', 'kulit_palptur_pil', 'evaluasi_kepala_pil', 'kepala_inspben_pil', 'kepala_inspkul_pil', 'kepala_leslok_pil', 'kepala_lestuk_pil', 'kepala_lestip_pil', 'kepala_leswarna_pil', 'kepala_inspwaram_pil', 'kepala_inspkuaram_pil', 'kepala_inspdisram_pil', 'kepala_inspbenjah_pil', 'kepala_inspkuljah_pil', 'kepala_inspekspresi_pil', 'kepala_inspsutalis_pil', 'kepala_inspfonan_pil', 'kepala_palpfonan_pil', 'kepala_palprambut_pil', 'kepala_palptekstur_pil', 'kepala_palpkulkep_pil', 'kepala_palpkuljah_pil', 'evaluasi_mata_pil', 'mata_inspposisi_pil', 'mata_inspkelopak_pil', 'mata_inspebra_pil', 'mata_inspkonjung_pil', 'mata_inspsklera_pil', 'mata_inspkornea_pil', 'mata_inspirlen_pil', 'mata_insppupil_pil', 'mata_inspretina_pil', 'mata_inspoeo_pil', 'mata_inspmekmus_pil', 'mata_inspreffun_pil', 'mata_inspdisop_pil', 'mata_ujivisus_kanan1', 'mata_ujivisus_kanan2', 'mata_ujivisus_kiri1', 'mata_ujivisus_kiri2', 'mata_ujitonom_kanan', 'mata_ujitonom_kiri', 'evaluasi_telinga_pil', 'evaluasi_hidung_pil', 'evaluasi_mulut_pil', 'mulut_inspbibir_pil', 'mulut_inspgusi_pil', 'mulut_inspgigi_pil', 'mulut_insplidah_pil', 'lidah_leslok_pil', 'lidah_lestuk_pil', 'lidah_lestip_pil', 'lidah_leswarna_pil', 'mulut_insptonsil_pil', 'mulut_inspfaring_pil', 'evaluasi_leher_pil', 'leher_inspleher_pil', 'leher_insptrakea_pil', 'leher_inspkeltir_pil', 'leher_inspkaduk_pil', 'leher_palpkellim_pil', 'leher_palpkeltir_pil', 'leher_palptumor_pil', 'leher_palptrakea_pil', 'evaluasi_punggung_pil', 'evaluasi_thopar_pil', 'evaluasi_jantung_pil', 'evaluasi_payudara_pil', 'evaluasi_abdomen_pil', 'abdomen_palpleo1_pil', 'abdomen_palpleo2_pil', 'abdomen_palpleo3_pil', 'abdomen_palpleo4_pil', 'abdomen_ausleo2_pil', 'auskultasi_leopoldii_denyut', 'abdomen_ausperista_pil', 'evaluasi_genitalia_pil', 'evaluasi_ekstrimitas_pil', 'ekstrimitas_atas_pil', 'ekstrimitas_bawah_pil', 'ekstrimitas_refleks_pil', 'refleks_biceps_pil', 'refleks_triceps_pil', 'refleks_achilles_pil', 'refleks_knee_pil', 'refleks_babynsky_pil', 'refleks_babynskyi_pil', 'refleks_babynskyii_pil', 'refleks_kernig_pil', 'refleks_laseque_pil', 'refleks_menghisap_pil', 'refleks_menggenggam_pil', 'refleks_moro_pil', 'refleks_mencari_pil', 'refleks_leher_pil'], 'integer'],
            [['st_keadaan_umum', 'st_kesadaran', 'kesadaran_gcs_e', 'kesadaran_gcs_v', 'kesadaran_gcs_m', 'st_status_gizi', 'st_habitus', 'nadi_irama', 'nadi_kuang', 'nadi_kika', 'nadi_amplitudo', 'pernapasan_irama', 'evaluasi_kulit', 'kulit_inspeksi_warna', 'kulit_inspeksi_kelembaban', 'kulit_lesi_lokasi', 'kulit_lesi_bentuk', 'kulit_lesi_tipe', 'kulit_lesi_warna', 'kulit_palpasi_temperatur', 'kulit_palpasi_tekstur', 'kulit_palpasi_turgor', 'evaluasi_kepala', 'kepala_inspeksi_bentuk', 'kepala_lesi_lokasi', 'kepala_lesi_bentuk', 'kepala_lesi_tipe', 'kepala_lesi_warna', 'kepala_inspeksi_waram', 'kepala_inspeksi_kuaram', 'kepala_inspeksi_disram', 'kepala_inspesksi_benjah', 'kepala_inspeksi_ekspresi', 'kepala_inspeksi_sutalis', 'kepala_inspeksi_fonan', 'kepala_palpasi_fonan', 'kepala_palpasi_rambut', 'evaluasi_mata', 'mata_posisi_kanan', 'mata_posisi_kiri', 'mata_kelopak_kanan', 'mata_kelopak_kiri', 'mata_alis_kanan', 'mata_alis_kiri', 'mata_palpebra_kanan', 'mata_palpebra_kiri', 'mata_aparlak_kanan', 'mata_aparlak_kiri', 'mata_konjungtiva_kanan', 'mata_konjungtiva_kiri', 'mata_sklera_kanan', 'mata_sklera_kiri', 'mata_kornea_kanan', 'mata_kornea_kiri', 'mata_iris_kanan', 'mata_iris_kiri', 'mata_pupil_kanan', 'mata_pupil_kiri', 'mata_refcah_kanan', 'mata_refcah_kiri', 'mata_retina_kanan', 'mata_retina_kiri', 'mata_oeo_kanan', 'mata_oeo_kiri', 'mata_mekmus_kanan', 'mata_mekmus_kiri', 'mata_reffun_kanan', 'mata_reffun_kiri', 'mata_disop_kanan', 'mata_disop_kiri', 'mata_palpglan_kanan', 'mata_palpglan_kiri', 'mata_ujifront_kanan', 'mata_ujifront_kiri', 'evaluasi_telinga', 'telinga_inspeksi_aurikula', 'telinga_uji_bisik', 'telinga_uji_garputala', 'telinga_uji_audiogram', 'telinga_uji_tympanogram', 'telinga_uji_vestibulogram', 'evaluasi_hidung', 'evaluasi_mulut', 'lidah_lesi_lokasi', 'lidah_lesi_bentuk', 'lidah_lesi_tipe', 'lidah_lesi_warna', 'tonsil_membesar_kanan', 'tonsil_membesar_kiri', 'evaluasi_leher', 'leher_inspeksi_kuduk', 'limfe_pembesaran_lokasi', 'limfe_pembesaran_bentuk', 'tiroid_pembesaran_tepi', 'tiroid_pembesaran_permukaan', 'leher_palpasi_tumor', 'leher_tumor_jenis', 'leher_tumor_tepi', 'leher_tumor_permukaan', 'leher_tumor_gerak', 'leher_palpasi_trakea', 'leher_kanan_dvs', 'leher_kanan_caratis', 'leher_kiri_dvs', 'leher_kirii_caratis', 'leher_auskultasi_arteri', 'leher_auskultasi_tiroid', 'evaluasi_punggung', 'punggung_inspeksi_bentuk', 'punggung_perkusi', 'evaluasi_thoraks_paru', 'paru_inspeksi_dada', 'paru_inspeksi_bentuk', 'palpasi_tumor_lokasi', 'palpasi_tumor_konsistensi', 'palpasi_tumor_permukaan', 'palpasi_tumor_pulsasi', 'paru_palpasi_ekspansi', 'paru_palpasi_taktil', 'paru_batas_belkiri', 'paru_batas_belkanan', 'paru_perkusi_dada', 'paru_perkusi_kiri', 'paru_perkusi_kanan', 'paru_auskultasi_frekuensi', 'paru_auskultasi_irama', 'paru_auskultasi_napas', 'auskultasi_napas_tambahan', 'paru_auskultasi_lokasi', 'paru_auskultasi_transmisi', 'evaluasi_jantung', 'jantung_inspeksi_ictus', 'jantung_palpasi_ictus', 'jantung_perkusi_atas', 'jantung_perkusi_bawah', 'jantung_perkusi_kanan', 'jantung_perkusi_kiri', 'auskultasi_bunyi_splittings1', 'auskultasi_bunyi_splittings2', 'jantung_auskultasi_tambahan', 'auskultasi_tambahan_jenis', 'auskultasi_tambahan_lokalisasi', 'auskultasi_tambahan_intensitas', 'auskultasi_tambahan_pitch', 'auskultasi_tambahan_konfig', 'auskultasi_tambahan_kualitas', 'auskultasi_tambahan_penjalaran', 'evaluasi_payudara', 'payudara_inspeksi_payudara', 'inspeksi_kulit_kontur', 'evaluasi_abdomen', 'abdomen_inspeksi_pulsasi', 'abdomen_inspeksi_gerakan', 'palpasi_leopoldii_letak', 'palpasi_leopoldiii_presentasi', 'palpasi_leopoldvi_presentasi', 'abdomen_tumor_lokalisasi', 'abdomen_tumor_konsistensi', 'abdomen_tumor_pergerakan', 'abdomen_palpasi_ascites', 'abdomen_palpasi_hati', 'palpasi_hati_derajat', 'palpasi_hati_permukaan', 'palpasi_hati_konsistensi', 'palpasi_hati_tepi', 'abdomen_palpasi_limpa', 'palpasi_limpa_derajat', 'palpasi_limpa_permukaan', 'palpasi_limpa_konsistensi', 'palpasi_limpa_tepi', 'abdomen_palpasi_ginjal', 'abdomen_perkusi_abdomen', 'abdomen_perkusi_ascites', 'auskultasi_leopoldii_irama', 'abdomen_auskultasi_peristaltik', 'abdomen_auskultasi_bising', 'evaluasi_genitalia', 'inspeksi_vagina_cairan', 'evaluasi_ekstrimitas', 'ekstrimitas_atas', 'atas_inspkuku_warna', 'atas_inspkuku_bentuk', 'atas_inspkuku_lesi', 'atas_palpasi_kuku', 'ekstrimitas_bawah', 'bawah_inspkuku_warna', 'bawah_inspkuku_bentuk', 'bawah_inspkuku_lesi', 'bawah_palpasi_kuku', 'refleks_biceps', 'refleks_triceps', 'refleks_achilles', 'refleks_knee', 'refleks_babynsky', 'refleks_babynskyi', 'refleks_babynskyii', 'refleks_kernig', 'refleks_laseque', 'refleks_menghisap', 'refleks_menggenggam', 'refleks_moro', 'refleks_mencari', 'refleks_leher'], 'string'],
            [['st_bb', 'st_tb', 'tb_lengan_nil', 'tb_kepala_nil', 'tb_dada_nil', 'tb_perut_nil', 'st_tmt', 'ttv_suhu', 'suhu_axilla', 'suhu_oral', 'suhu_rectal', 'limfe_pembesaran_ukuran', 'tiroid_pembesaran_ukuran', 'leher_tumor_ukuran', 'palpasi_leopoldi_tinggi', 'palpasi_leopoldi_lingkar', 'palpasi_leopoldi_tafsiran', 'abdomen_tumor_ukuran'], 'number'],
            [['kepala_inspeksi_kulit', 'kepala_inspeksi_kuljah', 'telinga_inspeksi_gendang', 'telinga_palpasi_tragus', 'telinga_palpasi_mastoid', 'telinga_palpasi_aurikula', 'hidung_inspeksi_luar', 'mulut_inspeksi_bibir', 'abdomen_tumor_regio', 'abdomen_tekan_regio', 'genetalia_inspeksi_vagina'], 'string', 'max' => 200],
            [['kepala_palpasi_tekstur', 'mulut_inspeksi_gusi', 'mulut_inspeksi_dasar', 'leher_inspeksi_trakea', 'leher_inspeksi_tiroid', 'payudara_inspeksi_aksilla', 'payudara_palpasi_payudara', 'payudara_palpasi_aksilla', 'abdomen_inspeksi_umbilikus', 'genetalia_inspeksi_scrotum', 'genetalia_inspeksi_anus', 'genetalia_palpasi_kulit', 'genetalia_palpasi_penis', 'genetalia_palpasi_scrotum', 'atas_inspeksi_kuku', 'bawah_inspeksi_pinggul', 'bawah_inspeksi_lutut'], 'string', 'max' => 50],
            [['kepala_palpasi_kulkep', 'kepala_palpasi_kuljah', 'hidung_palpasi_sinus', 'mulut_inspeksi_faring', 'mulut_palpasi_bibir', 'mulut_palpasi_mukosa', 'mulut_palpasi_lidah', 'leher_inspeksi_leher', 'paru_palpasi_dada'], 'string', 'max' => 150],
            [['mata_palpkel_kanan', 'mata_palpkel_kiri', 'telinga_inspeksi_liang', 'hidung_inspeksi_septum', 'mulut_inspeksi_mukosa', 'mulut_inspeksi_gigi', 'mulut_inspeksi_palatum', 'mulut_inspeksi_tonsil', 'leher_palpasi_limfe', 'leher_palpasi_tiroid', 'punggung_palpasi', 'jantung_auskultasi_bunyi', 'payudara_inspeksi_kulit', 'payudara_inspeksi_puting', 'abdomen_inspeksi_bentuk', 'abdomen_inspeksi_kulit', 'abdomen_palpasi_abdomen', 'genetalia_inspeksi_kulit', 'genetalia_inspeksi_penis', 'genetalia_palpasi_vagina', 'genetalia_palpasi_anus', 'atas_inspeksi_bahu', 'atas_inspeksi_siku', 'atas_inspeksi_pergelangan', 'atas_palpasi_bahu', 'atas_palpasi_siku', 'atas_palpasi_pergelangan', 'bawah_inspeksi_pergelangan', 'bawah_inspeksi_kuku', 'bawah_palpasi_pinggul', 'bawah_palpasi_lutut', 'bawah_palpasi_pergelangan'], 'string', 'max' => 100],
            [['hidung_inspeksi_mukosa'], 'string', 'max' => 250],
            [['mulut_inspeksi_lidah'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registrasi_id' => 'Registrasi ID',
            'user_id' => 'User ID',
            'st_keadaan_umum' => 'St Keadaan Umum',
            'st_kesadaran' => 'St Kesadaran',
            'kesadaran_gcs_e' => 'Kesadaran Gcs E',
            'kesadaran_gcs_v' => 'Kesadaran Gcs V',
            'kesadaran_gcs_m' => 'Kesadaran Gcs M',
            'st_bb' => 'St Bb',
            'st_tb' => 'St Tb',
            'tb_lengan_pil' => 'Tb Lengan Pil',
            'tb_lengan_nil' => 'Tb Lengan Nil',
            'tb_kepala_pil' => 'Tb Kepala Pil',
            'tb_kepala_nil' => 'Tb Kepala Nil',
            'tb_dada_pil' => 'Tb Dada Pil',
            'tb_dada_nil' => 'Tb Dada Nil',
            'tb_perut_pil' => 'Tb Perut Pil',
            'tb_perut_nil' => 'Tb Perut Nil',
            'st_tmt' => 'St Tmt',
            'st_status_gizi' => 'St Status Gizi',
            'st_habitus' => 'St Habitus',
            'ttv_td_dias' => 'Ttv Td Dias',
            'ttv_td_sis' => 'Ttv Td Sis',
            'ttv_nadi' => 'Ttv Nadi',
            'nadi_irama_pil' => 'Nadi Irama Pil',
            'nadi_irama' => 'Nadi Irama',
            'nadi_kuang_pil' => 'Nadi Kuang Pil',
            'nadi_kuang' => 'Nadi Kuang',
            'nadi_kika_pil' => 'Nadi Kika Pil',
            'nadi_kika' => 'Nadi Kika',
            'nadi_amplitudo_pil' => 'Nadi Amplitudo Pil',
            'nadi_amplitudo' => 'Nadi Amplitudo',
            'ttv_pernapasan' => 'Ttv Pernapasan',
            'pernapasan_irama_pil' => 'Pernapasan Irama Pil',
            'pernapasan_irama' => 'Pernapasan Irama',
            'ttv_suhu' => 'Ttv Suhu',
            'suhu_axilla_pil' => 'Suhu Axilla Pil',
            'suhu_axilla' => 'Suhu Axilla',
            'suhu_oral_pil' => 'Suhu Oral Pil',
            'suhu_oral' => 'Suhu Oral',
            'suhu_rectal_pil' => 'Suhu Rectal Pil',
            'suhu_rectal' => 'Suhu Rectal',
            'evaluasi_kulit_pil' => 'Evaluasi Kulit Pil',
            'evaluasi_kulit' => 'Evaluasi Kulit',
            'kulit_inspwarna_pil' => 'Kulit Inspwarna Pil',
            'kulit_inspeksi_warna' => 'Kulit Inspeksi Warna',
            'kulit_insplembab_pil' => 'Kulit Insplembab Pil',
            'kulit_inspeksi_kelembaban' => 'Kulit Inspeksi Kelembaban',
            'kulit_insplesi_pil' => 'Kulit Insplesi Pil',
            'kulit_leslok_pil' => 'Kulit Leslok Pil',
            'kulit_lesi_lokasi' => 'Kulit Lesi Lokasi',
            'kulit_lestuk_pil' => 'Kulit Lestuk Pil',
            'kulit_lesi_bentuk' => 'Kulit Lesi Bentuk',
            'kulit_lestip_pil' => 'Kulit Lestip Pil',
            'kulit_lesi_tipe' => 'Kulit Lesi Tipe',
            'kulit_leswarna_pil' => 'Kulit Leswarna Pil',
            'kulit_lesi_warna' => 'Kulit Lesi Warna',
            'kulit_palptem_pil' => 'Kulit Palptem Pil',
            'kulit_palpasi_temperatur' => 'Kulit Palpasi Temperatur',
            'kulit_palpteks_pil' => 'Kulit Palpteks Pil',
            'kulit_palpasi_tekstur' => 'Kulit Palpasi Tekstur',
            'kulit_palptur_pil' => 'Kulit Palptur Pil',
            'kulit_palpasi_turgor' => 'Kulit Palpasi Turgor',
            'evaluasi_kepala_pil' => 'Evaluasi Kepala Pil',
            'evaluasi_kepala' => 'Evaluasi Kepala',
            'kepala_inspben_pil' => 'Kepala Inspben Pil',
            'kepala_inspeksi_bentuk' => 'Kepala Inspeksi Bentuk',
            'kepala_inspkul_pil' => 'Kepala Inspkul Pil',
            'kepala_inspeksi_kulit' => 'Kepala Inspeksi Kulit',
            'kepala_leslok_pil' => 'Kepala Leslok Pil',
            'kepala_lesi_lokasi' => 'Kepala Lesi Lokasi',
            'kepala_lestuk_pil' => 'Kepala Lestuk Pil',
            'kepala_lesi_bentuk' => 'Kepala Lesi Bentuk',
            'kepala_lestip_pil' => 'Kepala Lestip Pil',
            'kepala_lesi_tipe' => 'Kepala Lesi Tipe',
            'kepala_leswarna_pil' => 'Kepala Leswarna Pil',
            'kepala_lesi_warna' => 'Kepala Lesi Warna',
            'kepala_inspwaram_pil' => 'Kepala Inspwaram Pil',
            'kepala_inspeksi_waram' => 'Kepala Inspeksi Waram',
            'kepala_inspkuaram_pil' => 'Kepala Inspkuaram Pil',
            'kepala_inspeksi_kuaram' => 'Kepala Inspeksi Kuaram',
            'kepala_inspdisram_pil' => 'Kepala Inspdisram Pil',
            'kepala_inspeksi_disram' => 'Kepala Inspeksi Disram',
            'kepala_inspbenjah_pil' => 'Kepala Inspbenjah Pil',
            'kepala_inspesksi_benjah' => 'Kepala Inspesksi Benjah',
            'kepala_inspkuljah_pil' => 'Kepala Inspkuljah Pil',
            'kepala_inspeksi_kuljah' => 'Kepala Inspeksi Kuljah',
            'kepala_inspekspresi_pil' => 'Kepala Inspekspresi Pil',
            'kepala_inspeksi_ekspresi' => 'Kepala Inspeksi Ekspresi',
            'kepala_inspsutalis_pil' => 'Kepala Inspsutalis Pil',
            'kepala_inspeksi_sutalis' => 'Kepala Inspeksi Sutalis',
            'kepala_inspfonan_pil' => 'Kepala Inspfonan Pil',
            'kepala_inspeksi_fonan' => 'Kepala Inspeksi Fonan',
            'kepala_palpfonan_pil' => 'Kepala Palpfonan Pil',
            'kepala_palpasi_fonan' => 'Kepala Palpasi Fonan',
            'kepala_palprambut_pil' => 'Kepala Palprambut Pil',
            'kepala_palpasi_rambut' => 'Kepala Palpasi Rambut',
            'kepala_palptekstur_pil' => 'Kepala Palptekstur Pil',
            'kepala_palpasi_tekstur' => 'Kepala Palpasi Tekstur',
            'kepala_palpkulkep_pil' => 'Kepala Palpkulkep Pil',
            'kepala_palpasi_kulkep' => 'Kepala Palpasi Kulkep',
            'kepala_palpkuljah_pil' => 'Kepala Palpkuljah Pil',
            'kepala_palpasi_kuljah' => 'Kepala Palpasi Kuljah',
            'evaluasi_mata_pil' => 'Evaluasi Mata Pil',
            'evaluasi_mata' => 'Evaluasi Mata',
            'mata_inspposisi_pil' => 'Mata Inspposisi Pil',
            'mata_posisi_kanan' => 'Mata Posisi Kanan',
            'mata_posisi_kiri' => 'Mata Posisi Kiri',
            'mata_inspkelopak_pil' => 'Mata Inspkelopak Pil',
            'mata_kelopak_kanan' => 'Mata Kelopak Kanan',
            'mata_kelopak_kiri' => 'Mata Kelopak Kiri',
            'mata_alis_kanan' => 'Mata Alis Kanan',
            'mata_alis_kiri' => 'Mata Alis Kiri',
            'mata_inspebra_pil' => 'Mata Inspebra Pil',
            'mata_palpebra_kanan' => 'Mata Palpebra Kanan',
            'mata_palpebra_kiri' => 'Mata Palpebra Kiri',
            'mata_aparlak_kanan' => 'Mata Aparlak Kanan',
            'mata_aparlak_kiri' => 'Mata Aparlak Kiri',
            'mata_inspkonjung_pil' => 'Mata Inspkonjung Pil',
            'mata_konjungtiva_kanan' => 'Mata Konjungtiva Kanan',
            'mata_konjungtiva_kiri' => 'Mata Konjungtiva Kiri',
            'mata_inspsklera_pil' => 'Mata Inspsklera Pil',
            'mata_sklera_kanan' => 'Mata Sklera Kanan',
            'mata_sklera_kiri' => 'Mata Sklera Kiri',
            'mata_inspkornea_pil' => 'Mata Inspkornea Pil',
            'mata_kornea_kanan' => 'Mata Kornea Kanan',
            'mata_kornea_kiri' => 'Mata Kornea Kiri',
            'mata_inspirlen_pil' => 'Mata Inspirlen Pil',
            'mata_iris_kanan' => 'Mata Iris Kanan',
            'mata_iris_kiri' => 'Mata Iris Kiri',
            'mata_insppupil_pil' => 'Mata Insppupil Pil',
            'mata_pupil_kanan' => 'Mata Pupil Kanan',
            'mata_pupil_kiri' => 'Mata Pupil Kiri',
            'mata_refcah_kanan' => 'Mata Refcah Kanan',
            'mata_refcah_kiri' => 'Mata Refcah Kiri',
            'mata_inspretina_pil' => 'Mata Inspretina Pil',
            'mata_retina_kanan' => 'Mata Retina Kanan',
            'mata_retina_kiri' => 'Mata Retina Kiri',
            'mata_inspoeo_pil' => 'Mata Inspoeo Pil',
            'mata_oeo_kanan' => 'Mata Oeo Kanan',
            'mata_oeo_kiri' => 'Mata Oeo Kiri',
            'mata_inspmekmus_pil' => 'Mata Inspmekmus Pil',
            'mata_mekmus_kanan' => 'Mata Mekmus Kanan',
            'mata_mekmus_kiri' => 'Mata Mekmus Kiri',
            'mata_inspreffun_pil' => 'Mata Inspreffun Pil',
            'mata_reffun_kanan' => 'Mata Reffun Kanan',
            'mata_reffun_kiri' => 'Mata Reffun Kiri',
            'mata_inspdisop_pil' => 'Mata Inspdisop Pil',
            'mata_disop_kanan' => 'Mata Disop Kanan',
            'mata_disop_kiri' => 'Mata Disop Kiri',
            'mata_palpkel_kanan' => 'Mata Palpkel Kanan',
            'mata_palpkel_kiri' => 'Mata Palpkel Kiri',
            'mata_palpglan_kanan' => 'Mata Palpglan Kanan',
            'mata_palpglan_kiri' => 'Mata Palpglan Kiri',
            'mata_ujivisus_kanan1' => 'Mata Ujivisus Kanan1',
            'mata_ujivisus_kanan2' => 'Mata Ujivisus Kanan2',
            'mata_ujivisus_kiri1' => 'Mata Ujivisus Kiri1',
            'mata_ujivisus_kiri2' => 'Mata Ujivisus Kiri2',
            'mata_ujifront_kanan' => 'Mata Ujifront Kanan',
            'mata_ujifront_kiri' => 'Mata Ujifront Kiri',
            'mata_ujitonom_kanan' => 'Mata Ujitonom Kanan',
            'mata_ujitonom_kiri' => 'Mata Ujitonom Kiri',
            'evaluasi_telinga_pil' => 'Evaluasi Telinga Pil',
            'evaluasi_telinga' => 'Evaluasi Telinga',
            'telinga_inspeksi_aurikula' => 'Telinga Inspeksi Aurikula',
            'telinga_inspeksi_liang' => 'Telinga Inspeksi Liang',
            'telinga_inspeksi_gendang' => 'Telinga Inspeksi Gendang',
            'telinga_palpasi_tragus' => 'Telinga Palpasi Tragus',
            'telinga_palpasi_mastoid' => 'Telinga Palpasi Mastoid',
            'telinga_palpasi_aurikula' => 'Telinga Palpasi Aurikula',
            'telinga_uji_bisik' => 'Telinga Uji Bisik',
            'telinga_uji_garputala' => 'Telinga Uji Garputala',
            'telinga_uji_audiogram' => 'Telinga Uji Audiogram',
            'telinga_uji_tympanogram' => 'Telinga Uji Tympanogram',
            'telinga_uji_vestibulogram' => 'Telinga Uji Vestibulogram',
            'evaluasi_hidung_pil' => 'Evaluasi Hidung Pil',
            'evaluasi_hidung' => 'Evaluasi Hidung',
            'hidung_inspeksi_luar' => 'Hidung Inspeksi Luar',
            'hidung_inspeksi_mukosa' => 'Hidung Inspeksi Mukosa',
            'hidung_inspeksi_septum' => 'Hidung Inspeksi Septum',
            'hidung_palpasi_sinus' => 'Hidung Palpasi Sinus',
            'evaluasi_mulut_pil' => 'Evaluasi Mulut Pil',
            'evaluasi_mulut' => 'Evaluasi Mulut',
            'mulut_inspbibir_pil' => 'Mulut Inspbibir Pil',
            'mulut_inspeksi_bibir' => 'Mulut Inspeksi Bibir',
            'mulut_inspeksi_mukosa' => 'Mulut Inspeksi Mukosa',
            'mulut_inspgusi_pil' => 'Mulut Inspgusi Pil',
            'mulut_inspeksi_gusi' => 'Mulut Inspeksi Gusi',
            'mulut_inspgigi_pil' => 'Mulut Inspgigi Pil',
            'mulut_inspeksi_gigi' => 'Mulut Inspeksi Gigi',
            'mulut_inspeksi_palatum' => 'Mulut Inspeksi Palatum',
            'mulut_insplidah_pil' => 'Mulut Insplidah Pil',
            'mulut_inspeksi_lidah' => 'Mulut Inspeksi Lidah',
            'lidah_leslok_pil' => 'Lidah Leslok Pil',
            'lidah_lesi_lokasi' => 'Lidah Lesi Lokasi',
            'lidah_lestuk_pil' => 'Lidah Lestuk Pil',
            'lidah_lesi_bentuk' => 'Lidah Lesi Bentuk',
            'lidah_lestip_pil' => 'Lidah Lestip Pil',
            'lidah_lesi_tipe' => 'Lidah Lesi Tipe',
            'lidah_leswarna_pil' => 'Lidah Leswarna Pil',
            'lidah_lesi_warna' => 'Lidah Lesi Warna',
            'mulut_inspeksi_dasar' => 'Mulut Inspeksi Dasar',
            'mulut_insptonsil_pil' => 'Mulut Insptonsil Pil',
            'mulut_inspeksi_tonsil' => 'Mulut Inspeksi Tonsil',
            'tonsil_membesar_kanan' => 'Tonsil Membesar Kanan',
            'tonsil_membesar_kiri' => 'Tonsil Membesar Kiri',
            'mulut_inspfaring_pil' => 'Mulut Inspfaring Pil',
            'mulut_inspeksi_faring' => 'Mulut Inspeksi Faring',
            'mulut_palpasi_bibir' => 'Mulut Palpasi Bibir',
            'mulut_palpasi_mukosa' => 'Mulut Palpasi Mukosa',
            'mulut_palpasi_lidah' => 'Mulut Palpasi Lidah',
            'evaluasi_leher_pil' => 'Evaluasi Leher Pil',
            'evaluasi_leher' => 'Evaluasi Leher',
            'leher_inspleher_pil' => 'Leher Inspleher Pil',
            'leher_inspeksi_leher' => 'Leher Inspeksi Leher',
            'leher_insptrakea_pil' => 'Leher Insptrakea Pil',
            'leher_inspeksi_trakea' => 'Leher Inspeksi Trakea',
            'leher_inspkeltir_pil' => 'Leher Inspkeltir Pil',
            'leher_inspeksi_tiroid' => 'Leher Inspeksi Tiroid',
            'leher_inspkaduk_pil' => 'Leher Inspkaduk Pil',
            'leher_inspeksi_kuduk' => 'Leher Inspeksi Kuduk',
            'leher_palpkellim_pil' => 'Leher Palpkellim Pil',
            'leher_palpasi_limfe' => 'Leher Palpasi Limfe',
            'limfe_pembesaran_lokasi' => 'Limfe Pembesaran Lokasi',
            'limfe_pembesaran_bentuk' => 'Limfe Pembesaran Bentuk',
            'limfe_pembesaran_ukuran' => 'Limfe Pembesaran Ukuran',
            'leher_palpkeltir_pil' => 'Leher Palpkeltir Pil',
            'leher_palpasi_tiroid' => 'Leher Palpasi Tiroid',
            'tiroid_pembesaran_tepi' => 'Tiroid Pembesaran Tepi',
            'tiroid_pembesaran_permukaan' => 'Tiroid Pembesaran Permukaan',
            'tiroid_pembesaran_ukuran' => 'Tiroid Pembesaran Ukuran',
            'leher_palptumor_pil' => 'Leher Palptumor Pil',
            'leher_palpasi_tumor' => 'Leher Palpasi Tumor',
            'leher_tumor_jenis' => 'Leher Tumor Jenis',
            'leher_tumor_tepi' => 'Leher Tumor Tepi',
            'leher_tumor_permukaan' => 'Leher Tumor Permukaan',
            'leher_tumor_gerak' => 'Leher Tumor Gerak',
            'leher_tumor_ukuran' => 'Leher Tumor Ukuran',
            'leher_palptrakea_pil' => 'Leher Palptrakea Pil',
            'leher_palpasi_trakea' => 'Leher Palpasi Trakea',
            'leher_kanan_dvs' => 'Leher Kanan Dvs',
            'leher_kanan_caratis' => 'Leher Kanan Caratis',
            'leher_kiri_dvs' => 'Leher Kiri Dvs',
            'leher_kirii_caratis' => 'Leher Kirii Caratis',
            'leher_auskultasi_arteri' => 'Leher Auskultasi Arteri',
            'leher_auskultasi_tiroid' => 'Leher Auskultasi Tiroid',
            'evaluasi_punggung_pil' => 'Evaluasi Punggung Pil',
            'evaluasi_punggung' => 'Evaluasi Punggung',
            'punggung_inspeksi_bentuk' => 'Punggung Inspeksi Bentuk',
            'punggung_palpasi' => 'Punggung Palpasi',
            'punggung_perkusi' => 'Punggung Perkusi',
            'evaluasi_thopar_pil' => 'Evaluasi Thopar Pil',
            'evaluasi_thoraks_paru' => 'Evaluasi Thoraks Paru',
            'paru_inspeksi_dada' => 'Paru Inspeksi Dada',
            'paru_inspeksi_bentuk' => 'Paru Inspeksi Bentuk',
            'paru_palpasi_dada' => 'Paru Palpasi Dada',
            'palpasi_tumor_lokasi' => 'Palpasi Tumor Lokasi',
            'palpasi_tumor_konsistensi' => 'Palpasi Tumor Konsistensi',
            'palpasi_tumor_permukaan' => 'Palpasi Tumor Permukaan',
            'palpasi_tumor_pulsasi' => 'Palpasi Tumor Pulsasi',
            'paru_palpasi_ekspansi' => 'Paru Palpasi Ekspansi',
            'paru_palpasi_taktil' => 'Paru Palpasi Taktil',
            'paru_batas_belkiri' => 'Paru Batas Belkiri',
            'paru_batas_belkanan' => 'Paru Batas Belkanan',
            'paru_perkusi_dada' => 'Paru Perkusi Dada',
            'paru_perkusi_kiri' => 'Paru Perkusi Kiri',
            'paru_perkusi_kanan' => 'Paru Perkusi Kanan',
            'paru_auskultasi_frekuensi' => 'Paru Auskultasi Frekuensi',
            'paru_auskultasi_irama' => 'Paru Auskultasi Irama',
            'paru_auskultasi_napas' => 'Paru Auskultasi Napas',
            'auskultasi_napas_tambahan' => 'Auskultasi Napas Tambahan',
            'paru_auskultasi_lokasi' => 'Paru Auskultasi Lokasi',
            'paru_auskultasi_transmisi' => 'Paru Auskultasi Transmisi',
            'evaluasi_jantung_pil' => 'Evaluasi Jantung Pil',
            'evaluasi_jantung' => 'Evaluasi Jantung',
            'jantung_inspeksi_ictus' => 'Jantung Inspeksi Ictus',
            'jantung_palpasi_ictus' => 'Jantung Palpasi Ictus',
            'jantung_perkusi_atas' => 'Jantung Perkusi Atas',
            'jantung_perkusi_bawah' => 'Jantung Perkusi Bawah',
            'jantung_perkusi_kanan' => 'Jantung Perkusi Kanan',
            'jantung_perkusi_kiri' => 'Jantung Perkusi Kiri',
            'jantung_auskultasi_bunyi' => 'Jantung Auskultasi Bunyi',
            'auskultasi_bunyi_splittings1' => 'Auskultasi Bunyi Splittings1',
            'auskultasi_bunyi_splittings2' => 'Auskultasi Bunyi Splittings2',
            'jantung_auskultasi_tambahan' => 'Jantung Auskultasi Tambahan',
            'auskultasi_tambahan_jenis' => 'Auskultasi Tambahan Jenis',
            'auskultasi_tambahan_lokalisasi' => 'Auskultasi Tambahan Lokalisasi',
            'auskultasi_tambahan_intensitas' => 'Auskultasi Tambahan Intensitas',
            'auskultasi_tambahan_pitch' => 'Auskultasi Tambahan Pitch',
            'auskultasi_tambahan_konfig' => 'Auskultasi Tambahan Konfig',
            'auskultasi_tambahan_kualitas' => 'Auskultasi Tambahan Kualitas',
            'auskultasi_tambahan_penjalaran' => 'Auskultasi Tambahan Penjalaran',
            'evaluasi_payudara_pil' => 'Evaluasi Payudara Pil',
            'evaluasi_payudara' => 'Evaluasi Payudara',
            'payudara_inspeksi_payudara' => 'Payudara Inspeksi Payudara',
            'payudara_inspeksi_aksilla' => 'Payudara Inspeksi Aksilla',
            'payudara_inspeksi_kulit' => 'Payudara Inspeksi Kulit',
            'inspeksi_kulit_kontur' => 'Inspeksi Kulit Kontur',
            'payudara_inspeksi_puting' => 'Payudara Inspeksi Puting',
            'payudara_palpasi_payudara' => 'Payudara Palpasi Payudara',
            'payudara_palpasi_aksilla' => 'Payudara Palpasi Aksilla',
            'evaluasi_abdomen_pil' => 'Evaluasi Abdomen Pil',
            'evaluasi_abdomen' => 'Evaluasi Abdomen',
            'abdomen_inspeksi_umbilikus' => 'Abdomen Inspeksi Umbilikus',
            'abdomen_inspeksi_pulsasi' => 'Abdomen Inspeksi Pulsasi',
            'abdomen_inspeksi_gerakan' => 'Abdomen Inspeksi Gerakan',
            'abdomen_inspeksi_bentuk' => 'Abdomen Inspeksi Bentuk',
            'abdomen_inspeksi_kulit' => 'Abdomen Inspeksi Kulit',
            'abdomen_palpleo1_pil' => 'Abdomen Palpleo1 Pil',
            'palpasi_leopoldi_tinggi' => 'Palpasi Leopoldi Tinggi',
            'palpasi_leopoldi_lingkar' => 'Palpasi Leopoldi Lingkar',
            'palpasi_leopoldi_tafsiran' => 'Palpasi Leopoldi Tafsiran',
            'abdomen_palpleo2_pil' => 'Abdomen Palpleo2 Pil',
            'palpasi_leopoldii_letak' => 'Palpasi Leopoldii Letak',
            'abdomen_palpleo3_pil' => 'Abdomen Palpleo3 Pil',
            'palpasi_leopoldiii_presentasi' => 'Palpasi Leopoldiii Presentasi',
            'abdomen_palpleo4_pil' => 'Abdomen Palpleo4 Pil',
            'palpasi_leopoldvi_presentasi' => 'Palpasi Leopoldvi Presentasi',
            'abdomen_palpasi_abdomen' => 'Abdomen Palpasi Abdomen',
            'abdomen_tumor_lokalisasi' => 'Abdomen Tumor Lokalisasi',
            'abdomen_tumor_regio' => 'Abdomen Tumor Regio',
            'abdomen_tumor_konsistensi' => 'Abdomen Tumor Konsistensi',
            'abdomen_tumor_pergerakan' => 'Abdomen Tumor Pergerakan',
            'abdomen_tumor_ukuran' => 'Abdomen Tumor Ukuran',
            'abdomen_tekan_regio' => 'Abdomen Tekan Regio',
            'abdomen_palpasi_ascites' => 'Abdomen Palpasi Ascites',
            'abdomen_palpasi_hati' => 'Abdomen Palpasi Hati',
            'palpasi_hati_derajat' => 'Palpasi Hati Derajat',
            'palpasi_hati_permukaan' => 'Palpasi Hati Permukaan',
            'palpasi_hati_konsistensi' => 'Palpasi Hati Konsistensi',
            'palpasi_hati_tepi' => 'Palpasi Hati Tepi',
            'abdomen_palpasi_limpa' => 'Abdomen Palpasi Limpa',
            'palpasi_limpa_derajat' => 'Palpasi Limpa Derajat',
            'palpasi_limpa_permukaan' => 'Palpasi Limpa Permukaan',
            'palpasi_limpa_konsistensi' => 'Palpasi Limpa Konsistensi',
            'palpasi_limpa_tepi' => 'Palpasi Limpa Tepi',
            'abdomen_palpasi_ginjal' => 'Abdomen Palpasi Ginjal',
            'abdomen_perkusi_abdomen' => 'Abdomen Perkusi Abdomen',
            'abdomen_perkusi_ascites' => 'Abdomen Perkusi Ascites',
            'abdomen_ausleo2_pil' => 'Abdomen Ausleo2 Pil',
            'auskultasi_leopoldii_denyut' => 'Auskultasi Leopoldii Denyut',
            'auskultasi_leopoldii_irama' => 'Auskultasi Leopoldii Irama',
            'abdomen_ausperista_pil' => 'Abdomen Ausperista Pil',
            'abdomen_auskultasi_peristaltik' => 'Abdomen Auskultasi Peristaltik',
            'abdomen_auskultasi_bising' => 'Abdomen Auskultasi Bising',
            'evaluasi_genitalia_pil' => 'Evaluasi Genitalia Pil',
            'evaluasi_genitalia' => 'Evaluasi Genitalia',
            'genetalia_inspeksi_kulit' => 'Genetalia Inspeksi Kulit',
            'genetalia_inspeksi_penis' => 'Genetalia Inspeksi Penis',
            'genetalia_inspeksi_scrotum' => 'Genetalia Inspeksi Scrotum',
            'genetalia_inspeksi_vagina' => 'Genetalia Inspeksi Vagina',
            'inspeksi_vagina_cairan' => 'Inspeksi Vagina Cairan',
            'genetalia_inspeksi_anus' => 'Genetalia Inspeksi Anus',
            'genetalia_palpasi_kulit' => 'Genetalia Palpasi Kulit',
            'genetalia_palpasi_penis' => 'Genetalia Palpasi Penis',
            'genetalia_palpasi_scrotum' => 'Genetalia Palpasi Scrotum',
            'genetalia_palpasi_vagina' => 'Genetalia Palpasi Vagina',
            'genetalia_palpasi_anus' => 'Genetalia Palpasi Anus',
            'evaluasi_ekstrimitas_pil' => 'Evaluasi Ekstrimitas Pil',
            'evaluasi_ekstrimitas' => 'Evaluasi Ekstrimitas',
            'ekstrimitas_atas_pil' => 'Ekstrimitas Atas Pil',
            'ekstrimitas_atas' => 'Ekstrimitas Atas',
            'atas_inspeksi_bahu' => 'Atas Inspeksi Bahu',
            'atas_inspeksi_siku' => 'Atas Inspeksi Siku',
            'atas_inspeksi_pergelangan' => 'Atas Inspeksi Pergelangan',
            'atas_inspeksi_kuku' => 'Atas Inspeksi Kuku',
            'atas_inspkuku_warna' => 'Atas Inspkuku Warna',
            'atas_inspkuku_bentuk' => 'Atas Inspkuku Bentuk',
            'atas_inspkuku_lesi' => 'Atas Inspkuku Lesi',
            'atas_palpasi_bahu' => 'Atas Palpasi Bahu',
            'atas_palpasi_siku' => 'Atas Palpasi Siku',
            'atas_palpasi_pergelangan' => 'Atas Palpasi Pergelangan',
            'atas_palpasi_kuku' => 'Atas Palpasi Kuku',
            'ekstrimitas_bawah_pil' => 'Ekstrimitas Bawah Pil',
            'ekstrimitas_bawah' => 'Ekstrimitas Bawah',
            'bawah_inspeksi_pinggul' => 'Bawah Inspeksi Pinggul',
            'bawah_inspeksi_lutut' => 'Bawah Inspeksi Lutut',
            'bawah_inspeksi_pergelangan' => 'Bawah Inspeksi Pergelangan',
            'bawah_inspeksi_kuku' => 'Bawah Inspeksi Kuku',
            'bawah_inspkuku_warna' => 'Bawah Inspkuku Warna',
            'bawah_inspkuku_bentuk' => 'Bawah Inspkuku Bentuk',
            'bawah_inspkuku_lesi' => 'Bawah Inspkuku Lesi',
            'bawah_palpasi_pinggul' => 'Bawah Palpasi Pinggul',
            'bawah_palpasi_lutut' => 'Bawah Palpasi Lutut',
            'bawah_palpasi_pergelangan' => 'Bawah Palpasi Pergelangan',
            'bawah_palpasi_kuku' => 'Bawah Palpasi Kuku',
            'ekstrimitas_refleks_pil' => 'Ekstrimitas Refleks Pil',
            'refleks_biceps_pil' => 'Refleks Biceps Pil',
            'refleks_biceps' => 'Refleks Biceps',
            'refleks_triceps_pil' => 'Refleks Triceps Pil',
            'refleks_triceps' => 'Refleks Triceps',
            'refleks_achilles_pil' => 'Refleks Achilles Pil',
            'refleks_achilles' => 'Refleks Achilles',
            'refleks_knee_pil' => 'Refleks Knee Pil',
            'refleks_knee' => 'Refleks Knee',
            'refleks_babynsky_pil' => 'Refleks Babynsky Pil',
            'refleks_babynsky' => 'Refleks Babynsky',
            'refleks_babynskyi_pil' => 'Refleks Babynskyi Pil',
            'refleks_babynskyi' => 'Refleks Babynskyi',
            'refleks_babynskyii_pil' => 'Refleks Babynskyii Pil',
            'refleks_babynskyii' => 'Refleks Babynskyii',
            'refleks_kernig_pil' => 'Refleks Kernig Pil',
            'refleks_kernig' => 'Refleks Kernig',
            'refleks_laseque_pil' => 'Refleks Laseque Pil',
            'refleks_laseque' => 'Refleks Laseque',
            'refleks_menghisap_pil' => 'Refleks Menghisap Pil',
            'refleks_menghisap' => 'Refleks Menghisap',
            'refleks_menggenggam_pil' => 'Refleks Menggenggam Pil',
            'refleks_menggenggam' => 'Refleks Menggenggam',
            'refleks_moro_pil' => 'Refleks Moro Pil',
            'refleks_moro' => 'Refleks Moro',
            'refleks_mencari_pil' => 'Refleks Mencari Pil',
            'refleks_mencari' => 'Refleks Mencari',
            'refleks_leher_pil' => 'Refleks Leher Pil',
            'refleks_leher' => 'Refleks Leher',
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getOptions()
{ 
   return array(
      'Tidak tampak sakit',
      'Sakit ringan',
      'Sakit sedang',
      'Sakit berat',
   );
}
}

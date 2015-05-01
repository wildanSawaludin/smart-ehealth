<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "saran_anjuran".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property integer $obat_obatan_pil
 * @property integer $rawat_inap_pil
 * @property integer $bedah_operasi_pil
 * @property integer $kemoterapi_pil
 * @property integer $fisioterapi_pil
 * @property integer $laboratorium_pil
 * @property integer $kp_hematologi_pil
 * @property string $kp_hematologi_lengkap
 * @property string $kp_hematologi_anemia
 * @property string $kp_hematologi_faal
 * @property string $kp_hematologi_lain
 * @property integer $kp_molekuler_pil
 * @property string $kp_molekuler
 * @property integer $kp_kimdar_pil
 * @property integer $kimdar_hati_pil
 * @property string $kimdar_hati
 * @property integer $kimdar_diabetes_pil
 * @property string $kimdar_diabetes
 * @property integer $kimdar_lemak_pil
 * @property string $kimdar_lemak
 * @property integer $kimdar_jantung_pil
 * @property string $kimdar_jantung
 * @property integer $kimdar_sepsis_pil
 * @property string $kimdar_sepsis
 * @property integer $kimdar_ginhip_pil
 * @property string $kimdar_ginjal_hipertensi
 * @property integer $kimdar_egd_pil
 * @property string $kimdar_egd
 * @property integer $kimdar_antioksidan_pil
 * @property string $kimdar_antioksidan
 * @property integer $kimdar_protein_pil
 * @property string $kimdar_protein
 * @property string $kimdar_protein_electropharesis
 * @property integer $kimdar_kimlain_pil
 * @property string $kimdar_kimia_lain
 * @property integer $kp_Imunoserologi_pil
 * @property integer $imun_hepatitis_pil
 * @property string $imun_hepatitis
 * @property integer $imun_torch_pil
 * @property string $imun_torch
 * @property integer $imun_lemak_pil
 * @property string $imun_lemak
 * @property integer $imun_inflain_pil
 * @property string $imun_infeksi_lain
 * @property integer $imun_rematik_pil
 * @property string $imun_rematik
 * @property integer $imun_pms_pil
 * @property string $imun_pms
 * @property integer $kp_urinalisa_pil
 * @property string $kp_urinalisa
 * @property integer $kp_analfes_pil
 * @property string $kp_analisa_feses
 * @property integer $kp_endokrinologi_pil
 * @property integer $endokrin_tiroid_pil
 * @property string $endokrin_tiroid
 * @property integer $endokrin_repges_pil
 * @property string $endokrin_reproduksi_gestasi
 * @property integer $endokrin_horlain_pil
 * @property string $endokrin_hormon_lain
 * @property integer $kp_alergi_pil
 * @property integer $alergi_eosinofil_pil
 * @property integer $alergi_total_pil
 * @property integer $alergi_spesifik_pil
 * @property string $alergi_ige_spesifik
 * @property integer $alergi_atopy_pil
 * @property integer $kp_mikrobiologi_pil
 * @property integer $mikrobiologi_resistensi_pil
 * @property string $mikrobiologi_kultur_resistensi
 * @property integer $mikrobiologi_candida_pil
 * @property integer $mikrobiologi_mikroskopik_pil
 * @property string $mikrobiologi_mikroskopik
 * @property integer $kp_tuberkulosis_pil
 * @property string $kp_tuberkulosis
 * @property integer $kp_csf_pil
 * @property string $kp_analisa_csf
 * @property integer $kp_tumor_pil
 * @property string $kp_penanda_tumor
 * @property integer $kp_lain_pil
 * @property integer $lain_analsper_pil
 * @property integer $lain_antisper_pil
 * @property integer $lain_abg_pil
 * @property integer $lain_abe_pil
 * @property integer $lain_hlaabc_pil
 * @property integer $lain_hladr_pil
 * @property integer $lain_papsmear_pil
 * @property integer $lain_ssbc_pil
 * @property string $lain_ssbc
 * @property integer $lain_ubt_pil
 * @property integer $tp_anemia_pil
 * @property integer $anemia_uji_pil
 * @property string $anemia_uji_saring
 * @property integer $anemia_defisiensi_pil
 * @property string $anemia_defisiensi
 * @property integer $anemia_hemolitik_pil
 * @property string $anemia_hemolitik
 * @property integer $anemia_aplastika_pil
 * @property string $anemia_aplastika
 * @property integer $tp_checkup_pil
 * @property integer $checkup_standar_pil
 * @property string $checkup_standar
 * @property integer $checkup_plus_pil
 * @property string $checkup_plus
 * @property integer $checkup_prakarya_pil
 * @property string $checkup_pra_karyawan
 * @property integer $checkup_premarital_pil
 * @property string $checkup_premarital
 * @property integer $tp_dnppenyakit_pil
 * @property integer $dnppenyakit_dm_pil
 * @property string $dnppenyakit_dm
 * @property integer $dnppenyakit_lemak_pil
 * @property string $dnppenyakit_lemak
 * @property integer $dnppenyakit_jankor_pil
 * @property string $dnppenyakit_jantung_koroner
 * @property integer $dnppenyakit_torch_pil
 * @property string $dnppenyakit_torch
 * @property integer $dnppenyakit_pms_pil
 * @property string $dnppenyakit_pms
 * @property integer $dnppenyakit_tandem_pil
 * @property string $dnppenyakit_tanda_demam
 * @property integer $dnppenyakit_tiroid_pil
 * @property string $dnppenyakit_tiroid
 * @property integer $dnppenyakit_osteoporosis_pil
 * @property string $dnppenyakit_osteoporosis
 * @property integer $tp_hepatitisb_pil
 * @property integer $hepatitisb_dnp_pil
 * @property string $hepatitisb_dnp
 * @property integer $hepatitisb_ujisaring_pil
 * @property string $hepatitisb_uji_saring
 * @property integer $tp_hipertensi_pil
 * @property integer $hipertensi_pemereva_pil
 * @property string $hipertensi_pemeriksaan_evaluasi
 * @property integer $hipertensi_pengelolaan_pil
 * @property string $hipertensi_pengelolaan
 * @property integer $tp_risiko_pil
 * @property integer $risiko_genetik_pil
 * @property string $risiko_genetik
 * @property integer $risiko_dapatan_pil
 * @property string $risiko_dapatan
 * @property integer $tp_reproduksi_pil
 * @property integer $reproduksi_amenorhoe_pil
 * @property string $reproduksi_amenorhoe
 * @property integer $reproduksi_kesuburan_pil
 * @property string $reproduksi_kesuburan_pria
 * @property integer $reproduksi-tumova_pil
 * @property string $reproduksi-tumor_ovarium
 * @property integer $reproduksi-tumser_pil
 * @property string $reproduksi-tumor_servik
 * @property integer $reproduksi-tumpros_pil
 * @property string $reproduksi-tumor_prostat
 * @property integer $reproduksi_kehamilan_pil
 * @property string $reproduksi_awal_kehamilan
 * @property integer $tp_tumor_pil
 * @property integer $tumor_colorectal_pil
 * @property string $tumor_colorectal
 * @property integer $tumor_hati_pil
 * @property string $tumor_hati
 * @property integer $tumor_lambung_pil
 * @property string $tumor_lambung
 * @property integer $tumor_pankreas_pil
 * @property string $tumor_pankreas
 * @property integer $tumor_tiroid_pil
 * @property string $tumor_tiroid
 * @property integer $tumor_ovarium_pil
 * @property string $tumor_ovarium
 * @property integer $tumor_servik_pil
 * @property string $tumor_servik
 * @property integer $tumor_payudara_pil
 * @property string $tumor_payudara
 * @property integer $tumor_prostat_pil
 * @property string $tumor_prostat
 * @property integer $tumor_paru_pil
 * @property string $tumor_paru
 * @property integer $tumor_nasopharing_pil
 * @property string $tumor_nasopharing
 * @property integer $tp_uji_pil
 * @property integer $uji_anemia_pil
 * @property string $uji_saring_anemia
 * @property integer $uji_thalasemia_pil
 * @property string $uji_saring_thalasemia
 * @property integer $uji_faal_pil
 * @property string $uji_saring_faal
 * @property integer $uji_rheumatik_pil
 * @property string $uji_saring_rheumatik
 * @property integer $uji_tumor_pil
 * @property string $uji_saring_tumor
 * @property integer $uji_alergi_pil
 * @property string $uji_saring_alergi
 * @property integer $uji_neonatus_pil
 * @property string $uji_saring_neonatus
 * @property integer $mk_cesereb_pil
 * @property string $mk_cedera_serebrovaskuler
 * @property integer $mk_kolesistitis_pil
 * @property string $mk_kolesistitis
 * @property integer $mk_sirosis_pil
 * @property string $mk_sirosis_hati
 * @property integer $mk_galjan_pil
 * @property string $mk_gagal_jantung
 * @property integer $mk_throbven_pil
 * @property string $mk_throbplebitis_vena
 * @property integer $mk_emfisema_pil
 * @property string $mk_emfisema
 * @property integer $mk_kanpar_pil
 * @property string $mk_kanker_paru
 * @property integer $mk_skleromul_pil
 * @property string $mk_sklerosis_multipel
 * @property integer $mk_ami_pil
 * @property string $mk_ami
 * @property integer $mk_osteoporosis_pil
 * @property string $mk_osteoporosis
 * @property integer $mk_pankreatitis_pil
 * @property string $mk_pankreatitis
 * @property integer $mk_ulpep_pil
 * @property string $mk_ulkus_peptikum
 * @property integer $mk_pneumonia_pil
 * @property string $mk_pneumonia
 * @property integer $mk_galgin_pil
 * @property string $mk_gagal_ginjal
 * @property integer $mk_arthreu_pil
 * @property string $mk_arthritis_rheumatoid
 * @property integer $mk_sle_pil
 * @property string $mk_sle
 * @property integer $non_laboratorium_pil
 * @property integer $nonlab_radiologi_pil
 * @property integer $radiologi_ctscan_pil
 * @property string $radiologi_ct_scan
 * @property integer $radiologi_usg_pil
 * @property string $radiologi_usg
 * @property integer $radiologi_mri_pil
 * @property string $radiologi_mri
 * @property integer $radiologi_xray_pil
 * @property string $radiologi_xray
 * @property integer $radiologi_lain_pil
 * @property string $radiologi_lain_lain
 * @property integer $nonlab_ekg_pil
 * @property integer $nonlab_treadmill_pil
 * @property integer $nonlab_echocardiography_pil
 * @property integer $konsultasi_dokter_pil
 * @property integer $periksa_ulang_pil
 * @property integer $periksa_ulang_setelah
 * @property string $periksa_ulang_waktu
 * @property string $catatan
 *
 * @property Registrasi $registrasi
 */
class SaranAnjuran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'saran_anjuran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id'], 'required'],
            [['registrasi_id', 'obat_obatan_pil', 'rawat_inap_pil', 'bedah_operasi_pil', 'kemoterapi_pil', 'fisioterapi_pil', 'laboratorium_pil', 'kp_hematologi_pil', 'kp_molekuler_pil', 'kp_kimdar_pil', 'kimdar_hati_pil', 'kimdar_diabetes_pil', 'kimdar_lemak_pil', 'kimdar_jantung_pil', 'kimdar_sepsis_pil', 'kimdar_ginhip_pil', 'kimdar_egd_pil', 'kimdar_antioksidan_pil', 'kimdar_protein_pil', 'kimdar_kimlain_pil', 'kp_Imunoserologi_pil', 'imun_hepatitis_pil', 'imun_torch_pil', 'imun_lemak_pil', 'imun_inflain_pil', 'imun_rematik_pil', 'imun_pms_pil', 'kp_urinalisa_pil', 'kp_analfes_pil', 'kp_endokrinologi_pil', 'endokrin_tiroid_pil', 'endokrin_repges_pil', 'endokrin_horlain_pil', 'kp_alergi_pil', 'alergi_eosinofil_pil', 'alergi_total_pil', 'alergi_spesifik_pil', 'alergi_atopy_pil', 'kp_mikrobiologi_pil', 'mikrobiologi_resistensi_pil', 'mikrobiologi_candida_pil', 'mikrobiologi_mikroskopik_pil', 'kp_tuberkulosis_pil', 'kp_csf_pil', 'kp_tumor_pil', 'kp_lain_pil', 'lain_analsper_pil', 'lain_antisper_pil', 'lain_abg_pil', 'lain_abe_pil', 'lain_hlaabc_pil', 'lain_hladr_pil', 'lain_papsmear_pil', 'lain_ssbc_pil', 'lain_ubt_pil', 'tp_anemia_pil', 'anemia_uji_pil', 'anemia_defisiensi_pil', 'anemia_hemolitik_pil', 'anemia_aplastika_pil', 'tp_checkup_pil', 'checkup_standar_pil', 'checkup_plus_pil', 'checkup_prakarya_pil', 'checkup_premarital_pil', 'tp_dnppenyakit_pil', 'dnppenyakit_dm_pil', 'dnppenyakit_lemak_pil', 'dnppenyakit_jankor_pil', 'dnppenyakit_torch_pil', 'dnppenyakit_pms_pil', 'dnppenyakit_tandem_pil', 'dnppenyakit_tiroid_pil', 'dnppenyakit_osteoporosis_pil', 'tp_hepatitisb_pil', 'hepatitisb_dnp_pil', 'hepatitisb_ujisaring_pil', 'tp_hipertensi_pil', 'hipertensi_pemereva_pil', 'hipertensi_pengelolaan_pil', 'tp_risiko_pil', 'risiko_genetik_pil', 'risiko_dapatan_pil', 'tp_reproduksi_pil', 'reproduksi_amenorhoe_pil', 'reproduksi_kesuburan_pil', 'reproduksi-tumova_pil', 'reproduksi-tumser_pil', 'reproduksi-tumpros_pil', 'reproduksi_kehamilan_pil', 'tp_tumor_pil', 'tumor_colorectal_pil', 'tumor_hati_pil', 'tumor_lambung_pil', 'tumor_pankreas_pil', 'tumor_tiroid_pil', 'tumor_ovarium_pil', 'tumor_servik_pil', 'tumor_payudara_pil', 'tumor_prostat_pil', 'tumor_paru_pil', 'tumor_nasopharing_pil', 'tp_uji_pil', 'uji_anemia_pil', 'uji_thalasemia_pil', 'uji_faal_pil', 'uji_rheumatik_pil', 'uji_tumor_pil', 'uji_alergi_pil', 'uji_neonatus_pil', 'mk_cesereb_pil', 'mk_kolesistitis_pil', 'mk_sirosis_pil', 'mk_galjan_pil', 'mk_throbven_pil', 'mk_emfisema_pil', 'mk_kanpar_pil', 'mk_skleromul_pil', 'mk_ami_pil', 'mk_osteoporosis_pil', 'mk_pankreatitis_pil', 'mk_ulpep_pil', 'mk_pneumonia_pil', 'mk_galgin_pil', 'mk_arthreu_pil', 'mk_sle_pil', 'non_laboratorium_pil', 'nonlab_radiologi_pil', 'radiologi_ctscan_pil', 'radiologi_usg_pil', 'radiologi_mri_pil', 'radiologi_xray_pil', 'radiologi_lain_pil', 'nonlab_ekg_pil', 'nonlab_treadmill_pil', 'nonlab_echocardiography_pil', 'konsultasi_dokter_pil', 'periksa_ulang_pil', 'periksa_ulang_setelah'], 'integer'],
            [['periksa_ulang_waktu', 'catatan'], 'string'],
            [['kp_hematologi_lengkap', 'kimdar_protein_electropharesis', 'kimdar_kimia_lain', 'imun_pms', 'kp_urinalisa', 'kp_analisa_feses', 'endokrin_tiroid', 'endokrin_hormon_lain', 'mikrobiologi_mikroskopik', 'kp_tuberkulosis', 'kp_analisa_csf', 'anemia_uji_saring', 'anemia_defisiensi', 'anemia_aplastika', 'dnppenyakit_lemak', 'dnppenyakit_pms', 'dnppenyakit_tanda_demam', 'risiko_genetik', 'risiko_dapatan', 'reproduksi_kesuburan_pria', 'uji_saring_anemia', 'uji_saring_thalasemia', 'uji_saring_faal', 'uji_saring_rheumatik', 'uji_saring_tumor', 'uji_saring_neonatus', 'mk_cedera_serebrovaskuler', 'mk_kolesistitis', 'mk_gagal_jantung', 'mk_osteoporosis', 'mk_pankreatitis', 'mk_ulkus_peptikum', 'mk_pneumonia', 'mk_gagal_ginjal', 'mk_arthritis_rheumatoid', 'mk_sle', 'radiologi_ct_scan', 'radiologi_usg', 'radiologi_mri', 'radiologi_xray', 'radiologi_lain_lain'], 'string', 'max' => 100],
            [['kp_hematologi_anemia', 'kimdar_hati', 'kimdar_lemak', 'kp_penanda_tumor', 'anemia_hemolitik', 'checkup_pra_karyawan', 'dnppenyakit_jantung_koroner', 'dnppenyakit_torch', 'hipertensi_pengelolaan', 'mk_sirosis_hati'], 'string', 'max' => 150],
            [['kp_hematologi_faal', 'imun_hepatitis', 'checkup_standar', 'reproduksi_awal_kehamilan'], 'string', 'max' => 250],
            [['kp_hematologi_lain', 'kimdar_diabetes', 'kimdar_jantung', 'kimdar_protein', 'imun_torch', 'imun_lemak', 'imun_rematik', 'endokrin_reproduksi_gestasi', 'checkup_premarital', 'dnppenyakit_dm', 'hipertensi_pemeriksaan_evaluasi', 'mk_ami'], 'string', 'max' => 200],
            [['kp_molekuler', 'kimdar_ginjal_hipertensi', 'kimdar_egd', 'kimdar_antioksidan', 'imun_infeksi_lain', 'alergi_ige_spesifik', 'checkup_plus'], 'string', 'max' => 300],
            [['kimdar_sepsis'], 'string', 'max' => 20],
            [['mikrobiologi_kultur_resistensi', 'lain_ssbc', 'dnppenyakit_tiroid', 'dnppenyakit_osteoporosis', 'hepatitisb_dnp', 'hepatitisb_uji_saring', 'reproduksi_amenorhoe', 'reproduksi-tumor_ovarium', 'reproduksi-tumor_servik', 'reproduksi-tumor_prostat', 'tumor_colorectal', 'tumor_hati', 'tumor_lambung', 'tumor_pankreas', 'tumor_tiroid', 'tumor_ovarium', 'tumor_servik', 'tumor_payudara', 'tumor_prostat', 'tumor_paru', 'tumor_nasopharing', 'uji_saring_alergi', 'mk_throbplebitis_vena', 'mk_emfisema', 'mk_kanker_paru', 'mk_sklerosis_multipel'], 'string', 'max' => 50]
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
            'obat_obatan_pil' => 'Obat Obatan Pil',
            'rawat_inap_pil' => 'Rawat Inap Pil',
            'bedah_operasi_pil' => 'Bedah Operasi Pil',
            'kemoterapi_pil' => 'Kemoterapi Pil',
            'fisioterapi_pil' => 'Fisioterapi Pil',
            'laboratorium_pil' => 'Laboratorium Pil',
            'kp_hematologi_pil' => 'Kp Hematologi Pil',
            'kp_hematologi_lengkap' => 'Kp Hematologi Lengkap',
            'kp_hematologi_anemia' => 'Kp Hematologi Anemia',
            'kp_hematologi_faal' => 'Kp Hematologi Faal',
            'kp_hematologi_lain' => 'Kp Hematologi Lain',
            'kp_molekuler_pil' => 'Kp Molekuler Pil',
            'kp_molekuler' => 'Kp Molekuler',
            'kp_kimdar_pil' => 'Kp Kimdar Pil',
            'kimdar_hati_pil' => 'Kimdar Hati Pil',
            'kimdar_hati' => 'Kimdar Hati',
            'kimdar_diabetes_pil' => 'Kimdar Diabetes Pil',
            'kimdar_diabetes' => 'Kimdar Diabetes',
            'kimdar_lemak_pil' => 'Kimdar Lemak Pil',
            'kimdar_lemak' => 'Kimdar Lemak',
            'kimdar_jantung_pil' => 'Kimdar Jantung Pil',
            'kimdar_jantung' => 'Kimdar Jantung',
            'kimdar_sepsis_pil' => 'Kimdar Sepsis Pil',
            'kimdar_sepsis' => 'Kimdar Sepsis',
            'kimdar_ginhip_pil' => 'Kimdar Ginhip Pil',
            'kimdar_ginjal_hipertensi' => 'Kimdar Ginjal Hipertensi',
            'kimdar_egd_pil' => 'Kimdar Egd Pil',
            'kimdar_egd' => 'Kimdar Egd',
            'kimdar_antioksidan_pil' => 'Kimdar Antioksidan Pil',
            'kimdar_antioksidan' => 'Kimdar Antioksidan',
            'kimdar_protein_pil' => 'Kimdar Protein Pil',
            'kimdar_protein' => 'Kimdar Protein',
            'kimdar_protein_electropharesis' => 'Kimdar Protein Electropharesis',
            'kimdar_kimlain_pil' => 'Kimdar Kimlain Pil',
            'kimdar_kimia_lain' => 'Kimdar Kimia Lain',
            'kp_Imunoserologi_pil' => 'Kp  Imunoserologi Pil',
            'imun_hepatitis_pil' => 'Imun Hepatitis Pil',
            'imun_hepatitis' => 'Imun Hepatitis',
            'imun_torch_pil' => 'Imun Torch Pil',
            'imun_torch' => 'Imun Torch',
            'imun_lemak_pil' => 'Imun Lemak Pil',
            'imun_lemak' => 'Imun Lemak',
            'imun_inflain_pil' => 'Imun Inflain Pil',
            'imun_infeksi_lain' => 'Imun Infeksi Lain',
            'imun_rematik_pil' => 'Imun Rematik Pil',
            'imun_rematik' => 'Imun Rematik',
            'imun_pms_pil' => 'Imun Pms Pil',
            'imun_pms' => 'Imun Pms',
            'kp_urinalisa_pil' => 'Kp Urinalisa Pil',
            'kp_urinalisa' => 'Kp Urinalisa',
            'kp_analfes_pil' => 'Kp Analfes Pil',
            'kp_analisa_feses' => 'Kp Analisa Feses',
            'kp_endokrinologi_pil' => 'Kp Endokrinologi Pil',
            'endokrin_tiroid_pil' => 'Endokrin Tiroid Pil',
            'endokrin_tiroid' => 'Endokrin Tiroid',
            'endokrin_repges_pil' => 'Endokrin Repges Pil',
            'endokrin_reproduksi_gestasi' => 'Endokrin Reproduksi Gestasi',
            'endokrin_horlain_pil' => 'Endokrin Horlain Pil',
            'endokrin_hormon_lain' => 'Endokrin Hormon Lain',
            'kp_alergi_pil' => 'Kp Alergi Pil',
            'alergi_eosinofil_pil' => 'Eosinofil Absolut',
            'alergi_total_pil' => 'Ige Total',
            'alergi_spesifik_pil' => 'Ige Spesifik',
            'alergi_ige_spesifik' => 'Alergi Ige Spesifik',
            'alergi_atopy_pil' => 'Ige Atopy',
            'kp_mikrobiologi_pil' => 'Kp Mikrobiologi Pil',
            'mikrobiologi_resistensi_pil' => 'Mikrobiologi Resistensi Pil',
            'mikrobiologi_kultur_resistensi' => 'Mikrobiologi Kultur Resistensi',
            'mikrobiologi_candida_pil' => 'Mikrobiologi Candida Pil',
            'mikrobiologi_mikroskopik_pil' => 'Mikrobiologi Mikroskopik Pil',
            'mikrobiologi_mikroskopik' => 'Mikrobiologi Mikroskopik',
            'kp_tuberkulosis_pil' => 'Kp Tuberkulosis Pil',
            'kp_tuberkulosis' => 'Kp Tuberkulosis',
            'kp_csf_pil' => 'Kp Csf Pil',
            'kp_analisa_csf' => 'Kp Analisa Csf',
            'kp_tumor_pil' => 'Kp Tumor Pil',
            'kp_penanda_tumor' => 'Kp Penanda Tumor',
            'kp_lain_pil' => 'Kp Lain Pil',
            'lain_analsper_pil' => 'Lain Analsper Pil',
            'lain_antisper_pil' => 'Lain Antisper Pil',
            'lain_abg_pil' => 'Lain Abg Pil',
            'lain_abe_pil' => 'Lain Abe Pil',
            'lain_hlaabc_pil' => 'Lain Hlaabc Pil',
            'lain_hladr_pil' => 'Lain Hladr Pil',
            'lain_papsmear_pil' => 'Lain Papsmear Pil',
            'lain_ssbc_pil' => 'Lain Ssbc Pil',
            'lain_ssbc' => 'Lain Ssbc',
            'lain_ubt_pil' => 'Lain Ubt Pil',
            'tp_anemia_pil' => 'Anemia',
            'anemia_uji_pil' => 'Anemia Uji Pil',
            'anemia_uji_saring' => 'Anemia Uji Saring',
            'anemia_defisiensi_pil' => 'Anemia Defisiensi Pil',
            'anemia_defisiensi' => 'Anemia Defisiensi',
            'anemia_hemolitik_pil' => 'Anemia Hemolitik Pil',
            'anemia_hemolitik' => 'Anemia Hemolitik',
            'anemia_aplastika_pil' => 'Anemia Aplastika Pil',
            'anemia_aplastika' => 'Anemia Aplastika',
            'tp_checkup_pil' => 'Check Up',
            'checkup_standar_pil' => 'Checkup Standar Pil',
            'checkup_standar' => 'Checkup Standar',
            'checkup_plus_pil' => 'Checkup Plus Pil',
            'checkup_plus' => 'Checkup Plus',
            'checkup_prakarya_pil' => 'Checkup Prakarya Pil',
            'checkup_pra_karyawan' => 'Checkup Pra Karyawan',
            'checkup_premarital_pil' => 'Checkup Premarital Pil',
            'checkup_premarital' => 'Checkup Premarital',
            'tp_dnppenyakit_pil' => 'Diagnosa & Prognosis Penyakit',
            'dnppenyakit_dm_pil' => 'Dnppenyakit Dm Pil',
            'dnppenyakit_dm' => 'Dnppenyakit Dm',
            'dnppenyakit_lemak_pil' => 'Dnppenyakit Lemak Pil',
            'dnppenyakit_lemak' => 'Dnppenyakit Lemak',
            'dnppenyakit_jankor_pil' => 'Dnppenyakit Jankor Pil',
            'dnppenyakit_jantung_koroner' => 'Dnppenyakit Jantung Koroner',
            'dnppenyakit_torch_pil' => 'Dnppenyakit Torch Pil',
            'dnppenyakit_torch' => 'Dnppenyakit Torch',
            'dnppenyakit_pms_pil' => 'Dnppenyakit Pms Pil',
            'dnppenyakit_pms' => 'Dnppenyakit Pms',
            'dnppenyakit_tandem_pil' => 'Dnppenyakit Tandem Pil',
            'dnppenyakit_tanda_demam' => 'Dnppenyakit Tanda Demam',
            'dnppenyakit_tiroid_pil' => 'Dnppenyakit Tiroid Pil',
            'dnppenyakit_tiroid' => 'Dnppenyakit Tiroid',
            'dnppenyakit_osteoporosis_pil' => 'Dnppenyakit Osteoporosis Pil',
            'dnppenyakit_osteoporosis' => 'Dnppenyakit Osteoporosis',
            'tp_hepatitisb_pil' => 'Hepatitis B',
            'hepatitisb_dnp_pil' => 'Hepatitisb Dnp Pil',
            'hepatitisb_dnp' => 'Hepatitisb Dnp',
            'hepatitisb_ujisaring_pil' => 'Hepatitisb Ujisaring Pil',
            'hepatitisb_uji_saring' => 'Hepatitisb Uji Saring',
            'tp_hipertensi_pil' => 'Hipertensi',
            'hipertensi_pemereva_pil' => 'Hipertensi Pemereva Pil',
            'hipertensi_pemeriksaan_evaluasi' => 'Hipertensi Pemeriksaan Evaluasi',
            'hipertensi_pengelolaan_pil' => 'Hipertensi Pengelolaan Pil',
            'hipertensi_pengelolaan' => 'Hipertensi Pengelolaan',
            'tp_risiko_pil' => 'Risiko Trombosis',
            'risiko_genetik_pil' => 'Risiko Genetik Pil',
            'risiko_genetik' => 'Risiko Genetik',
            'risiko_dapatan_pil' => 'Risiko Dapatan Pil',
            'risiko_dapatan' => 'Risiko Dapatan',
            'tp_reproduksi_pil' => 'Sistem Reproduksi',
            'reproduksi_amenorhoe_pil' => 'Reproduksi Amenorhoe Pil',
            'reproduksi_amenorhoe' => 'Reproduksi Amenorhoe',
            'reproduksi_kesuburan_pil' => 'Reproduksi Kesuburan Pil',
            'reproduksi_kesuburan_pria' => 'Reproduksi Kesuburan Pria',
            'reproduksi-tumova_pil' => 'Reproduksi Tumova Pil',
            'reproduksi-tumor_ovarium' => 'Reproduksi Tumor Ovarium',
            'reproduksi-tumser_pil' => 'Reproduksi Tumser Pil',
            'reproduksi-tumor_servik' => 'Reproduksi Tumor Servik',
            'reproduksi-tumpros_pil' => 'Reproduksi Tumpros Pil',
            'reproduksi-tumor_prostat' => 'Reproduksi Tumor Prostat',
            'reproduksi_kehamilan_pil' => 'Reproduksi Kehamilan Pil',
            'reproduksi_awal_kehamilan' => 'Reproduksi Awal Kehamilan',
            'tp_tumor_pil' => 'Tumor',
            'tumor_colorectal_pil' => 'Tumor Colorectal Pil',
            'tumor_colorectal' => 'Tumor Colorectal',
            'tumor_hati_pil' => 'Tumor Hati Pil',
            'tumor_hati' => 'Tumor Hati',
            'tumor_lambung_pil' => 'Tumor Lambung Pil',
            'tumor_lambung' => 'Tumor Lambung',
            'tumor_pankreas_pil' => 'Tumor Pankreas Pil',
            'tumor_pankreas' => 'Tumor Pankreas',
            'tumor_tiroid_pil' => 'Tumor Tiroid Pil',
            'tumor_tiroid' => 'Tumor Tiroid',
            'tumor_ovarium_pil' => 'Tumor Ovarium Pil',
            'tumor_ovarium' => 'Tumor Ovarium',
            'tumor_servik_pil' => 'Tumor Servik Pil',
            'tumor_servik' => 'Tumor Servik',
            'tumor_payudara_pil' => 'Tumor Payudara Pil',
            'tumor_payudara' => 'Tumor Payudara',
            'tumor_prostat_pil' => 'Tumor Prostat Pil',
            'tumor_prostat' => 'Tumor Prostat',
            'tumor_paru_pil' => 'Tumor Paru Pil',
            'tumor_paru' => 'Tumor Paru',
            'tumor_nasopharing_pil' => 'Tumor Nasopharing Pil',
            'tumor_nasopharing' => 'Tumor Nasopharing',
            'tp_uji_pil' => 'Uji Saring',
            'uji_anemia_pil' => 'Uji Anemia Pil',
            'uji_saring_anemia' => 'Uji Saring Anemia',
            'uji_thalasemia_pil' => 'Uji Thalasemia Pil',
            'uji_saring_thalasemia' => 'Uji Saring Thalasemia',
            'uji_faal_pil' => 'Uji Faal Pil',
            'uji_saring_faal' => 'Uji Saring Faal',
            'uji_rheumatik_pil' => 'Uji Rheumatik Pil',
            'uji_saring_rheumatik' => 'Uji Saring Rheumatik',
            'uji_tumor_pil' => 'Uji Tumor Pil',
            'uji_saring_tumor' => 'Uji Saring Tumor',
            'uji_alergi_pil' => 'Uji Alergi Pil',
            'uji_saring_alergi' => 'Uji Saring Alergi',
            'uji_neonatus_pil' => 'Uji Neonatus Pil',
            'uji_saring_neonatus' => 'Uji Saring Neonatus',
            'mk_cesereb_pil' => 'Cedera Serebrovaskuler',
            'mk_cedera_serebrovaskuler' => 'Cedera Serebrovaskuler',
            'mk_kolesistitis_pil' => 'Kolesistitis',
            'mk_kolesistitis' => 'Mk Kolesistitis',
            'mk_sirosis_pil' => 'Sirosis Hati',
            'mk_sirosis_hati' => 'Mk Sirosis Hati',
            'mk_galjan_pil' => 'Gagal Jantung Kongesti',
            'mk_gagal_jantung' => 'Mk Gagal Jantung',
            'mk_throbven_pil' => 'Throboplebitis Vena',
            'mk_throbplebitis_vena' => 'Mk Throbplebitis Vena',
            'mk_emfisema_pil' => 'Emfisema',
            'mk_emfisema' => 'Mk Emfisema',
            'mk_kanpar_pil' => 'Kanker Paru',
            'mk_kanker_paru' => 'Mk Kanker Paru',
            'mk_skleromul_pil' => 'Sklerosis Multipel',
            'mk_sklerosis_multipel' => 'Mk Sklerosis Multipel',
            'mk_ami_pil' => 'Infark Jantung Akut (AMI)',
            'mk_ami' => 'Mk Ami',
            'mk_osteoporosis_pil' => 'Osteoporosis',
            'mk_osteoporosis' => 'Mk Osteoporosis',
            'mk_pankreatitis_pil' => 'Pankreatitis',
            'mk_pankreatitis' => 'Mk Pankreatitis',
            'mk_ulpep_pil' => 'Ulkus Peptikum',
            'mk_ulkus_peptikum' => 'Mk Ulkus Peptikum',
            'mk_pneumonia_pil' => 'Pneumonia',
            'mk_pneumonia' => 'Mk Pneumonia',
            'mk_galgin_pil' => 'Gagal Ginjal',
            'mk_gagal_ginjal' => 'Mk Gagal Ginjal',
            'mk_arthreu_pil' => 'Arthritis Rheumatoid',
            'mk_arthritis_rheumatoid' => 'Mk Arthritis Rheumatoid',
            'mk_sle_pil' => 'Sle',
            'mk_sle' => 'Mk Sle',
            'non_laboratorium_pil' => 'Non Laboratorium Pil',
            'nonlab_radiologi_pil' => 'Nonlab Radiologi Pil',
            'radiologi_ctscan_pil' => 'CT-Scan',
            'radiologi_ct_scan' => 'Radiologi Ct Scan',
            'radiologi_usg_pil' => 'USG',
            'radiologi_usg' => 'Radiologi Usg',
            'radiologi_mri_pil' => 'MRI',
            'radiologi_mri' => 'Radiologi Mri',
            'radiologi_xray_pil' => 'X-Ray',
            'radiologi_xray' => 'Radiologi Xray',
            'radiologi_lain_pil' => 'Lain-lain',
            'radiologi_lain_lain' => 'Radiologi Lain Lain',
            'nonlab_ekg_pil' => 'Nonlab Ekg Pil',
            'nonlab_treadmill_pil' => 'Nonlab Treadmill Pil',
            'nonlab_echocardiography_pil' => 'Nonlab Echocardiography Pil',
            'konsultasi_dokter_pil' => 'Konsultasi Dokter Pil',
            'periksa_ulang_pil' => 'Periksa Ulang Pil',
            'periksa_ulang_setelah' => 'Periksa Ulang Setelah',
            'periksa_ulang_waktu' => 'Periksa Ulang Waktu',
            'catatan' => 'Catatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::className(), ['id' => 'registrasi_id']);
    }
}

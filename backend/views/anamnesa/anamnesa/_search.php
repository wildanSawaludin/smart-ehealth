<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AnamnesaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anamnesa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'registrasi_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'keluhan') ?>

    <?php // echo $form->field($model, 'keluhan_rincian') ?>

    <?php // echo $form->field($model, 'keluhan_lokasi') ?>

    <?php // echo $form->field($model, 'keluhan_lokasi_umum') ?>

    <?php // echo $form->field($model, 'keluhan_sub_lokasi') ?>

    <?php // echo $form->field($model, 'keluhan_berlangsung_nil') ?>

    <?php // echo $form->field($model, 'keluhan_berlangsung_lama') ?>

    <?php // echo $form->field($model, 'keluhan_faktor_pencetus') ?>

    <?php // echo $form->field($model, 'keluhan_durasi_nil') ?>

    <?php // echo $form->field($model, 'keluhan_durasi_lama') ?>

    <?php // echo $form->field($model, 'keluhan_durasi_jenis') ?>

    <?php // echo $form->field($model, 'keluhan_durasi_pereda') ?>

    <?php // echo $form->field($model, 'keluhan_durasi_pemberat') ?>

    <?php // echo $form->field($model, 'keluhan_menjalar_pil') ?>

    <?php // echo $form->field($model, 'keljalar_kepala_pil') ?>

    <?php // echo $form->field($model, 'keljalar_kepala') ?>

    <?php // echo $form->field($model, 'keljalar_wajah_pil') ?>

    <?php // echo $form->field($model, 'keljalar_wajah') ?>

    <?php // echo $form->field($model, 'keljalar_mata_pil') ?>

    <?php // echo $form->field($model, 'keljalar_mata') ?>

    <?php // echo $form->field($model, 'keljalar_hidung_pil') ?>

    <?php // echo $form->field($model, 'keljalar_mulut_pil') ?>

    <?php // echo $form->field($model, 'keljalar_mulut') ?>

    <?php // echo $form->field($model, 'keljalar_telinga_pil') ?>

    <?php // echo $form->field($model, 'keljalar_telinga') ?>

    <?php // echo $form->field($model, 'keljalar_leher_pil') ?>

    <?php // echo $form->field($model, 'keljalar_leher') ?>

    <?php // echo $form->field($model, 'keljalar_tenggorokan_pil') ?>

    <?php // echo $form->field($model, 'keljalar_bahu_pil') ?>

    <?php // echo $form->field($model, 'keljalar_bahu') ?>

    <?php // echo $form->field($model, 'keljalar_tangan_pil') ?>

    <?php // echo $form->field($model, 'keljalar_tangan') ?>

    <?php // echo $form->field($model, 'keljalar_dada_pil') ?>

    <?php // echo $form->field($model, 'keljalar_dada') ?>

    <?php // echo $form->field($model, 'keljalar_perut_pil') ?>

    <?php // echo $form->field($model, 'keljalar_perut') ?>

    <?php // echo $form->field($model, 'keljalar_pinggang_pil') ?>

    <?php // echo $form->field($model, 'keljalar_punggung_pil') ?>

    <?php // echo $form->field($model, 'keljalar_punggung') ?>

    <?php // echo $form->field($model, 'keljalar_kelamin_pil') ?>

    <?php // echo $form->field($model, 'keljalar_kelamin') ?>

    <?php // echo $form->field($model, 'keljalar_kaki_pil') ?>

    <?php // echo $form->field($model, 'keljalar_kaki') ?>

    <?php // echo $form->field($model, 'keljalar_seltub_pil') ?>

    <?php // echo $form->field($model, 'kel_tembus_pil') ?>

    <?php // echo $form->field($model, 'kel_punkel_nil') ?>

    <?php // echo $form->field($model, 'kel_punkel_lama') ?>

    <?php // echo $form->field($model, 'kel_kemunculan') ?>

    <?php // echo $form->field($model, 'kel_kemunculan_saat') ?>

    <?php // echo $form->field($model, 'kel_penjelasan_awal') ?>

    <?php // echo $form->field($model, 'kel_penjelasan_kemudian') ?>

    <?php // echo $form->field($model, 'kel_penjelasan_saat') ?>

    <?php // echo $form->field($model, 'riwayat_penyakit_pil') ?>

    <?php // echo $form->field($model, 'riwayatsakit_icdx_id') ?>

    <?php // echo $form->field($model, 'riwayat_penyakit_nama') ?>

    <?php // echo $form->field($model, 'riwayat_penyakit_nil') ?>

    <?php // echo $form->field($model, 'riwayat_penyakit_lama') ?>

    <?php // echo $form->field($model, 'riwayat_perawatan_pil') ?>

    <?php // echo $form->field($model, 'riwayat_perawatan_waktu') ?>

    <?php // echo $form->field($model, 'riwayat_perawatan_tempat') ?>

    <?php // echo $form->field($model, 'riwayat_perawatan_nil') ?>

    <?php // echo $form->field($model, 'riwayat_perawatan_lama') ?>

    <?php // echo $form->field($model, 'riwayat_pengobatan_pil') ?>

    <?php // echo $form->field($model, 'riwayat_pengobatan_id') ?>

    <?php // echo $form->field($model, 'riwayat_keluarga_pil') ?>

    <?php // echo $form->field($model, 'riwayatkel_icdx_id') ?>

    <?php // echo $form->field($model, 'riwayat_lainnya_pil') ?>

    <?php // echo $form->field($model, 'riwayat_alergi_pil') ?>

    <?php // echo $form->field($model, 'alergi_obat_pil') ?>

    <?php // echo $form->field($model, 'alergi_obat_jenis') ?>

    <?php // echo $form->field($model, 'alergi_makanan_pil') ?>

    <?php // echo $form->field($model, 'alergi_makanan') ?>

    <?php // echo $form->field($model, 'alergi_sabun_pil') ?>

    <?php // echo $form->field($model, 'alergi_sabun') ?>

    <?php // echo $form->field($model, 'alergi_udara_pil') ?>

    <?php // echo $form->field($model, 'alergi_udara') ?>

    <?php // echo $form->field($model, 'alergi_debu_pil') ?>

    <?php // echo $form->field($model, 'alergi_lainnya_pil') ?>

    <?php // echo $form->field($model, 'alergi_lainnya') ?>

    <?php // echo $form->field($model, 'riwayat_transfusi_pil') ?>

    <?php // echo $form->field($model, 'transfusi_wb_pil') ?>

    <?php // echo $form->field($model, 'transfusi_wb_waktu') ?>

    <?php // echo $form->field($model, 'transfusi_wb_jumlah') ?>

    <?php // echo $form->field($model, 'transfusi_wb_ukuran') ?>

    <?php // echo $form->field($model, 'transfusi_trombosit_pil') ?>

    <?php // echo $form->field($model, 'transfusi_trombosit_waktu') ?>

    <?php // echo $form->field($model, 'transfusi_trombosit_jumlah') ?>

    <?php // echo $form->field($model, 'transfusi_trombosit_ukuran') ?>

    <?php // echo $form->field($model, 'transfusi_eritrosit_pil') ?>

    <?php // echo $form->field($model, 'transfusi_eritrosit_waktu') ?>

    <?php // echo $form->field($model, 'transfusi_eritrosit_jumlah') ?>

    <?php // echo $form->field($model, 'transfusi_eritrosit_ukuran') ?>

    <?php // echo $form->field($model, 'riwayat_imunisasi_pil') ?>

    <?php // echo $form->field($model, 'riwayat_imunisasi') ?>

    <?php // echo $form->field($model, 'kebiasaan_obat_pil') ?>

    <?php // echo $form->field($model, 'kebiasaan_obat_id') ?>

    <?php // echo $form->field($model, 'kebiasaan_rokok_pil') ?>

    <?php // echo $form->field($model, 'kebiasaan_rokok_jmlh') ?>

    <?php // echo $form->field($model, 'kebiasaan_rokok_satuan') ?>

    <?php // echo $form->field($model, 'kebiasaan_rokok_nil') ?>

    <?php // echo $form->field($model, 'kebiasaan_rokok_lama') ?>

    <?php // echo $form->field($model, 'kebiasaan_rokok_awal') ?>

    <?php // echo $form->field($model, 'kebiasaan_rokok_berhenti') ?>

    <?php // echo $form->field($model, 'kebiasaan_rokok_jenis') ?>

    <?php // echo $form->field($model, 'kebiasaan_alkohol_pil') ?>

    <?php // echo $form->field($model, 'kebiasaan_alkohol_nil') ?>

    <?php // echo $form->field($model, 'kebiasaan_alkohol_lama') ?>

    <?php // echo $form->field($model, 'kebiasaan_alkohol_awal') ?>

    <?php // echo $form->field($model, 'kebiasaan_alkohol_berhenti') ?>

    <?php // echo $form->field($model, 'kebiasaan_alkohol_jenis') ?>

    <?php // echo $form->field($model, 'kebiasaan_perawatan_pil') ?>

    <?php // echo $form->field($model, 'perawatan_mandi_pil') ?>

    <?php // echo $form->field($model, 'perawatan_mandi_jmlh') ?>

    <?php // echo $form->field($model, 'perawatan_mandi_lama') ?>

    <?php // echo $form->field($model, 'perawatan_mandi_oleh') ?>

    <?php // echo $form->field($model, 'perawatan_rambut_pil') ?>

    <?php // echo $form->field($model, 'perawatan_rambut_jmlh') ?>

    <?php // echo $form->field($model, 'perawatan_rambut_lama') ?>

    <?php // echo $form->field($model, 'perawatan_rambut_oleh') ?>

    <?php // echo $form->field($model, 'perawatan_kuku_pil') ?>

    <?php // echo $form->field($model, 'perawatan_kuku_jmlh') ?>

    <?php // echo $form->field($model, 'perawatan_kuku_lama') ?>

    <?php // echo $form->field($model, 'perawatan_kuku_oleh') ?>

    <?php // echo $form->field($model, 'perawatan_tidur_pil') ?>

    <?php // echo $form->field($model, 'perawatan_tidur_jmlh') ?>

    <?php // echo $form->field($model, 'perawatan_tidur_lama') ?>

    <?php // echo $form->field($model, 'perawatan_tidur_oleh') ?>

    <?php // echo $form->field($model, 'kebiasaan_nutrisi_pil') ?>

    <?php // echo $form->field($model, 'nutrisi_selera_pil') ?>

    <?php // echo $form->field($model, 'nutrisi_selera_makan') ?>

    <?php // echo $form->field($model, 'makan_frekuensi_pil') ?>

    <?php // echo $form->field($model, 'makan_frekuensi') ?>

    <?php // echo $form->field($model, 'makan_pembatasan_pil') ?>

    <?php // echo $form->field($model, 'makan_pembatasan_asupan') ?>

    <?php // echo $form->field($model, 'makan_menu_pil') ?>

    <?php // echo $form->field($model, 'makan_menu_pokok') ?>

    <?php // echo $form->field($model, 'makan_menu_lauk') ?>

    <?php // echo $form->field($model, 'makan_menu_sayur') ?>

    <?php // echo $form->field($model, 'makan_menu_buah') ?>

    <?php // echo $form->field($model, 'minum_jenis_pil') ?>

    <?php // echo $form->field($model, 'minum_jenis') ?>

    <?php // echo $form->field($model, 'minum_frekuensi_pil') ?>

    <?php // echo $form->field($model, 'minum_frekuensi') ?>

    <?php // echo $form->field($model, 'minum_cara_pil') ?>

    <?php // echo $form->field($model, 'minum_cara_pemenuhan') ?>

    <?php // echo $form->field($model, 'kebiasan_olahraga_pil') ?>

    <?php // echo $form->field($model, 'olahraga_jenis') ?>

    <?php // echo $form->field($model, 'olahraga_frekuensi_kali') ?>

    <?php // echo $form->field($model, 'olahraga_frekuensi_lama') ?>

    <?php // echo $form->field($model, 'kebiasaan_kegiatan_pil') ?>

    <?php // echo $form->field($model, 'kegiatan_jenis') ?>

    <?php // echo $form->field($model, 'kegiatan_frekuensi_kali') ?>

    <?php // echo $form->field($model, 'kegiatan_frekuensi_lama') ?>

    <?php // echo $form->field($model, 'faktor_resiko_riwayat') ?>

    <?php // echo $form->field($model, 'faktor_resiko_kebiasaan') ?>

    <?php // echo $form->field($model, 'psikososial_hubkel_pil') ?>

    <?php // echo $form->field($model, 'psikososial_hubkel') ?>

    <?php // echo $form->field($model, 'psikososial_temting_pil') ?>

    <?php // echo $form->field($model, 'psikososial_temting') ?>

    <?php // echo $form->field($model, 'psikososial_tingber_pil') ?>

    <?php // echo $form->field($model, 'psikososial_tingber') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

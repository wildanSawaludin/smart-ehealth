<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Anamnesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anamnesa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'registrasi_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'keluhan')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'keluhan_rincian')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'keluhan_lokasi')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'keluhan_lokasi_umum')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'keluhan_sub_lokasi')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'keluhan_berlangsung_nil')->textInput() ?>

    <?= $form->field($model, 'keluhan_berlangsung_lama')->dropDownList([ 'detik' => 'Detik', 'menit' => 'Menit', 'jam' => 'Jam', 'hari' => 'Hari', 'minggu' => 'Minggu', 'bulan' => 'Bulan', 'tahun' => 'Tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'keluhan_faktor_pencetus')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'keluhan_durasi_nil')->textInput() ?>

    <?= $form->field($model, 'keluhan_durasi_lama')->dropDownList([ 'menit' => 'Menit', 'jam' => 'Jam', 'hari' => 'Hari', 'minggu' => 'Minggu', 'bulan' => 'Bulan', 'tahun' => 'Tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'keluhan_durasi_jenis')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'keluhan_durasi_pereda')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'keluhan_durasi_pemberat')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'keluhan_menjalar_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_kepala_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_kepala')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_wajah_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_wajah')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_mata_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_mata')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_hidung_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_mulut_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_mulut')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_telinga_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_telinga')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_leher_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_leher')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_tenggorokan_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_bahu_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_bahu')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_tangan_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_tangan')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_dada_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_dada')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_perut_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_perut')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_pinggang_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_punggung_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_punggung')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_kelamin_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_kelamin')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_kaki_pil')->textInput() ?>

    <?= $form->field($model, 'keljalar_kaki')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keljalar_seltub_pil')->textInput() ?>

    <?= $form->field($model, 'kel_tembus_pil')->textInput() ?>

    <?= $form->field($model, 'kel_punkel_nil')->textInput() ?>

    <?= $form->field($model, 'kel_punkel_lama')->dropDownList([ 'menit' => 'Menit', 'jam' => 'Jam', 'hari' => 'Hari', 'minggu' => 'Minggu', 'bulan' => 'Bulan', 'tahun' => 'Tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kel_kemunculan')->dropDownList([ 'Perlahan' => 'Perlahan', 'Berulang' => 'Berulang', 'Spontan/tiba-tiba' => 'Spontan/tiba-tiba', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kel_kemunculan_saat')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'kel_penjelasan_awal')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'kel_penjelasan_kemudian')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'kel_penjelasan_saat')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'riwayat_penyakit_pil')->textInput() ?>

    <?= $form->field($model, 'riwayatsakit_icdx_id')->textInput() ?>

    <?= $form->field($model, 'riwayat_penyakit_nama')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'riwayat_penyakit_nil')->textInput() ?>

    <?= $form->field($model, 'riwayat_penyakit_lama')->dropDownList([ 'hari' => 'Hari', 'minggu' => 'Minggu', 'bulan' => 'Bulan', 'tahun' => 'Tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'riwayat_perawatan_pil')->textInput() ?>

    <?= $form->field($model, 'riwayat_perawatan_waktu')->textInput() ?>

    <?= $form->field($model, 'riwayat_perawatan_tempat')->dropDownList([ 'Rumah Sakit' => 'Rumah Sakit', 'Puskesmas' => 'Puskesmas', 'Rumah' => 'Rumah', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'riwayat_perawatan_nil')->textInput() ?>

    <?= $form->field($model, 'riwayat_perawatan_lama')->dropDownList([ 'hari' => 'Hari', 'minggu' => 'Minggu', 'bulan' => 'Bulan', 'tahun' => 'Tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'riwayat_pengobatan_pil')->textInput() ?>

    <?= $form->field($model, 'riwayat_pengobatan_id')->textInput() ?>

    <?= $form->field($model, 'riwayat_keluarga_pil')->textInput() ?>

    <?= $form->field($model, 'riwayatkel_icdx_id')->textInput() ?>

    <?= $form->field($model, 'riwayat_lainnya_pil')->textInput() ?>

    <?= $form->field($model, 'riwayat_alergi_pil')->textInput() ?>

    <?= $form->field($model, 'alergi_obat_pil')->textInput() ?>

    <?= $form->field($model, 'alergi_obat_jenis')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'alergi_makanan_pil')->textInput() ?>

    <?= $form->field($model, 'alergi_makanan')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'alergi_sabun_pil')->textInput() ?>

    <?= $form->field($model, 'alergi_sabun')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'alergi_udara_pil')->textInput() ?>

    <?= $form->field($model, 'alergi_udara')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'alergi_debu_pil')->textInput() ?>

    <?= $form->field($model, 'alergi_lainnya_pil')->textInput() ?>

    <?= $form->field($model, 'alergi_lainnya')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'riwayat_transfusi_pil')->textInput() ?>

    <?= $form->field($model, 'transfusi_wb_pil')->textInput() ?>

    <?= $form->field($model, 'transfusi_wb_waktu')->textInput() ?>

    <?= $form->field($model, 'transfusi_wb_jumlah')->textInput() ?>

    <?= $form->field($model, 'transfusi_wb_ukuran')->dropDownList([ 'kantong' => 'Kantong', 'mL/cc' => 'ML/cc', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'transfusi_trombosit_pil')->textInput() ?>

    <?= $form->field($model, 'transfusi_trombosit_waktu')->textInput() ?>

    <?= $form->field($model, 'transfusi_trombosit_jumlah')->textInput() ?>

    <?= $form->field($model, 'transfusi_trombosit_ukuran')->dropDownList([ 'kantong' => 'Kantong', 'mL/cc' => 'ML/cc', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'transfusi_eritrosit_pil')->textInput() ?>

    <?= $form->field($model, 'transfusi_eritrosit_waktu')->textInput() ?>

    <?= $form->field($model, 'transfusi_eritrosit_jumlah')->textInput() ?>

    <?= $form->field($model, 'transfusi_eritrosit_ukuran')->dropDownList([ 'kantong' => 'Kantong', 'mL/cc' => 'ML/cc', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'riwayat_imunisasi_pil')->textInput() ?>

    <?= $form->field($model, 'riwayat_imunisasi')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'kebiasaan_obat_pil')->textInput() ?>

    <?= $form->field($model, 'kebiasaan_obat_id')->textInput() ?>

    <?= $form->field($model, 'kebiasaan_rokok_pil')->textInput() ?>

    <?= $form->field($model, 'kebiasaan_rokok_jmlh')->textInput() ?>

    <?= $form->field($model, 'kebiasaan_rokok_satuan')->dropDownList([ 'batang' => 'Batang', 'bungkus' => 'Bungkus', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_rokok_nil')->textInput() ?>

    <?= $form->field($model, 'kebiasaan_rokok_lama')->dropDownList([ 'hari' => 'Hari', 'minggu' => 'Minggu', 'bulan' => 'Bulan', 'tahun' => 'Tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_rokok_awal')->dropDownList([ 'Usia < 10 tahun' => 'Usia < 10 tahun', 'Usia 10 – 20 tahun' => 'Usia 10 – 20 tahun', 'Usia 20 – 30 tahun' => 'Usia 20 – 30 tahun', 'Usia > 30 tahun' => 'Usia > 30 tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_rokok_berhenti')->dropDownList([ 'Usia < 10 tahun' => 'Usia < 10 tahun', 'Usia 10 – 20 tahun' => 'Usia 10 – 20 tahun', 'Usia 20 – 30 tahun' => 'Usia 20 – 30 tahun', 'Usia > 30 tahun' => 'Usia > 30 tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_rokok_jenis')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'kebiasaan_alkohol_pil')->textInput() ?>

    <?= $form->field($model, 'kebiasaan_alkohol_nil')->textInput() ?>

    <?= $form->field($model, 'kebiasaan_alkohol_lama')->dropDownList([ 'hari' => 'Hari', 'minggu' => 'Minggu', 'bulan' => 'Bulan', 'tahun' => 'Tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_alkohol_awal')->dropDownList([ 'Usia < 10 tahun' => 'Usia < 10 tahun', 'Usia 10 – 20 tahun' => 'Usia 10 – 20 tahun', 'Usia 20 – 30 tahun' => 'Usia 20 – 30 tahun', 'Usia > 30 tahun' => 'Usia > 30 tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_alkohol_berhenti')->dropDownList([ 'Usia < 10 tahun' => 'Usia < 10 tahun', 'Usia 10 – 20 tahun' => 'Usia 10 – 20 tahun', 'Usia 20 – 30 tahun' => 'Usia 20 – 30 tahun', 'Usia > 30 tahun' => 'Usia > 30 tahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_alkohol_jenis')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'kebiasaan_perawatan_pil')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'perawatan_mandi_pil')->textInput() ?>

    <?= $form->field($model, 'perawatan_mandi_jmlh')->textInput() ?>

    <?= $form->field($model, 'perawatan_mandi_lama')->dropDownList([ 'sehari' => 'Sehari', 'seminggu' => 'Seminggu', 'sebulan' => 'Sebulan', 'setahun' => 'Setahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'perawatan_mandi_oleh')->dropDownList([ 'Sendiri' => 'Sendiri', 'Dibantu' => 'Dibantu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'perawatan_rambut_pil')->textInput() ?>

    <?= $form->field($model, 'perawatan_rambut_jmlh')->textInput() ?>

    <?= $form->field($model, 'perawatan_rambut_lama')->dropDownList([ 'sehari' => 'Sehari', 'seminggu' => 'Seminggu', 'sebulan' => 'Sebulan', 'setahun' => 'Setahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'perawatan_rambut_oleh')->dropDownList([ 'Sendiri' => 'Sendiri', 'Dibantu' => 'Dibantu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'perawatan_kuku_pil')->textInput() ?>

    <?= $form->field($model, 'perawatan_kuku_jmlh')->textInput() ?>

    <?= $form->field($model, 'perawatan_kuku_lama')->dropDownList([ 'sehari' => 'Sehari', 'seminggu' => 'Seminggu', 'sebulan' => 'Sebulan', 'setahun' => 'Setahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'perawatan_kuku_oleh')->dropDownList([ 'Sendiri' => 'Sendiri', 'Dibantu' => 'Dibantu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'perawatan_tidur_pil')->textInput() ?>

    <?= $form->field($model, 'perawatan_tidur_jmlh')->textInput() ?>

    <?= $form->field($model, 'perawatan_tidur_lama')->dropDownList([ 'sehari' => 'Sehari', 'seminggu' => 'Seminggu', 'sebulan' => 'Sebulan', 'setahun' => 'Setahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'perawatan_tidur_oleh')->dropDownList([ 'Sendiri' => 'Sendiri', 'Dibantu' => 'Dibantu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_nutrisi_pil')->textInput() ?>

    <?= $form->field($model, 'nutrisi_selera_pil')->textInput() ?>

    <?= $form->field($model, 'nutrisi_selera_makan')->dropDownList([ 'Baik' => 'Baik', 'Meningkat' => 'Meningkat', 'Menurun' => 'Menurun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'makan_frekuensi_pil')->textInput() ?>

    <?= $form->field($model, 'makan_frekuensi')->dropDownList([ '3 kali sehari' => '3 kali sehari', '< 3 kali sehari' => '< 3 kali sehari', '> 3 kali sehari' => '> 3 kali sehari', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'makan_pembatasan_pil')->textInput() ?>

    <?= $form->field($model, 'makan_pembatasan_asupan')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'makan_menu_pil')->textInput() ?>

    <?= $form->field($model, 'makan_menu_pokok')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'makan_menu_lauk')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'makan_menu_sayur')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'makan_menu_buah')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'minum_jenis_pil')->textInput() ?>

    <?= $form->field($model, 'minum_jenis')->dropDownList([ 'Air mineral' => 'Air mineral', 'Air bersoda' => 'Air bersoda', 'Teh' => 'Teh', 'Kopi' => 'Kopi', 'Jus' => 'Jus', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'minum_frekuensi_pil')->textInput() ?>

    <?= $form->field($model, 'minum_frekuensi')->dropDownList([ '8 gelas per hari' => '8 gelas per hari', '< 8 gelas per hari' => '< 8 gelas per hari', '> 8 gelas per hari' => '> 8 gelas per hari', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'minum_cara_pil')->textInput() ?>

    <?= $form->field($model, 'minum_cara_pemenuhan')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'kebiasan_olahraga_pil')->textInput() ?>

    <?= $form->field($model, 'olahraga_jenis')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'olahraga_frekuensi_kali')->textInput() ?>

    <?= $form->field($model, 'olahraga_frekuensi_lama')->dropDownList([ 'sehari' => 'Sehari', 'seminggu' => 'Seminggu', 'sebulan' => 'Sebulan', 'setahun' => 'Setahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'kebiasaan_kegiatan_pil')->textInput() ?>

    <?= $form->field($model, 'kegiatan_jenis')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'kegiatan_frekuensi_kali')->textInput() ?>

    <?= $form->field($model, 'kegiatan_frekuensi_lama')->dropDownList([ 'sehari' => 'Sehari', 'seminggu' => 'Seminggu', 'sebulan' => 'Sebulan', 'setahun' => 'Setahun', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'faktor_resiko_riwayat')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'faktor_resiko_kebiasaan')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'psikososial_hubkel_pil')->textInput() ?>

    <?= $form->field($model, 'psikososial_hubkel')->dropDownList([ 'Baik/harmonis' => 'Baik/harmonis', 'Cukup baik' => 'Cukup baik', 'Kurang baik' => 'Kurang baik', 'Renggang' => 'Renggang', 'Berjauhan' => 'Berjauhan', 'Tidak memiliki keluarga' => 'Tidak memiliki keluarga', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'psikososial_temting_pil')->textInput() ?>

    <?= $form->field($model, 'psikososial_temting')->dropDownList([ 'Rumah sendiri' => 'Rumah sendiri', 'Rumah orang tua/keluarga' => 'Rumah orang tua/keluarga', 'Rumah kontrak' => 'Rumah kontrak', 'Kos-kosan' => 'Kos-kosan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'psikososial_tingber_pil')->textInput() ?>

    <?= $form->field($model, 'psikososial_tingber')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

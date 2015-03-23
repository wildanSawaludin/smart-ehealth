<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use backend\models\Lookup;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\Anamnesa */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="anamnesa-form">

    <?php $form = ActiveForm::begin([
                'id' => 'kelum-form', 
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,'showLabels'=>false]
                ]); 
    ?>
        <ul class="nav nav-tabs" id="tabs-cnt" style="padding-top:0px;margin-bottom: 10px">
            <li class="active"><a href="#eluh" data-toggle="tab">Keluhan </a></li>
            <li ><a href="#wayat" data-toggle="tab">Riwayat</a></li>
            <li ><a href="#biasa" data-toggle="tab">Kebiasaan</a></li>
            <li ><a href="#faktor" data-toggle="tab">Faktor Resiko</a></li>
            <li ><a href="#psiko" data-toggle="tab">Hubungan Status Psikososial</a></li>

        </ul>
        <div class="tab-content">
		<div class="tab-pane fade in active" id="eluh">    
                    <?php
                        $list = ['Sakit' => 'Sakit', 'Batuk' => 'Batuk', 'Luka' => 'Luka', 'Lemah'=>'Lemah','Demam'=>'Demam','Gangguan_Makan/Minum'=>'Gangguan Makan/Minum',
                                 'Gangguan_Buang_Air_Besar'=>'Gangguan Buang Air Besar','Gangguan_Buang_Air_Kecil'=>'Gangguan Buang Air Kecil','Gangguan_Tenggorokan'=>'Gangguan Tenggorokan',
                                 'Gangguan_pada_Sendi'=>'Gangguan pada Sendi','Masalah_pada_Kulit'=>'Masalah pada Kulit'
                            ];
                        $list2 = ['Masalah_pada_Mata' => 'Masalah pada Mata', 'gangguan_penglihatan' => 'gangguan penglihatan', 'Masalah_pada_Telinga' => 'Masalah pada Telinga', 'Masalah pada Mulut'=>'Masalah pada Mulut','Kelainan Suhu Tubuh'=>'Kelainan Suhu Tubuh',
                                 'Masalah_pada_Hidung/Pernapasan'=>'Masalah pada Hidung/Pernapasan',
                                 'Masalah pada_Jantung'=>'Masalah pada Jantung','Masalah_pada_Perut'=>'Masalah pada Perut','Masalah_Kewanitaan'=>'Masalah Kewanitaan',
                                 'Masalah_Reproduksi_Pria'=>'Masalah Reproduksi Pria','Lainnya'=>'Lainnya'
                            ]; 
                    ?>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'keluhan')->radioList($list); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'keluhan')->radioList($list2); ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="wayat">
                    <div class="col-sm-3">
                        <?= $form->field($model, 'riwayat_penyakit_pil',['template'=>'{label}{input}'])->checkbox(); ?>
                        <?= $form->field($model, 'riwayat_perawatan_pil',['template'=>'{label}{input}'])->checkbox(); ?>
                        <?= $form->field($model, 'riwayat_pengobatan_pil',['template'=>'{label}{input}'])->checkbox(); ?>
                        <?= $form->field($model, 'riwayat_keluarga_pil',['template'=>'{label}{input}'])->checkbox(); ?>
                        <?= $form->field($model, 'riwayat_lainnya_pil',['template'=>'{label}{input}'])->checkbox(); ?>                        
                        <div id="riwayat_lain_hide" style="display: none; margin-left: 20px;">
                            <div class="form-group field-anamnesa-riwayat_alergi_pil has-success">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="1" <?= ($model->riwayat_alergi_pil == $model->riwayat_alergi_pil) ? 'checked=true':'' ?> name="Anamnesa[riwayat_alergi_pil]" id="anamnesa-riwayat_alergi_pil"> Riwayat Alergi </label>&nbsp;&nbsp;<span class="glyphicon glyphicon-edit riwayat_alergi" style="display: none" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-anamnesa-riwayat_transfusi_pil has-success">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="1" <?= ($model->riwayat_transfusi_pil == $model->riwayat_transfusi_pil) ? 'checked=true':'' ?> name="Anamnesa[riwayat_transfusi_pil]" id="anamnesa-riwayat_transfusi_pil"> Riwayat Transfusi </label>&nbsp;&nbsp;<span class="glyphicon glyphicon-edit riwayat_transfusi" style="display: none" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group field-anamnesa-riwayat_imunisasi_pil">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="1" <?= ($model->riwayat_imunisasi_pil == $model->riwayat_imunisasi_pil) ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi_pil]" id="anamnesa-riwayat_imunisasi_pil"> Riwayat Imunisasi</label>&nbsp;&nbsp;<span class="glyphicon glyphicon-edit riwayat_imunisasi" style="display: none" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="biasa">
                    <div class="col-sm-3">
                        <?= $form->field($model, 'kebiasaan_obat_pil',['template'=>'{label}{input}'])->checkbox(); ?>
                        <?= $form->field($model, 'kebiasaan_rokok_pil',['template'=>'{label}{input}'])->checkbox(); ?>
                        <?= $form->field($model, 'kebiasaan_alkohol_pil',['template'=>'{label}{input}'])->checkbox(); ?>
                        <?= $form->field($model, 'kebiasaan_perawatan_pil',['template'=>'{label}{input}'])->checkbox(); ?>
                        <?= $form->field($model, 'kebiasaan_nutrisi_pil',['template'=>'{label}{input}'])->checkbox(); ?>                        
                        <?= $form->field($model, 'kebiasan_olahraga_pil',['template'=>'{label}{input}'])->checkbox(); ?>                        
                        <?= $form->field($model, 'kebiasaan_kegiatan_pil',['template'=>'{label}{input}'])->checkbox(); ?>                        
                    </div>
                </div>
            
                <div class="tab-pane fade" id="faktor">
                    <?php
                        $list3 = ['Riwayat Penyakit' => 'Riwayat Penyakit', 'Riwayat Perawatan' => 'Riwayat Perawatan', 'Riwayat Pengobatan' => 'Riwayat Pengobatan', 'Riwayat Penyakit Keluarga' => 'Riwayat Penyakit Keluarga',
                            ];
                        $list4 = ['Riwayat Alergi' => 'Riwayat Alergi','Riwayat Transfusi' => 'Riwayat Transfusi','Riwayat Imunisasi' => 'Riwayat Imunisasi'
                            ];
                        $list5 = ['Obat-obatan' => 'Obat-obatan', 'Rokok' => 'Rokok', 'Alkohol' => 'Alkohol', 'Perawatan Diri' => 'Perawatan Diri',
                            ];
                        $list6 = ['Nutrisi' => 'Nutrisi', 'Olahraga' => 'Olahraga', 'Kegiatan waktu senggang' => 'Kegiatan waktu senggang',
                            ];
                    ?>
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <?= $form->field($model, 'faktor_resiko_riwayat')->checkboxList($list3); ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'faktor_resiko_riwayat')->checkboxList($list4); ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <?= $form->field($model, 'faktor_resiko_kebiasaan')->checkboxList($list5); ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'faktor_resiko_kebiasaan')->checkboxList($list6); ?>
                        </div>
                    </div>
                </div>
            
                <div class="tab-pane fade" id="psiko">
                    <div class="row">
                        <div class="col-sm-3">
                        <?= $form->field($model, 'psikososial_hubkel_pil')->checkbox(); ?>
                        </div>
                        <div class="col-sm-3">
                        <?= $form->field($model, 'psikososial_hubkel')->dropDownList([ 'Baik/harmonis' => 'Baik/harmonis', 'Cukup baik' => 'Cukup baik', 'Kurang baik' => 'Kurang baik', 'Renggang' => 'Renggang', 'Berjauhan' => 'Berjauhan', 'Tidak memiliki keluarga' => 'Tidak memiliki keluarga', ], ['prompt' => '']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                        <?= $form->field($model, 'psikososial_temting_pil')->checkbox(); ?>
                        </div>
                        <div class="col-sm-3">
                        <?= $form->field($model, 'psikososial_temting')->dropDownList([ 'Rumah sendiri' => 'Rumah sendiri', 'Rumah orang tua/keluarga' => 'Rumah orang tua/keluarga', 'Rumah kontrak' => 'Rumah kontrak', 'Kos-kosan' => 'Kos-kosan', ], ['prompt' => '']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $list7 = ['Sendri' => 'Sendri', 'Orang Tua' => 'Orang Tua', 'Saudara' => 'Saudara', 'Anak' => 'Anak',
                                      'Keluarga' => 'Keluarga',
                            ];
                            $list8 = ['Suami/Istri' => 'Suami/Istri', 'Mertua' => 'Mertua', 'Menantu' => 'Menantu', 'Teman/Orang Lain' => 'Teman/Orang Lain',
                            ];
                        ?>
                        <div class="col-sm-3">
                        <?= $form->field($model, 'psikososial_tingber_pil')->checkbox(); ?>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <?= $form->field($model, 'psikososial_tingber')->checkboxList($list7); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'psikososial_tingber')->checkboxList($list8); ?>
                            </div>
                            <div class="col-sm-4">
                                <?php $ambil = Lookup::items('Sakit','keluhan_rincian');
                                        ?>
                                <?= $form->field($model, 'keluhan_rincian')->checkbox(); ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
<?php
Modal::begin([
    'id' => 'm_keluhanDetail',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_riwayatpenyakit',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_riwayatperawatan',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_riwayatpengobatan',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_riwayatkeluarga',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_riwayatalergi',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_riwayattransfusi',
    'header' => '<h7>Riwayat Transfusi</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_riwayatimunisasi',
    'header' => '<h7>Riwayat Imunisasi</h7>'
]);
Modal::end();
?>
<script>var id = '<?php echo $_GET['id']; ?>' </script>  
<script src="/admin/js/popupFunction.js"></script>  
<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use backend\models\Lookup;


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
                        $list = ['Sakit' => 'Sakit', 'Batuk' => 'Batuk', 'Luka' => 'Luka', 'Lemah'=>'Lemah','Demam'=>'Demam','Gangguan Makan/Minum'=>'Gangguan Makan/Minum',
                                 'Gangguan Buang Air Besar'=>'Gangguan Buang Air Besar','Gangguan Buang Air Kecil'=>'Gangguan Buang Air Kecil','Gangguan Tenggorokan'=>'Gangguan Tenggorokan',
                                 'Gangguan pada Sendi'=>'Gangguan pada Sendi','Masalah pada Kulit'=>'Masalah pada Kulit'
                            ];
                        $list2 = ['Masalah pada Mata' => 'Masalah pada Mata', 'gangguan penglihatan' => 'gangguan penglihatan', 'Masalah pada Telinga' => 'Masalah pada Telinga', 'Masalah pada Mulut'=>'Masalah pada Mulut','Kelainan Suhu Tubuh'=>'Kelainan Suhu Tubuh',
                                 'Masalah pada Hidung/Pernapasan'=>'Masalah pada Hidung/Pernapasan',
                                 'Masalah pada Jantung'=>'Masalah pada Jantung','Masalah pada Perut'=>'Masalah pada Perut','Masalah Kewanitaan'=>'Masalah Kewanitaan',
                                 'Masalah Reproduksi Pria'=>'Masalah Reproduksi Pria','Lainnya'=>'Lainnya'
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
                        <?= $form->field($model, 'riwayat_alergi_pil',['template'=>'{label}{input}'])->checkbox(); ?>                        
                        <?= $form->field($model, 'riwayat_transfusi_pil',['template'=>'{label}{input}'])->checkbox(); ?>                        
                        <?= $form->field($model, 'riwayat_imunisasi_pil',['template'=>'{label}{input}'])->checkbox(); ?>                        
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
<script>
    $(document).ready(function () {
        $('input[name="Anamnesa[keluhan]"]').change(function () {
        if ($(this).val() == 'Sakit') {
            alert('Y');
             // first button.
        }
    });
    });
</script>
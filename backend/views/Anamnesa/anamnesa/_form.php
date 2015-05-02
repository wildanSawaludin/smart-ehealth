<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use backend\models\Lookup;
use yii\bootstrap\Modal;
use kartik\tabs\TabsX;

//use frontend\assets\AppAsset;

//AppAsset::register($this);
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
                     $items = [
    [
        'label'=>'<i class="glyphicon glyphicon-edit"></i> Keluhan Utama',
        'content'=>yii\base\View::render('popup/_formkeluhanutama',['model'=>$model,'id'=>$model->id]),
        'active'=>true
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-check"></i> Keluhan Tambahan',
     //   'content'=>yii\base\View::render('_keluhanLokasi',['model'=>$model]),
        'id'=>'tabs-keluhantambahan',
        'content'=>'<div id="tabkeluhantambahan"></div>',
        'linkOptions'=>['data-enable-cache'=>false,'data-url'=>\yii\helpers\Url::to(['Anamnesa/anamnesa/keluhan-tambahan','id'=>$model->id])],
    ],
    
    /* [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Rincian',
        'content'=>yii\base\View::render('tambahan/_formkeluhantambahan',['model'=>$model,'id'=>$_GET['id']]),
        
    ],*/
   
];
                     echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_LEFT,
    'sideways'=>false,
    'encodeLabels'=>false,
    'pluginOptions' =>  ['enableCache'=>false],
]);
                     
                   ?>
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
                    <div class="col-sm-4">
                        <?= $form->field($model, 'kebiasaan_obat_pil',['template'=>'{label}{input}'])->checkbox(['label' => 'Obat-obatan']); ?>
                        <?= $form->field($model, 'kebiasaan_rokok_pil',['template'=>'{label}{input}'])->checkbox(['label' => 'Rokok']); ?>
                        <?= $form->field($model, 'kebiasaan_alkohol_pil',['template'=>'{label}{input}'])->checkbox(['label' => 'Alkohol']); ?>
                        <?= $form->field($model, 'kebiasaan_perawatan_pil',['template'=>'{label}{input}'])->checkbox(['label' => 'Perawatan diri']); ?>
                        <?= $form->field($model, 'kebiasaan_nutrisi_pil',['template'=>'{label}{input}'])->checkbox(['label' => 'Nutrisi']); ?>
                        <?= $form->field($model, 'kebiasaan_olahraga_pil',['template'=>'{label}{input}'])->checkbox(['label' => 'Olahraga']); ?>
                        <?= $form->field($model, 'kebiasaan_kegiatan_pil',['template'=>'{label}{input}'])->checkbox(['label' => 'Kegiatan waktu senggang']); ?>
                    </div>
                </div>
            
                <div class="tab-pane fade" id="faktor">
                    <form id="form-faktor-resiko">
                        <?php
                            $list3 = ['Riwayat Penyakit' => 'Riwayat Penyakit', 'Riwayat Perawatan' => 'Riwayat Perawatan', 'Riwayat Pengobatan' => 'Riwayat Pengobatan', 'Riwayat Penyakit Keluarga' => 'Riwayat Penyakit Keluarga',
                                ];
                            $list4 = ['Riwayat Alergi' => 'Riwayat Alergi','Riwayat Transfusi' => 'Riwayat Transfusi','Riwayat Imunisasi' => 'Riwayat Imunisasi'
                                ];
                            $list5 = ['Obat-obatan' => 'Obat-obatan', 'Rokok' => 'Rokok', 'Alkohol' => 'Alkohol', 'Perawatan Diri' => 'Perawatan Diri',
                                ];
                            $list6 = ['Nutrisi' => 'Nutrisi', 'Olahraga' => 'Olahraga', 'Kegiatan waktu senggang' => 'Kegiatan waktu senggang',
                                ];
                            $model->faktor_resiko_riwayat_1 = $faktor_resiko_riwayat;
                            $model->faktor_resiko_riwayat_2 = $faktor_resiko_riwayat;
                            $model->faktor_resiko_kebiasaan_1 = $faktor_resiko_kebiasaan;
                            $model->faktor_resiko_kebiasaan_2 = $faktor_resiko_kebiasaan;
                        ?>
                        <div class="col-sm-12">
                            <div class="col-sm-3">
                                <?= $form->field($model, 'faktor_resiko_riwayat_1')->checkboxList($list3); ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($model, 'faktor_resiko_riwayat_2')->checkboxList($list4); ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-3">
                                <?= $form->field($model, 'faktor_resiko_kebiasaan_1')->checkboxList($list5); ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($model, 'faktor_resiko_kebiasaan_2')->checkboxList($list6); ?>
                            </div>
                        </div>
						&nbsp;<hr/>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-4">
							
                                <input id="btnFaktorResikoOk" type="button" class="btn btn-danger" value="OK">
                            </div>
                        </div>
                    </form>
                </div>
            
                <div class="tab-pane fade" id="psiko">
                    <form id="form-psikososial">
                        <div class="row">
                            <div class="col-sm-5">
                            <?= $form->field($model, 'psikososial_hubkel_pil')->checkbox(); ?>
                            </div>
                            <div class="col-sm-3">
                            <?= $form->field($model, 'psikososial_hubkel')->dropDownList([ 'Baik/harmonis' => 'Baik/harmonis', 'Cukup baik' => 'Cukup baik', 'Kurang baik' => 'Kurang baik', 'Renggang' => 'Renggang', 'Berjauhan' => 'Berjauhan', 'Tidak memiliki keluarga' => 'Tidak memiliki keluarga', ], ['prompt' => '']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
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

                                $model->psikososial_tingber_1 = $psikososial_tingber;
                                $model->psikososial_tingber_2 = $psikososial_tingber;
                            ?>
                            <div class="col-sm-5">
                            <?= $form->field($model, 'psikososial_tingber_pil')->checkbox(); ?>
                            </div>
                            <div class="col-sm-7">
                                <div class="col-sm-3">
                                    <?= $form->field($model, 'psikososial_tingber_1')->checkboxList($list7); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'psikososial_tingber_2')->checkboxList($list8); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php //$ambil = Lookup::items('Sakit','keluhan_rincian');
                                            ?>
                                    <?php //$form->field($model, 'keluhan_rincian')->checkbox(); ?>
                                </div>
                            </div>
                        </div>
						&nbsp;<hr/>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-4">
                                <input id="btnPsikososialOk" type="button" class="btn btn-danger" value="OK">
                            </div>
                        </div>
                    </form>
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
    'header' => '<h7>Riwayat Alergi</h7>'
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

Modal::begin([
    'id' => 'm_kebiasaanobat',
    //'header' => '<h7>Obat-obatan</h7>'
]);

Modal::end();

Modal::begin([
    'id' => 'm_kebiasaanrokok',
    //'header' => '<h7>Obat-obatan</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_kebiasaanalkohol',
    //'header' => '<h7>Obat-obatan</h7>'
]);
Modal::end();


Modal::begin([
    'id' => 'm_kebiasaanperawatandiri',
    //'header' => '<h7>Obat-obatan</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_kebiasaannutrisi',
    //'header' => '<h7>Obat-obatan</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_kebiasaanolahraga',
    //'header' => '<h7>Obat-obatan</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_kebiasaaanWaktuSenggang',
    //'header' => '<h7>Obat-obatan</h7>'
]);
Modal::end();
?>
<script>var id = '<?php echo $_GET['id']; ?>' </script>  

<?php $this->registerJsFile('/admin/js/popupFunction.js'); ?>

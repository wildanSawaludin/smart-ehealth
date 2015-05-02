<?php
	
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use backend\models\Lookup;
use yii\bootstrap\Modal;
?>
<style>
background-color:#fafafa;padding:2px;
</style>
 
						<?php $form = ActiveForm::begin([
										'id' => 'kelum-form', 
										'type' => ActiveForm::TYPE_HORIZONTAL,
										'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,'showLabels'=>false]
										]); 
							?>
						<?php

                        $list = ['Sakit' => 'Sakit', 'Batuk' => 'Batuk', 'Luka' => 'Luka', 'Lemah'=>'Lemah','Demam'=>'Demam','Gangguan_Makan/Minum'=>'Gangguan Makan/Minum',  'Gangguan_Penglihatan' => 'Gangguan Penglihatan',
                                 'Gangguan_Buang_Air_Besar'=>'Gangguan Buang Air Besar','Gangguan_Buang_Air_Kecil'=>'Gangguan Buang Air Kecil','Gangguan_Tenggorokan'=>'Gangguan Tenggorokan',
                                 'Gangguan_pada_Sendi'=>'Gangguan pada Sendi'
                            ];
                        $list2 = ['Masalah_pada_Kulit'=>'Masalah pada Kulit', 'Masalah_pada_Mata' => 'Masalah pada Mata', 'Masalah_pada_Telinga' => 'Masalah pada Telinga', 'Masalah_pada_Mulut'=>'Masalah pada Mulut','Kelainan_Suhu_Tubuh'=>'Kelainan Suhu Tubuh',
                                 'Masalah_pada_Hidung/Pernapasan'=>'Masalah pada Hidung/Pernapasan',
                                 'Masalah_pada_Jantung'=>'Masalah pada Jantung','Masalah_pada_Perut'=>'Masalah pada Perut','Masalah_Kewanitaan'=>'Masalah Kewanitaan',
                                 'Masalah_Reproduksi_Pria'=>'Masalah Reproduksi Pria','Lainnya'=>'Lainnya'
                            ]; 
                    ?>
					
                    <div class="col-sm-4">
                        <?= $form->field($model, 'keluhan')->radioList($list); ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'keluhan')->radioList($list2); ?>
                    </div>

<?php ActiveForm::end(); ?>
    <?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {  
        $('input[name=\"Anamnesa[keluhan]\"]').change(function () {
        $('#m_keluhanDetail').html('');
        $('#m_keluhanDetail').load(baseurl + '/Anamnesa/anamnesa/popup-keluhan?id='+".$model->id."+'&param='+$(this).val());
        $('#m_keluhanDetail').modal('show');

    });
    
    });");
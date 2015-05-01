<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\BaseHtml;
use backend\models\PemeriksaanFisik;
use yii\bootstrap\Modal;
use kartik\checkbox\CheckboxX;

?>

<?php $form = ActiveForm::begin([
                    'id' => 'kepalaPalpasi-form',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'type' => ActiveForm::TYPE_HORIZONTAL,
                    'formConfig' => [
                        'deviceSize' => ActiveForm::SIZE_SMALL,
                        'labelSpan' => 1,
                        'showLabels'=>false
                        
                    ]
                   
                    ]); 
        ?>

              <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kepala_palprambut_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Rambut :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kepala_palpasi_rambut')->dropDownList($model->optionsKepalaPalpasiRambut); ?>
            </div>
        </div>
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kepala_palpkulkep_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kulit Kepala :</label>
            <div class="col-md-4">
                <?php 
                $listPalpasiKulitKepala = ['Tidak ada benjolan'=>'Tidak ada benjolan','Benjolan'=>'Benjolan','Tidak ada nyeri tekan'=>'Tidak ada nyeri tekan','Nyeri tekan'=>'Nyeri tekan'];
                ?>
                        <?=    $form->field($model, 'kepala_palpasi_kulkep')->radioList($listPalpasiKulitKepala); ?>
            </div>
        </div>
      <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kepala_palpkuljah_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kulit Wajah :</label>
            <div class="col-md-4">
                <?php 
                $listPalpasiKulitWajah = ['Halus'=>'Halus','Kasar'=>'Kasar','Tidak ada benjolan'=>'Tidak ada benjolan','Benjolan'=>'Benjolan','Tidak ada nyeri tekan'=>'Tidak ada nyeri tekan','Nyeri tekan'=>'Nyeri tekan'];
                ?>
                        <?=    $form->field($model, 'kepala_palpasi_kuljah')->radioList($listPalpasiKulitWajah); ?>
            </div>
        </div>
  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_kepalapalpasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div> 
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_kepalapalpasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#kepalaPalpasi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>


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
                    'id' => 'mulutPalpasi-form',
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
            <label for="kesadaran" class="col-md-2">Bibir :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list2 = ['' => '','Benjolan' => 'Benjolan','Nyeri tekan' => 'Nyeri tekan',
                            ];
                        $list = ['NORMAL' => 'NORMAL','Tidak ada benjolan'=>'Tidak ada benjolan','Tidak ada nyeri tekan'=>'Tidak ada nyeri tekan',
                            ];
                 ?>
             <?=    $form->field($model, 'mulut_palpasi_bibir')->radioList($list); ?></div>
     
      <div class="col-md-4">
               
             <?=    $form->field($model, 'mulut_palpasi_bibir')->radioList($list2); ?></div>
           
         
 </div>

<div class="form-group">
            <label for="kesadaran" class="col-md-2">Mukosa Oral :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list2 = ['' => '','Benjolan' => 'Benjolan','Nyeri tekan' => 'Nyeri tekan',
                            ];
                        $list = ['NORMAL' => 'NORMAL','Tidak ada benjolan'=>'Tidak ada benjolan','Tidak ada nyeri tekan'=>'Tidak ada nyeri tekan',
                            ];
                 ?>
             <?=    $form->field($model, 'mulut_palpasi_mukosa')->radioList($list); ?></div>
     
      <div class="col-md-4">
               
             <?=    $form->field($model, 'mulut_palpasi_mukosa')->radioList($list2); ?></div>
           
         
 </div>

<div class="form-group">
            <label for="kesadaran" class="col-md-2">Lidah :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list2 = ['' => '','Benjolan' => 'Benjolan','Nyeri tekan' => 'Nyeri tekan',
                            ];
                        $list = ['NORMAL' => 'NORMAL','Tidak ada benjolan'=>'Tidak ada benjolan','Tidak ada nyeri tekan'=>'Tidak ada nyeri tekan',
                            ];
                 ?>
             <?=    $form->field($model, 'mulut_palpasi_lidah')->radioList($list); ?></div>
     
      <div class="col-md-4">
               
             <?=    $form->field($model, 'mulut_palpasi_lidah')->radioList($list2); ?></div>
           
         
 </div>



  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_mulutpalpasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div> 
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_mulutpalpasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#mulutPalpasi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>



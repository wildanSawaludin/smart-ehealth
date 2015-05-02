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
                    'id' => 'mulutInspeksi-form',
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
             <?=    $form->field($model, 'mulut_inspbibir_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> 
            <label for="kesadaran" class="col-md-2">Bibir :</label> 
             <div class="col-md-4">
                 <?php 
                 
                       
                        $list = ['NORMAL' => 'NORMAL','Sianosis'=>'Sianosis','Pucat'=>'Pucat','Kering'=>'Kering','Pecah-pecah'=>'Pecah-pecah','Keilosis'=>'Keilosis','Pembengkakan'=>'Pembengkakan','Kemerahan'=>'Kemerahan','Kecoklatan'=>'Kecoklatan','Lesi'=>'Lesi'
                            ];
                          $list2 = ['' => '','Tidak sianosis'=>'Tidak sianosis','Tidak pucat'=>'Tidak pucat','Tidak ada pembengkakan'=>'Tidak ada pembengkakan','Tidak kemerahan'=>'Tidak kemerahan','Tidak ada lesi'=>'Tidak ada lesi'
                            ];
                 ?>
             <?=    $form->field($model, 'mulut_inspeksi_bibir')->radioList($list); ?></div>
     
      <div class="col-md-4">
               
             <?=    $form->field($model, 'mulut_inspeksi_bibir')->radioList($list2); ?></div>
           
         
 </div>


<div class="form-group">
     <div class="col-md-1">
             <?=    $form->field($model, 'mulut_inspgusi_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> 
            <label for="kesadaran" class="col-md-2">Gusi :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list01 = ['NORMAL' => 'NORMAL','Luka' => 'Luka','Pendarahan'=>'Pendarahan',
                            ];
                     
                 ?>
             <?=    $form->field($model, 'mulut_inspeksi_gusi')->radioList($list01); ?></div>
     
      
</div>

<div class="form-group">
     <div class="col-md-1">
             <?=    $form->field($model, 'mulut_inspgigi_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> 
            <label for="kesadaran" class="col-md-2">Gigi :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list001 = ['Karies dentis' => 'Karies dentis','Jumlah gigi lengkap' => 'Jumlah gigi lengkap','Ompong'=>'Ompong',
                            ];
                     
                 ?>
             <?=    $form->field($model, 'mulut_inspeksi_gigi')->radioList($list001); ?></div>
     
      
</div>


  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_mulutinspeksi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div> 
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_mulutinspeksi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#mulutInspeksi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>



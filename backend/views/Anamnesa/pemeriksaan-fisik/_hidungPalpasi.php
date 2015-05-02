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
                    'id' => 'hidungPalpasi-form',
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
            <label for="kesadaran" class="col-md-2">Hidung, Sinus :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list = ['NORMAL' => 'NORMAL','Nyeri tekan' => 'Nyeri tekan','Bengkak' => 'Bengkak','Benjolan' => 'Benjolan', 
                            ];
                        $list2 = ['' => '','Tidak ada nyeri tekan'=>'Tidak ada nyeri tekan','Tidak bengkak'=>'Tidak bengkak','Tidak ada benjolan'=>'Tidak ada benjolan',
                            ];
                 ?>
             <?=    $form->field($model, 'hidung_palpasi_sinus')->radioList($list); ?></div>
     
      <div class="col-md-4">
               
             <?=    $form->field($model, 'hidung_palpasi_sinus')->radioList($list2); ?></div>
           
 </div>       
      

  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_hidungpalpasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div> 
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_hidungpalpasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#hidungPalpasi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>



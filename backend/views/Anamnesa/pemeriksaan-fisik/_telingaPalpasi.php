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
                    'id' => 'telingaPalpasi-form',
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
            <label for="kesadaran" class="col-md-2">Tragus :</label>
             <div class="col-md-2">
                 <?php 
                 
                        $list = ['NORMAL' => 'NORMAL', 'Nyeri tekan' => 'Nyeri tekan', 'Benjolan' => 'Benjolan'
                            ];
                           $list2 = ['' => '', 'Tidak ada nyeri tekan' => 'Tidak ada nyeri tekan', 'Tidak ada benjolan' => 'Tidak ada benjolan'
                            ];
                 ?>
             <?=    $form->field($model, 'telinga_palpasi_tragus')->radioList($list); ?></div>
              <div class="col-md-2">
               
             <?=    $form->field($model, 'telinga_palpasi_tragus')->radioList($list2); ?></div>
           
        </div>

  <div class="form-group">
            <label for="kesadaran" class="col-md-2">Mastoid :</label>
             <div class="col-md-2">
                 <?php 
                 
                          $list = ['NORMAL' => 'NORMAL', 'Nyeri tekan' => 'Nyeri tekan', 'Benjolan' => 'Benjolan'
                            ];
                           $list2 = ['' => '', 'Tidak ada nyeri tekan' => 'Tidak ada nyeri tekan', 'Tidak ada benjolan' => 'Tidak ada benjolan'
                            ];
                 ?>
             <?=    $form->field($model, 'telinga_palpasi_mastoid')->radioList($list); ?></div>
              <div class="col-md-2">
               
             <?=    $form->field($model, 'telinga_palpasi_mastoid')->radioList($list2); ?></div>
           
        </div>

  <div class="form-group">
            <label for="kesadaran" class="col-md-2">Aurikula :</label>
             <div class="col-md-2">
                 <?php 
                 
                          $list = ['NORMAL' => 'NORMAL', 'Nyeri tekan' => 'Nyeri tekan', 'Benjolan' => 'Benjolan','Massa/tumor'=>'Massa/tumor'
                            ];
                           $list2 = ['' => '', 'Tidak ada nyeri tekan' => 'Tidak ada nyeri tekan', 'Tidak ada benjolan' => 'Tidak ada benjolan','Tidak ada massa/tumor'=>'Tidak ada massa/tumor'
                            ];
                 ?>
             <?=    $form->field($model, 'telinga_palpasi_mastoid')->radioList($list); ?></div>
              <div class="col-md-2">
               
             <?=    $form->field($model, 'telinga_palpasi_mastoid')->radioList($list2); ?></div>
           
        </div>

  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_telingapalpasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>  
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_telingapalpasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#telingaPalpasi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>


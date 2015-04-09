<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\bootstrap\Modal;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $form = ActiveForm::begin([
                    'id' => 'anamnesaTerpimpinKemunculan-form',
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
    
    <div class="col-lg-4">
<?php

$rinci_kemunculan = ['Pagi hari' => 'Pagi hari', 'Siang hari' => 'Siang hari', 'Sore hari' => 'Sore hari', 'Malam hari'=>'Malam hari','Dini hari'=>'Dini hari','Bangun pagi'=>'Bangun pagi', 'Bangun tidur'=>'Bangun tidur','Saat makan'=>'Saat makan','Saat haid'=>'Saat haid','Lainnya'=> \yii\helpers\BaseHtml::textInput('lainnny_kemunculan')];
   
?>

 <?=                        $form->field($model, 'kel_kemunculan_saat')->radioList($rinci_kemunculan);    
//   \yii\helpers\BaseHtml::radioList('rinci_kemunculan',[] ,$rinci_kemunculan);
                   
                      
   ?>     
    </div>
</div>
<div class="form-group">
         <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitpopupkemunculan']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>
 <?php ActiveForm::end(); ?>
<?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {
   
       
$('input[name=\"rinci_kemunculan\"]').change(function () {
 
   if($('input[name=\"rinci_kemunculan\"]:checked').val() == 'Lainnya'){
    alert('test');
}
       
    });
 
   $('#submitpopupkemunculan').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#anamnesaTerpimpinKemunculan-form').serialize(),
        url  : 'save-keluhankarakter?id='+". $model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
    });
   
   

    });");
?>
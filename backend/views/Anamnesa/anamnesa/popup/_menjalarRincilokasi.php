<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\BaseHtml;


?>

  <?php $form = ActiveForm::begin([
                    'id' => 'menjalarRinciLokasi-form',
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
         <div class="col-lg-3">

                         
                            <?php 
                           
                            $rinci = Lookup::items2($dataLokasi,'lokum_sublokasi');
//                          
                            ?>
                             
             <?php 
            
             $variab = "keljalar_".strtolower($dataLokasi); ?>
                            <?= 
                            $form->field($model, $variab)->radioList($rinci);
                       ?>
            
                 </div>
   </div>
                <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitmenjalarrincilokasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>  
           
        <?php ActiveForm::end(); ?>
               

<?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {
   
       
   
 $('#submitmenjalarrincilokasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#menjalarRinciLokasi-form').serialize(),
        url  : 'save-keluhankarakter?id='+". $model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
    });
 

   
   

    });");
?>







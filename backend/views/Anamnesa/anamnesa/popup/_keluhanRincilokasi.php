<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\BaseHtml;


?>

  <?php $form = ActiveForm::begin([
                    'id' => 'keluhanRincilokasi-form',
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
  <?=   \yii\helpers\BaseHtml::activeHiddenInput($model, 'keluhan',['id'=>'id_datakeluhan','value'=>$_GET['keluhan']]); ?>     
<?=   \yii\helpers\BaseHtml::activeHiddenInput($model, 'keluhan_lokasi_umum',['id'=>'idrincilokasi','value'=>$dataLokasi]); ?>
                         
                            <?php 
                           
                            $rinci = Lookup::items($dataLokasi,'lokum_sublokasi');
//                            var_dump($rinci[1],$rinci[2],$rinci[3]);
//                            exit();
                            ?>
<div class="form-group">    <div class="col-sm-3"> 
                            <?= 
                          //  $form->field($model, 'faktor_resiko_kebiasaan')->radioList($rinci);
                            $form->field($model, 'keluhan_sub_lokasi')->radioList($rinci,[
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio"><label>';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . ucwords($label) .'" >';
                                    $return .= '' . ucwords($label) . '';
                                    $return .= '</label></div>';

                                    return $return;
                                }
                            ]); ?>
    </div></div>
                <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitrincilokasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>  
           
        <?php ActiveForm::end(); ?>


  <?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {
   
     
    
   $('#submitrincilokasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#keluhanRincilokasi-form').serialize(),
        url  : 'save-lokasiumum?id='+".$_GET['id'].",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
    
 
 

   
   

    });");
?>






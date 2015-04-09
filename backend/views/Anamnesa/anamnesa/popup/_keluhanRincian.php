<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;


?>
<div class="form-group">
  <?php $form = ActiveForm::begin([
                    'id' => 'keluhanRincian-form',
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
            <?=   \yii\helpers\BaseHtml::activeHiddenInput($model, 'keluhan',['id'=>'id_datakeluhan','value'=>$_GET['param']]); ?>   
            <div class="content">
                 <div  id="rinci">    
                            <?php 
                            $keluh = str_replace("_"," ",$_GET['param']);
                            $rinci = Lookup::items($keluh,'keluhan_rincian');
//                            var_dump($rinci[1],$rinci[2],$rinci[3]);
//                            exit();
                            ?>
                                 
                            <?= 
                          //  $form->field($model, 'faktor_resiko_kebiasaan')->radioList($rinci);
                            $form->field($model, 'keluhan_rincian')->radioList($rinci,[
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio"><label>';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . ucwords($label) . '" data-value="'.ucwords($label).'" >';
                                    $return .= '' . ucwords($label) . '';
                                    $return .= '</label></div>';

                                    return $return;
                                }
                            ]); ?>
                 </div>       
            </div>
     <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitkeluhan']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        <?php ActiveForm::end(); ?>
    
        
    </div>
<?php
//Yii::app()->clientScript->registerScriptFile(
  //  $this->getAssetsBase() . '/admin/js/popupRincian.js'
//);

//$this->registerJsFile('/admin/js/popupRincian.js', ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerJs("$(document).ready(function () {
   $('input[name=\"Anamnesa[keluhan_rincian]\"]').change(function () {
       $('#namakeluhan').val( $('input:radio[name=\"Anamnesa[keluhan_rincian]\"]:checked').attr('data-value'));
   }); 
   
   $('#submitkeluhan').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#keluhanRincian-form').serialize(),
        url  : 'save-keluhan?id='+".$_GET['id'].",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
    });


    });");
?>


  





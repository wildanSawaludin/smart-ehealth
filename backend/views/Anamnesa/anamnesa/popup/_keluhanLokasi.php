<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;


?>

  <?php $form = ActiveForm::begin([
                    'id' => 'keluhanLokasi-form',
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
         <?=   \yii\helpers\BaseHtml::activeHiddenInput($model, 'keluhan',['id'=>'id_datakeluhan','value'=>$_GET[0]['datakeluhan']]); ?>
           <div id="content-lokasi"class="tab-content">
           <div class="form-group">
         <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />         
            </div>
           </div>
    <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitlokasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>
  <?php ActiveForm::end(); ?>
<!--
<script src="/admin/js/popupLokasi.js"></script>  
!-->

<?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {
   
     $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : 'keluhan ='+$('#namakeluhan').val(),
        url  : 'lokasi-detail?datakeluhan2=\"".$_GET[0]['datakeluhan']."\"&id='+".$_GET[0]['id'].",
            success  : function(response) {
                $('#content-lokasi').html(response);
    }
    });
    
   $('#submitlokasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#keluhanLokasi-form').serialize(),
        url  : 'save-lokasi?id='+".$_GET[0]['id'].",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
    
 
 

   
   

    });");
?>



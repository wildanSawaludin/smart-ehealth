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
                    'id' => 'telingaUji-form',
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
              <label for="kesadaran" class="col-md-2">Suara bisik  </label>
             <div class="col-md-4">
               
             <?=    $form->field($model, 'telinga_uji_bisik')->dropDownList($model->optionsTelingaIUjiPendBisik); ?></div>
           
          
        </div>

 <div class="form-group">
              <label for="kesadaran" class="col-md-2">Garputala  </label>
             <div class="col-md-4">
             
             <?=    $form->field($model, 'telinga_uji_garputala')->dropDownList($model->optionsTelingaIUjiPendGarpu); ?></div>
           
          
        </div>

 <div class="form-group">
              <label for="kesadaran" class="col-md-2">Audiogram  </label>
             <div class="col-md-4">
             
             <?=    $form->field($model, 'telinga_uji_audiogram')->dropDownList($model->optionsTelingaIUjiPendAudio); ?></div>
           
          
        </div>
 <div class="form-group">
              <label for="kesadaran" class="col-md-2">Tympanogram  </label>
             <div class="col-md-4">
             
             <?=    $form->field($model, 'telinga_uji_tympanogram')->dropDownList($model->optionsTelingaIUjiPendTympa); ?></div>
           
          
        </div>
 <div class="form-group">
              <label for="kesadaran" class="col-md-2">Vestibulogram  </label>
             <div class="col-md-4">
             
             <?=    $form->field($model, 'telinga_uji_vestibulogram')->dropDownList($model->optionsTelingaIUjiPendVesti); ?></div>
           
          
        </div>
  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_telingauji']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div> 
 <?php ActiveForm::end(); ?>


<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_telingauji').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#telingaUji-form-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>

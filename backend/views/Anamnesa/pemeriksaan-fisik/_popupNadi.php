<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\BaseHtml;
use kartik\checkbox\CheckboxX;

?>

<div class="modal-body">
    <?php $form = ActiveForm::begin([
                    'id' => 'popupNadi-form',
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
             <?=    $form->field($model, 'nadi_irama_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Irama :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'nadi_irama')->dropDownList($model->optionsNadiIrama) ?>
            </div>
           
        </div>

  <div class="form-group">
       <div class="col-md-1">
             <?=    $form->field($model, 'nadi_kuang_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kuat Angkat :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'nadi_kuang')->dropDownList($model->optionsNadiKuang) ?>
            </div>
           
        </div>
  <div class="form-group">
       <div class="col-md-1">
             <?=    $form->field($model, 'nadi_kika_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kiri = Kanan :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'nadi_kika')->dropDownList($model->optionsNadiKika) ?>
            </div>
           
        </div>
      <div class="form-group">
       <div class="col-md-1">
             <?=    $form->field($model, 'nadi_amplitudo_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Amplitudo :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'nadi_amplitudo')->dropDownList($model->optionsNadiAmplitudo) ?>
            </div>
           
        </div>
      <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_popupnadi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>  
     <?php ActiveForm::end(); ?>
</div>


<?php

$this->registerJs("$(document).ready(function () {
   
       



     $('#submit_popupnadi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#popupNadi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
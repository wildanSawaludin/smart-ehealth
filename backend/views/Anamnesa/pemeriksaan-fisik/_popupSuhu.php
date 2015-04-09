<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\BaseHtml;
use kartik\checkbox\CheckboxX;

?>

<div class="modal-body">
    <?php $form = ActiveForm::begin([
                    'id' => 'popupSuhu-form',
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
             <?=    $form->field($model, 'suhu_axilla_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Axilla :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'suhu_axilla')->textInput(['maxlengrh'=>'5']) ?>
            </div>
             <label for="kesadaran" class="col-md-1">C</label>
        </div>

  <div class="form-group">
       <div class="col-md-1">
             <?=    $form->field($model, 'suhu_oral_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Oral :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'suhu_oral')->textInput(['maxlengrh'=>'5']) ?>
            </div>
             <label for="kesadaran" class="col-md-1">C</label>
        </div>
     <div class="form-group">
       <div class="col-md-1">
             <?=    $form->field($model, 'suhu_rectal_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Rectal :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'suhu_rectal')->textInput(['maxlengrh'=>'5']) ?>
            </div>
             <label for="kesadaran" class="col-md-1">C</label>
        </div>
   
     <?php ActiveForm::end(); ?>
</div>

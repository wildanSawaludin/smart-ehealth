<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\BaseHtml;
use kartik\checkbox\CheckboxX;

?>

<div class="modal-body">
    <?php $form = ActiveForm::begin([
                    'id' => 'popupPernapasan-form',
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
             <?=    $form->field($model, 'pernapasan_irama_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Irama :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'pernapasan_irama')->dropDownList($model->optionsPernapasan) ?>
            </div>
           
        </div>

 
     <?php ActiveForm::end(); ?>
</div>

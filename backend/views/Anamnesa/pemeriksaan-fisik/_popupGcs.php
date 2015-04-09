<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\BaseHtml;
?>

<div class="modal-body">
    <?php $form = ActiveForm::begin([
                    'id' => 'statusTerkiniGcs-form',
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
            <label for="kesadaran" class="col-md-3">Respon Buka Mata (E) :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'kesadaran_gcs_e')->dropDownList($model->optionsGcse); ?>
            </div>
        </div>
    
     <div class="form-group">
            <label for="kesadaran" class="col-md-3">Respon Verbal (V) :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'kesadaran_gcs_v')->dropDownList($model->optionsGcsv); ?>
            </div>
        </div>
    
     <div class="form-group">
            <label for="kesadaran" class="col-md-3">Respon Motorik (M) :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'kesadaran_gcs_m')->dropDownList($model->optionsGcsm); ?>
            </div>
        </div>
     <?php ActiveForm::end(); ?>
</div>

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
                    'id' => 'kulitPalpasi-form',
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
             <?=    $form->field($model, 'kulit_palptem_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Temperatur :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kulit_palpasi_temperatur')->dropDownList($model->optionsKulitPalpasiTemp); ?>
            </div>
        </div>
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kulit_palpteks_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Tekstur :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kulit_palpasi_tekstur')->dropDownList($model->optionsKulitPalpasiTeks); ?>
            </div>
        </div>

 <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kulit_palptur_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Turgor :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kulit_palpasi_turgor')->dropDownList($model->optionsKulitPalpasiTur); ?>
            </div>
        </div>
 
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
   


   
   

    });");
?>


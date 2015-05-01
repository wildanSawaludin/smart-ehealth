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
                    'id' => 'kulitInspeksi-form',
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
             <?=    $form->field($model, 'kulit_inspwarna_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Warna :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kulit_inspeksi_warna')->dropDownList($model->optionsKulitWarna); ?>
            </div>
        </div>
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kulit_insplembab_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kelembaban :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kulit_inspeksi_kelembaban')->dropDownList($model->optionsKulitKelembaban); ?>
            </div>
        </div>
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kulit_insplesi_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Lesi :</label>
          
        </div>
  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_kulitinspeksi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>  
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_kulitinspeksi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#kulitInspeksi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>


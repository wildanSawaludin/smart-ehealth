<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\BaseHtml;
use kartik\checkbox\CheckboxX;

?>

<div class="modal-body">
    <?php $form = ActiveForm::begin([
                    'id' => 'popupTinggiBadan-form',
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
             <?=    $form->field($model, 'tb_lengan_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Lingkar Lengan :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'tb_lengan_nil')->textInput(['maxlengrh'=>'5']) ?>
            </div>
             <label for="kesadaran" class="col-md-1">cm</label>
        </div>

  <div class="form-group">
       <div class="col-md-1">
             <?=    $form->field($model, 'tb_kepala_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Lingkar Kepala :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'tb_kepala_nil')->textInput(['maxlengrh'=>'5']) ?>
            </div>
             <label for="kesadaran" class="col-md-1">cm</label>
        </div>
     <div class="form-group">
       <div class="col-md-1">
             <?=    $form->field($model, 'tb_dada_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Lingkar Dada :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'tb_dada_nil')->textInput(['maxlengrh'=>'5']) ?>
            </div>
             <label for="kesadaran" class="col-md-1">cm</label>
        </div>
     <div class="form-group">
       <div class="col-md-1">
             <?=    $form->field($model, 'tb_perut_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Lingkar Perut :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'tb_perut_nil')->textInput(['maxlengrh'=>'5']) ?>
            </div>
             <label for="kesadaran" class="col-md-1">cm</label>
        </div>
    <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_popuptinggibadan']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>
     <?php ActiveForm::end(); ?>
</div>
<?php

$this->registerJs("$(document).ready(function () {
   

     $('#submit_popuptinggibadan').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#popupTinggiBadan-form').serialize(),
        url  : 'save-tinggibadan?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>


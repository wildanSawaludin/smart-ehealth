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
                    'id' => 'mataUji-form',
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
           
            <label for="kesadaran" class="col-md-4">Dekstra (Kanan)</label>
            <label for="kesadaran" class="col-md-3"></label>
            <label for="kesadaran" class="col-md-4">Sinistra (Kiri)</label>
          
           
        </div>

   <div class="form-group">
           
             <div class="col-md-1">
               
             <?=    $form->field($model, 'mata_ujivisus_kanan1')->textInput(); ?></div>
         <label for="kesadaran" class="col-md-2">/ </label>
        <div class="col-md-1">
               
             <?=    $form->field($model, 'mata_ujivisus_kanan2')->textInput(); ?></div>
           
            <label for="kesadaran" class="col-md-3">Uji Visus </label>
            <div class="col-md-1">
               
             <?=    $form->field($model, 'mata_ujivisus_kiri1')->textInput(); ?></div>
         <label for="kesadaran" class="col-md-2">/ </label>
        <div class="col-md-1">
               
             <?=    $form->field($model, 'mata_ujivisus_kiri1')->textInput(); ?></div>
</div>
  <div class="form-group">
           
             <div class="col-md-4">
               
             <?=    $form->field($model, 'mata_ujifront_kanan')->dropDownList($model->optionsMataUjiKonf); ?></div>
           
            <label for="kesadaran" class="col-md-3">Uji Konfrontasi </label>
              <div class="col-md-4">
            
             <?=    $form->field($model, 'mata_ujifront_kiri')->dropDownList($model->optionsMataUjiKonf); ?></div>
        </div>

  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_matapalpasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div> 
 <?php ActiveForm::end(); ?>


<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_matapalpasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#mataPalpasi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>

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
                    'id' => 'mataPalpasi-form',
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
           
             <div class="col-md-4">
                 <?php 
                 
                        $list = ['Benjolan' => 'Benjolan', 'Nyeri tekan' => 'Nyeri tekan', 'Bola mata teraba lunak' => 'Bola mata teraba lunak', 'Massa/tumor'=>'Massa/tumor','Tidak ada benjolan'=>'Tidak ada benjolan','Tidak ada nyeri tekan'=>'Tidak ada nyeri tekan',
                                 'Tidak ada massa/tumor'=>'Tidak ada massa/tumor'
                            ];
                 ?>
             <?=    $form->field($model, 'mata_palpkel_kanan')->radioList($list); ?></div>
           
            <label for="kesadaran" class="col-md-3">Kelopak Mata </label>
              <div class="col-md-4">
            
             <?=    $form->field($model, 'mata_palpkel_kiri')->radioList($list); ?></div>
        </div>

  <div class="form-group">
           
             <div class="col-md-4">
               
             <?=    $form->field($model, 'mata_palpglan_kanan')->dropDownList($model->optionsMataPalpasi); ?></div>
           
            <label for="kesadaran" class="col-md-3">Glandula Preaurikuler </label>
              <div class="col-md-4">
            
             <?=    $form->field($model, 'mata_palpglan_kiri')->dropDownList($model->optionsMataPalpasi); ?></div>
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

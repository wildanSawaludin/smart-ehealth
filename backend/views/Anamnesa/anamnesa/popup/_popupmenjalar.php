<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\bootstrap\Modal;
use kartik\checkbox\CheckboxX;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="anamnesa-form">
<?php $form = ActiveForm::begin([
                    'id' => 'popupMenjalar-form',
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
             <?=    $form->field($model, 'keljalar_kepala_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Kepala','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Kepala </label>
          
        </div>
  <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_wajah_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Wajah','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Wajah </label>
          
        </div>

 <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_mata_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Mata','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Mata </label>
          
        </div>

      <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_hidung_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Hidung','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Hidung </label>
          
        </div> 

   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_mulut_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Mulut','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Mulut </label>
          
        </div>   
<div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_telinga_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Telinga','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Telinga </label>
          
        </div>   
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_leher_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Leher','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Leher </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_tenggorokan_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Tenggorokan','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Tenggorokan </label>
             </div>
  
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_bahu_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Bahu','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Bahu </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_tangan_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Tangan','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Tangan </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_dada_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Dada','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Dada </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_perut_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Perut','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Perut </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_pinggang_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Pinggang','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Pinggang </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_punggung_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Punggung','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Punggung </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_kelamin_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Kelamin','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Kelamin </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_kaki_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Kaki','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Kaki </label>
          
        </div> 
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'keljalar_seltub_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false],'options'=>['data-value'=>'Seltub','class'=>'checkboxmenjalar']]); ?></div> <label for="kesadaran" class="col-md-2"> Seluruh Tubuh </label>
          
        </div> 
  <div class="form-group">
         <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitpopupmenjalar']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div> 
<?php
/*
$rinci_menjalar = ['Kepala' => 'Kepala', 'Wajah' => 'Wajah', 'Mata' => 'Mata', 'Hidung'=>'Hidung','Mulut'=>'Mulut','Telinga'=>'Telinga', 'Leher'=>'Leher','Tenggorokan'=>'Tenggorokan','Bahu'=>'Bahu', 'Tangan'=>'Tangan','Dada'=>'Dada','Perut'=>'Perut','Pinggang'=>'Pinggang', 'Punggung'=>'Punggung','Kelamin'=>'Kelamin','Kaki'=>'Kaki', 'Seluruh Badan'=>'Seluruh Badan'];
   
?>

 <?=                            
   $form->field($model, 'keluhan_menjalar_pil')->radioList($rinci_menjalar);
//\yii\helpers\BaseHtml::activeRadioList($model, 'keluhan_menjalar_pil',$rinci_menjalar);
                   
       */               
   ?>     
  
 <?php ActiveForm::end(); ?></div>
<?php

    Modal::begin([
            'id' => 'm_lokasimenjalarrinci',
             'size' => 'modal-lg',
             'header' => 'Rincian',
        ]);
 
    echo "<div  id='modalMenjalarlokasirinci'></div>";
 
    Modal::end();



?> 

<?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {
   
       
$('.checkboxmenjalar').change(function(){

if($(this).val() =='1'){

         $('#m_lokasimenjalarrinci').modal('show').find('#modalMenjalarlokasirinci').load(baseurl + '/Anamnesa/anamnesa/popup-rincilokasijalar?id='+".$_GET['id']."+'&param='+$(this).attr('data-value'));
         
 
}
});

   
 $('#submitpopupmenjalar').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#popupMenjalar-form').serialize(),
        url  : 'save-keluhankarakter?id='+". $model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
    });
 

   
   

    });");
?>



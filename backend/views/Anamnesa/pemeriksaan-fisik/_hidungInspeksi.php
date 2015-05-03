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
                    'id' => 'hidungInspeksi-form',
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
            <label for="kesadaran" class="col-md-2">Hidung Luar :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list = ['Lurus' => 'Lurus','Kemerahan'=>'Kemerahan','Bengkak' => 'Bengkak','Pernapasan cuping hidung' => 'Pernapasan cuping hidung','Sianosis'  =>'Sianosis'
                            ];
                        $list2 = ['' => '','Tidak ada Kemerahan'=>'Tidak ada Kemerahan','Tidak bengkak' => 'Tidak bengkak','Tidak ada pernapasan cuping hidung' => 'Tidak ada pernapasan cuping hidung','Tidak sianosis'  =>'Tidak sianosis'
                            ];
                 ?>
             <?=    $form->field($model, 'hidung_inspeksi_luar')->radioList($list); ?></div>
     
      <div class="col-md-4">
               
             <?=    $form->field($model, 'hidung_inspeksi_luar')->radioList($list2); ?></div>
           
         
 </div>

<div class="form-group">
            <label for="kesadaran" class="col-md-2">Mukosa Nasal :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list01 = ['NORMAL' => 'NORMAL','Bengkak' => 'Bengkak','Kemerahan'=>'Kemerahan','Perdarahan' =>'Perdarahan','Polip'=>'Polip','Pucat'=>'Pucat','Ulkus'=>'Ulkus',
                            ];
                        $list02 = ['' => '','Tidak bengkak' => 'Tidak bengkak','Tidak kemerahan'=>'Tidak kemerahan','Tidak ada perdarahan' =>'Tidak ada perdarahan','Tidak ada polip'=>'Tidak ada polip','Tidak pucat'=>'Tidak pucat','Tidak ada ulkus'=>'Tidak ada ulkus',
                            ];
                 ?>
             <?=    $form->field($model, 'hidung_inspeksi_mukosa')->radioList($list01); ?></div>
     
      <div class="col-md-4">
               
             <?=    $form->field($model, 'hidung_inspeksi_mukosa')->radioList($list02); ?></div>
           
         
 </div>

<div class="form-group">
            <label for="kesadaran" class="col-md-2">Septum Nasal :</label> 
             <div class="col-md-4">
                 <?php 
                 
                        $list001 = ['NORMAL' => 'NORMAL','Deviasi' => 'Deviasi','Perforasi'=>'Perforasi',
                            ];
                     
                 ?>
             <?=    $form->field($model, 'hidung_inspeksi_septum')->radioList($list001); ?></div>
     
      
</div>

  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_hidunginspeksi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div> 
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_hidunginspeksi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#hidungInspeksi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>



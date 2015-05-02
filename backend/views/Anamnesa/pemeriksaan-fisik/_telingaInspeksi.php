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
                    'id' => 'telingaInspeksi-form',
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
           <label for="kesadaran" class="col-md-2">Aurikula :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'telinga_inspeksi_aurikula')->dropDownList($model->optionsTelingaInsAurikula); ?>
            </div>
        </div>
  
    <div class="form-group">
            <label for="kesadaran" class="col-md-2">Liang Telinga :</label>
             <div class="col-md-2">
                 <?php 
                 
                        $list = ['Serumen' => 'Serumen', 'Bengkak' => 'Bengkak', 'Eritema' => 'Eritema'
                            ];
                           $list2 = ['' => '', 'Tidak bengkak' => 'Bengkak', 'Tidak eritema' => 'Tidak eritema'
                            ];
                 ?>
             <?=    $form->field($model, 'telinga_inspeksi_liang')->radioList($list); ?></div>
              <div class="col-md-2">
               
             <?=    $form->field($model, 'telinga_inspeksi_liang')->radioList($list2); ?></div>
           
        </div>

  <div class="form-group">
            <label for="kesadaran" class="col-md-2">Gendang Telinga :</label>
             <div class="col-md-2">
                 <?php 
                 
                        $list = ['NORMAL' => 'NORMAL', 'Benjolan' => 'Benjolan', 'Kemerahan' => 'Kemerahan','Perforasi'=>'Perforasi','Bercak putih'=>'Bercak putih'
                            ];
                            $list2 = ['' => '', 'Tidak ada benjolan' => 'Tidak ada benjolan', 'Tidak ada kemerahan' => 'Tidak ada kemerahan','Tidak ada perforasi'=>'Tidak ada perforasi','Tidak ada bercak putih'=>'Tidak ada bercak putih'
                            ];
                 ?>
             <?=    $form->field($model, 'telinga_inspeksi_gendang')->radioList($list); ?></div>
              <div class="col-md-2">
               
             <?=    $form->field($model, 'telinga_inspeksi_gendang')->radioList($list2); ?></div>
           
        </div>

  <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_telingainspeksi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>  
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
  
     $('#submit_telingainspeksi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#telingaInspeksi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>


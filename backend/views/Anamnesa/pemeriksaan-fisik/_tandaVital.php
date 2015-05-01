<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\BaseHtml;
use backend\models\PemeriksaanFisik;
use yii\bootstrap\Modal;

?>

<?php $form = ActiveForm::begin([
                    'id' => 'tandaVital-form',
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
            <label for="kesadaran_umum" class="col-md-3">Tekanan Darah :</label>
            <div class="col-md-2">
                
                          <?=    $form->field($model, 'ttv_td_dias')->textInput(['maxlength'=>'3']); ?>
            </div>
             <label for="kesadaran_umum" class="col-md-1">/</label>
              <div class="col-md-2">
                
                          <?=    $form->field($model, 'ttv_td_sis')->textInput(['maxlength'=>'3']); ?>
            </div>
              <label for="kesadaran_umum" class="col-md-2">mm/Hg</label>
        </div>
 <div class="form-group">
            <label for="kesadaran" class="col-md-3">Nadi :</label>
             <div class="col-md-2">
                
                          <?=    $form->field($model, 'ttv_nadi')->textInput(['maxlength'=>'3']); ?>
            </div>
            <label for="kesadaran_umum" class="col-md-2">x/menit</label>
        </div>
<div class="form-group">
            <label for="kesadaran" class="col-md-3">Pernapasan :</label>
             <div class="col-md-2">
                
                          <?=    $form->field($model, 'ttv_pernapasan')->textInput(['maxlength'=>'3']); ?>
            </div>
            <label for="kesadaran_umum" class="col-md-2">x/menit</label>
        </div>
<div class="form-group">
            <label for="kesadaran" class="col-md-3">Suhu :</label>
             <div class="col-md-2">
                
                          <?=    $form->field($model, 'ttv_suhu')->textInput(['maxlength'=>'3']); ?>
            </div>
            <label for="kesadaran_umum" class="col-md-2">&deg;C</label>
        </div>
 <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_tandavital']) ?>
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        <?php if(Yii::$app->user->can('Perawat')){ ?>
        <?= Html::a('Selesai', ['exit','id' => $model->registrasi_id], ['class'=>'btn btn-primary']) ?>
        <?php } ?>
    </div>  
 <?php ActiveForm::end(); ?>
<?php

    Modal::begin([
            'id' => 'm_Nadi',
             'size' => 'modal-lg',
             'header'=>'
   Nadi
       '
        ]);
 
    echo "<div id='modalNadi'></div>";
 
    Modal::end();



?> 
<?php

    Modal::begin([
            'id' => 'm_Pernapasan',
             'size' => 'modal-lg',
             'header'=>'
   Pernapasan
       '
        ]);
 
    echo "<div id='modalPernapasan'></div>";
 
    Modal::end();



?> 

<?php

    Modal::begin([
            'id' => 'm_Suhu',
             'size' => 'modal-lg',
             'header'=>'
   Suhu
       '
        ]);
 
    echo "<div id='modalSuhu'></div>";
 
    Modal::end();



?> 

<?php

$this->registerJs("$(document).ready(function () {
   
$('#pemeriksaanfisik-ttv_nadi').change(function(){
     $('#m_Nadi').modal('show').find('#modalNadi').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-nadi?id=".$model->id."');
});

$('#pemeriksaanfisik-ttv_pernapasan').change(function(){
     $('#m_Pernapasan').modal('show').find('#modalPernapasan').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-pernapasan?id=".$model->id."');
});

$('#pemeriksaanfisik-ttv_suhu').change(function(){
     $('#m_Suhu').modal('show').find('#modalSuhu').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-suhu?id=".$model->id."');
});
      
  $('#submit_tandavital').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#tandaVital-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
    });");
?>


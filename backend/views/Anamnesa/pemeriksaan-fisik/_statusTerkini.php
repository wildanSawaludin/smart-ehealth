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
                    'id' => 'statusTerkini-form',
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
            <label for="kesadaran_umum" class="col-md-4">Kesadaran Umum :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'st_keadaan_umum')->dropDownList($model->options); ?>
            </div>
        </div>
 <div class="form-group">
            <label for="kesadaran" class="col-md-4">Kesadaran :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'st_kesadaran')->dropDownList($model->optionsKesadaran); ?>
            </div>
        </div>
  <?php 
                       
                       
                       if($pasien->jenkel == "Perempuan" && $registrasi->kategoriUsia == "2"){ ?>
<div class="form-group">
            <label for="kesadaran" class="col-md-4">Keadaan  Khusus :</label>
            <div class="col-md-2">
                
                     
                              <?=    $form->field($model, 'keterangan_khusus')->dropDownList($model->optionsKeteranganKhusus); ?>
                      
                
            </div>
        </div>
 <?php } ?>
<div class="form-group">
            <label for="kesadaran" class="col-md-4">Berat Badan :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'st_bb')->textInput(['maxlength'=>'5']); ?>
            </div>
        </div>
<div class="form-group">
            <label for="kesadaran" class="col-md-4">Tinggi Badan :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'st_tb')->textInput(['maxlength'=>'5']); ?>
            </div>
        </div>

<div class="form-group">
            <label for="kesadaran" class="col-md-4">Indeks Massa Tubuh(IMT) :</label>
            <div class="col-md-2">
                
                         <?=    $form->field($model, 'imt')->textInput(['disabled'=>true]); ?>
            </div>
        </div>

<div class="form-group">
            <label for="kesadaran" class="col-md-4">Kesadaran :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'st_status_gizi')->dropDownList($model->optionsStatusgizi); ?>
            </div>
        </div>

<div class="form-group">
            <label for="kesadaran" class="col-md-4">Kesadaran :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'st_habitus')->dropDownList($model->optionsHabitus); ?>
            </div>
        </div>
    <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_statusterkini']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>  
 <?php ActiveForm::end(); ?>
<?php

    Modal::begin([
            'id' => 'm_Gcs',
             'size' => 'modal-lg',
             'header'=>'
   Glasgow Comma Scale (GCS)
       '
        ]);
 
    echo "<div id='modalGcs'></div>";
 
    Modal::end();



?> 

<?php

    Modal::begin([
            'id' => 'm_TinggiBadan',
             'size' => 'modal-lg',
          
        ]);
 
    echo "<div id='modalTinggiBadan'></div>";
 
    Modal::end();



?> 
<?php

$this->registerJs("$(document).ready(function () {
   
       
$('#pemeriksaanfisik-st_kesadaran').blur(function () {
 

      $('#m_Gcs').modal('show').find('#modalGcs').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-gcs?id=".$model->id."');
    });
 

$('#pemeriksaanfisik-st_tb').blur(function () {
        var bb = $('#pemeriksaanfisik-st_bb').val();
        var tb = $('#pemeriksaanfisik-st_tb').val();
        if(bb == ''){
        bb =1;
        }
        if(tb == ''){
        tb =1;
        }
        var tb2 = Math.pow((tb/100),2);
       $('#pemeriksaanfisik-imt').val((bb/tb2).toFixed(1));
      
      $('#m_TinggiBadan').modal('show').find('#modalTinggiBadan').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-tinggibadan?id=".$model->id."');
    });

     $('#submit_statusterkini').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#statusTerkini-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});
   

    });");
?>


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
                    'id' => 'fisikEvaluasi-form',
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
             <?=    $form->field($model, 'evaluasi_kulit_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kulit :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_kulit')->dropDownList($model->optionsKulit); ?>
            </div>
        </div>
 <div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_kepala_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kepala :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_kepala')->dropDownList($model->optionsKepala); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_mata_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Mata :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_mata')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_telinga_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Telinga :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_telinga')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_hidung_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Hidung  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_hidung')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_mulut_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Mulut, Faring  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_mulut')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_leher_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Leher  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_leher')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_punggung_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Punggung  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_punggung')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_thopar_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Thoraks, Paru  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_thoraks_paru')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_jantung_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Jantung  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_jantung')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_payudara_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Payudara  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_payudara')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_abdomen_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Abdomen  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_abdomen')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_genitalia_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Genitalia  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_genitalia')->dropDownList($model->optionsMata); ?>
            </div>
        </div>

<div class="form-group">
           <div class="col-md-1">
             <?=    $form->field($model, 'evaluasi_ekstrimitas_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Ekstrimitas  :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'evaluasi_ekstrimitas')->dropDownList($model->optionsMata); ?>
            </div>
        </div>
 <div class="form-group">
        <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submit_pemerevaluasi']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div> 
 <?php ActiveForm::end(); ?>
<?php

    Modal::begin([
            'id' => 'm_Kulit',
             'size' => 'modal-lg',
             'header'=>'
   Kulit
       '
        ]);
 
    echo "<div id='modalKulit'></div>";
 
    Modal::end();



?> 

<?php

    Modal::begin([
            'id' => 'm_Kepala',
             'size' => 'modal-lg',
             'header'=>'
   Kepala
       '
        ]);
 
    echo "<div id='modalKepala'></div>";
 
    Modal::end();



?> 

<?php

    Modal::begin([
            'id' => 'm_Mata',
             'size' => 'modal-lg',
             'header'=>'
   Mata
       '
        ]);
 
    echo "<div id='modalMata'></div>";
 
    Modal::end();



?> 

<?php

$this->registerJs("$(document).ready(function () {
   
 $('#submit_pemerevaluasi').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#fisikEvaluasi-form').serialize(),
        url  : 'save-statusterkini?id='+".$model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
});


$('#pemeriksaanfisik-evaluasi_kulit').change(function(){
     $('#m_Kulit').modal('show').find('#modalKulit').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-kulit?id=".$model->id."');
});

$('#pemeriksaanfisik-evaluasi_kepala').change(function(){
     $('#m_Kepala').modal('show').find('#modalKepala').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-kepala?id=".$model->id."');
});


$('#pemeriksaanfisik-evaluasi_mata').change(function(){
     $('#m_Mata').modal('show').find('#modalMata').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-mata?id=".$model->id."');
});


      

    });");

/*
 * $('#pemeriksaanfisik-ttv_pernapasan').change(function(){
     $('#m_Pernapasan').modal('show').find('#modalPernapasan').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-pernapasan');
});

$('#pemeriksaanfisik-ttv_suhu').change(function(){
     $('#m_Suhu').modal('show').find('#modalSuhu').load(baseurl + '/Anamnesa/pemeriksaan-fisik/popup-suhu');
});
 */
?>


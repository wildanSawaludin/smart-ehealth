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
                    'id' => 'kepalaInspeksi-form',
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
             <?=    $form->field($model, 'kepala_inspben_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Bentuk Kepala :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kepala_inspeksi_bentuk')->dropDownList($model->optionsKepalaBentuk); ?>
            </div>
        </div>
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kepala_inspkul_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kulit Kepala :</label>
            <div class="col-md-4">
                <?php 
                $listKulitKepala = ['NORMAL'=>'NORMAL','Tidak ada benjolan'=>'Tidak ada benjolan','Benjolan'=>'Benjolan','Tidak ada lesi'=>'Tidak ada lesi','Lesi'=>'Lesi','Tidak ada ketombe'=>'Tidak ada ketombe','Ketombe'=>'Ketombe'];
                ?>
                        <?=    $form->field($model, 'kepala_inspeksi_kulit')->radioList($listKulitKepala); ?>
            </div>
        </div>
    <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kepala_inspwaram_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Warna Rambut :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kepala_inspeksi_waram')->dropDownList($model->optionsKepalaWarnaRambut); ?>
            </div>
        </div>
   <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kepala_inspkuaram_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Kuantitas Rambut :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kepala_inspeksi_kuaram')->dropDownList($model->optionsKepalaKuantitasRambut); ?>
            </div>
        </div>

 <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'kepala_inspbenjah_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?></div> <label for="kesadaran" class="col-md-2">Bentuk Wajah :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'kepala_inspesksi_benjah')->dropDownList($model->optionsKepalaBentukWajah); ?>
            </div>
        </div>
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
   


   
   

    });");
?>


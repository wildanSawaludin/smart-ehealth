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
                    'id' => 'mataInspeksi-form',
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
            <label for="kesadaran" class="col-md-1"></label>
            <label for="kesadaran" class="col-md-3">Dekstra (Kanan)</label>
            <label for="kesadaran" class="col-md-2"></label>
            <label for="kesadaran" class="col-md-3">Sinistra (Kiri)</label>
           
        </div>

              <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspposisi_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_posisi_kanan')->dropDownList($model->optionsMataPosisiKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Posisi </label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_posisi_kiri')->dropDownList($model->optionsMataPosisiKiri); ?>
            </div>
        </div>
  
  <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspkelopak_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_kelopak_kanan')->dropDownList($model->optionsMataKelopakKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Kelopak Mata </label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_kelopak_kiri')->dropDownList($model->optionsMataKelopakKiri); ?>
            </div>
        </div>
<div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspebra_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_palpebra_kanan')->dropDownList($model->optionsMataPalpebraKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Palpebra </label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_palpebra_kiri')->dropDownList($model->optionsMataPalpebraKiri); ?>
            </div>
        </div>

<div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspkonjung_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_konjungtiva_kanan')->dropDownList($model->optionsMataKonjungtivaKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Konjungtiva </label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_konjungtiva_kiri')->dropDownList($model->optionsMataKonjungtivaKiri); ?>
            </div>
        </div>
  <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspsklera_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_sklera_kanan')->dropDownList($model->optionsMataSkleraKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Sklera </label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_sklera_kiri')->dropDownList($model->optionsMataSkleraKiri); ?>
            </div>
        </div>
  <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspkornea_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_kornea_kanan')->dropDownList($model->optionsMataKorneaKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Kornea </label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_kornea_kiri')->dropDownList($model->optionsMataKorneaKiri); ?>
            </div>
        </div>
  <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspirlen_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_iris_kanan')->dropDownList($model->optionsMataIrisKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Iris / Lensa </label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_iris_kiri')->dropDownList($model->optionsMataIrisKiri); ?>
            </div>
        </div>

  <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_insppupil_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_pupil_kanan')->dropDownList($model->optionsMataPupilKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Pupil</label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_pupil_kiri')->dropDownList($model->optionsMataPupilKiri); ?>
            </div>
        </div>

  <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspretina_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_retina_kanan')->dropDownList($model->optionsMataRetinaKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Retina</label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_retina_kiri')->dropDownList($model->optionsMataRetinaKiri); ?>
            </div>
        </div>

  <div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspoeo_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_oeo_kanan')->dropDownList($model->optionsMataOeoKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Otot Ekstra Okuler</label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_oeo_kiri')->dropDownList($model->optionsMataOeoKiri); ?>
            </div>
        </div>

<div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspmekmus_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_mekmus_kanan')->dropDownList($model->optionsMataMekmusKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Mekanisme Muskular</label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_mekmus_kiri')->dropDownList($model->optionsMataMekmusKiri); ?>
            </div>
        </div>

<div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspreffun_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_reffun_kanan')->dropDownList($model->optionsMataReffunKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Refleks Fundus</label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_reffun_kiri')->dropDownList($model->optionsMataReffunKiri); ?>
            </div>
        </div>

<div class="form-group">
            <div class="col-md-1">
             <?=    $form->field($model, 'mata_inspdisop_pil')->widget(CheckboxX::classname(), ['pluginOptions'=>['threeState'=>false]]); ?>
            </div>
             <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_disop_kanan')->dropDownList($model->optionsMataDisopKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Diskus Optik</label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_disop_kiri')->dropDownList($model->optionsMataDisopKiri); ?>
            </div>
        </div>
 <?php ActiveForm::end(); ?>

<?php

$this->registerJs("$(document).ready(function () {
   


   
   

    });");
?>


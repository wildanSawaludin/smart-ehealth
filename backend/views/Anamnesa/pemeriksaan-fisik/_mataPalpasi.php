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
            <label for="kesadaran" class="col-md-1"></label>
            <label for="kesadaran" class="col-md-4">Sinistra (Kiri)</label>
           
        </div>

   <div class="form-group">
           
             <div class="col-md-4">
                
                         <?=    $form->field($model, 'mata_posisi_kanan')->dropDownList($model->optionsMataPosisiKanan); ?>
            </div>
            <label for="kesadaran" class="col-md-2">Posisi </label>
              <div class="col-md-3">
                
                         <?=    $form->field($model, 'mata_posisi_kiri')->dropDownList($model->optionsMataPosisiKiri); ?>
            </div>
        </div>
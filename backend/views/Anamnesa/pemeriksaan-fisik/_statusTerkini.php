<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\BaseHtml;
use backend\models\PemeriksaanFisik;

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
            <label for="jenis_kegiatan" class="col-md-4">Kesadaran Umum :</label>
            <div class="col-md-4">
                
                         <?=    $form->field($model, 'st_keadaan_umum')->dropDownList($model->options); ?>
            </div>
        </div>
 <?php ActiveForm::end(); ?>


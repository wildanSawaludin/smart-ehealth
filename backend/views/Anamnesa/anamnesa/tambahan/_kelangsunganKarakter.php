<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\BaseHtml;
use backend\models\Anamnesa;

?>

<?php $form = ActiveForm::begin([
                    'id' => 'keluhanSifatkelangsungan-form',
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
                 <div  class="col-lg-3">    
                            <?php 
                            $keluh = Anamnesa::findOne(['id'=>  $model->id ])->keluhan_rincian;   
                          
                            $rinci_karakter = Lookup::items2($keluh,'rincian_karakter');
                        
//                            var_dump($rinci[1],$rinci[2],$rinci[3]);
//                            exit();
                            ?>
                                 
                            <?= 
                            \yii\helpers\BaseHtml::radioList('kelangsungan_karakter',[],$rinci_karakter);
                         /*   $form->field($model, 'keluhan_rincian')->radioList($rinci,[
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio"><label>';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . ucwords($label) . '" data-value="'.ucwords($label).'" >';
                                    $return .= '' . ucwords($label) . '';
                                    $return .= '</label></div>';

                                    return $return;
                                }
                            ]);*/ ?>
                 </div>       
            </div>
 <?php ActiveForm::end(); ?>


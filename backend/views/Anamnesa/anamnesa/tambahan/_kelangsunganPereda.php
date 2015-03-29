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
                    'id' => 'sifatKelangsunganpereda-form',
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
                         //   $keluh = Anamnesa::findOne(['id'=>  $model->id ])->keluhan_rincian;   
                          
                           // $rinci_karakter = Lookup::items2($keluh,'rincian_karakter');
                        $rinci_pereda = ["Beristirahat"=>"Beristirahat","Bila makan"=>"Bila makan","Bila berbaring"=>"Bila berbaring","Ransangan dingin"=>"Ransangan dingin","Setelah kegiatan dihentikan"=>"Setelah kegiatan dihentikan","Setelah minum obat"=>"Setelah minum obat","Setelah minum susu hangat"=>"Setelah minum susu hangat","Setelah muntah"=>"Setelah muntah","Setelah buang air besar"=>"Setelah buang air besar","Lainnya"=> \yii\helpers\BaseHtml::textInput('lainnny_pereda')];
//                            var_dump($rinci[1],$rinci[2],$rinci[3]);
//                            exit();
                            ?>
                                 
                            <?= 
                            \yii\helpers\BaseHtml::radioList('kelangsungan_pereda',[],$rinci_pereda);
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


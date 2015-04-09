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
                 <div  class="col-lg-4">    
                            <?php 
                         //   $keluh = Anamnesa::findOne(['id'=>  $model->id ])->keluhan_rincian;   
                          
                           // $rinci_karakter = Lookup::items2($keluh,'rincian_karakter');
                        $rinci_pereda = ["Beristirahat"=>"Beristirahat","Bila makan"=>"Bila makan","Bila berbaring"=>"Bila berbaring","Ransangan dingin"=>"Ransangan dingin","Setelah kegiatan dihentikan"=>"Setelah kegiatan dihentikan","Setelah minum obat"=>"Setelah minum obat","Setelah minum susu hangat"=>"Setelah minum susu hangat","Setelah muntah"=>"Setelah muntah","Setelah buang air besar"=>"Setelah buang air besar","Lainnya"=> \yii\helpers\BaseHtml::textInput('lainnny_pereda')];
//                            var_dump($rinci[1],$rinci[2],$rinci[3]);
//                            exit();
                            ?>
                                 
                            <?= 
                        $form->field($model, 'keluhan_durasi_pereda')->radioList($rinci_pereda);
                       //    \yii\helpers\BaseHtml::radioList('kelangsungan_pereda',[],$rinci_pereda);
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
<div class="form-group">
         <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitkeluhanpereda']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>
 <?php ActiveForm::end(); ?>

<?php
$this->registerJs("$(document).ready(function () {
   
   
   $('#submitkeluhanpereda').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#sifatKelangsunganpereda-form').serialize(),
        url  : 'save-keluhankarakter?id='+". $model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
    });


    });");
?>

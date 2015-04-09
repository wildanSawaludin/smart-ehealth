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
                    'id' => 'sifatKelangsunganpemberat-form',
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
                        $rinci_pemberat = ["Saat berbaring"=>"Saat berbaring","Saat berbaring telentang"=>"Saat berbaring telentang","Saat berbaring ke sisi kanan tubuh"=>"Saat berbaring ke sisi kanan tubuh","Saat berbicara"=>"Saat berbicara","Saat berjalan"=>"Saat berjalan","Saat berkeringat"=>"Saat berkeringat","Saat membungkuk"=>"Saat membungkuk","Saat makan"=>"Saat makan","Saat memakai sepatu karet"=>"Saat memakai sepatu karet","Saat menggenggam"=>"Saat menggenggam","Saat menggelengkan kepala"=>"Saat menggelengkan kepala","Saat menggigit"=>"Saat menggigit","Saat mengunyah makanan keras"=>"Saat mengunyah makanan keras","Saat melakukan kegiatan fisik"=>"Saat melakukan kegiatan fisik","Saat telinga ditarik"=>"Saat telinga ditarik","Saat telinga ditekan"=>"Saat telinga ditekan","Setiap pergerakan tubuh"=>"Setiap pergerakan tubuh","Saat udara dingin"=>"Saat udara dingin","Saat musim panas"=>"Saat musim panas","Menjelang malam hari"=>"Menjelang malam hari","Perubahan Suhu"=>"Perubahan Suhu","Lainnya"=> \yii\helpers\BaseHtml::textInput('lainnny_pereda')];
//                            var_dump($rinci[1],$rinci[2],$rinci[3]);
//                            exit();
                            ?>
                                 
                            <?= 
                            $form->field($model, 'keluhan_durasi_pemberat')->radioList($rinci_pemberat);
                        ?>
                 </div>       
            </div>
<div class="form-group">
         <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitkeluhanpemberat']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>
 <?php ActiveForm::end(); ?>




<?php
$this->registerJs("$(document).ready(function () {
   
   
   $('#submitkeluhanpemberat').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#sifatKelangsunganpemberat-form').serialize(),
        url  : 'save-keluhankarakter?id='+". $model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
    });


    });");
?>

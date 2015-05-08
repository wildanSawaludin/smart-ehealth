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
                    'id' => 'keluhanKelangsunganKarakter-form',
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
                            if($model->keluhan_rincian != NULL){
                                $keluh = Anamnesa::findOne(['id'=>  $model->id ])->keluhan_rincian;  
                            }
                            if($model->keluhan_rincian == NUll && $model->keluhan_lokasi_umum){
                                $keluh = Anamnesa::findOne(['id'=>  $model->id ])->keluhan_lokasi_umum; 
                            }
                            
                            $rinci_karakter = Lookup::items2($keluh,'rincian_karakter');
                       
                            ?>
                                 
                            <?= 
                           $form->field($model, 'keluhan_durasi_jenis')->radioList($rinci_karakter);
                      ?>
                 </div>       
            </div>
<div class="form-group">
         <?= Html::Button('Submit', ['class' => 'btn btn-primary','id'=>'submitkeluhankarakter']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>
 <?php ActiveForm::end(); ?>

<?php
$this->registerJs("$(document).ready(function () {
   
   
   $('#submitkeluhankarakter').click(function(){
   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : $('#keluhanKelangsunganKarakter-form').serialize(),
        url  : 'save-keluhankarakter?id='+". $model->id.",
            success  : function(response) {
               alert('data berhasil disimpan');
    }
    });
    });


    });");
?>

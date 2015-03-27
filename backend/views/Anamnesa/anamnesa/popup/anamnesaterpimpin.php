<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;



/* @var $this yii\web\View */
/* @var $model app\models\Anamnesa */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="anamnesa-form">

    <?php $form = ActiveForm::begin([
                'id' => 'anamnesaterpimpin-form', 
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,
                                'showLabels'=>false]
                ]); 
    ?>
      
        <div class="content">
		    <div class="form-group">  
                        <label class="col-lg-4 control-label" for="lama_perlangsungan">Lama Perlangsungan :</label>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'keluhan_berlangsung_nil')->textInput(['maxlength'=>'2']); ?>
                       </div>
                        <div class="col-sm-2">
                             <?= $form->field($model, 'keluhan_berlangsung_lama')->dropDownList([ 'menit' => 'menit', 'jam' => 'jam', 'hari' => 'hari', 'minggu' => 'minggu','bulan'=>'bulan','tahun'=>'tahun' ]) ?>
                        </div>
                    </div>
                     <div class="form-group">  
                         <label class="col-lg-4 control-label" for="faktor_pencetus">Faktor Pencetus :</label>
                          <div class="col-sm-4">
                        
                        
                        <?= $form->field($model, 'keluhan_faktor_pencetus')->textInput()?>
                    </div>
                    </div>
                  
             <div class="form-group">    
                     <label class="col-lg-4 control-label" for="sifat_perlangsungan">Sifat Perlangsungan :</label>
                     <label class="col-lg-4 control-label" for="durasi">Durasi :</label>
                    <div class="col-sm-3">
                          <?= $form->field($model, 'keluhan_durasi_nil')->textInput(['maxlength'=>'2']); ?>
                       </div>
                        <div class="col-sm-2">
                             <?= $form->field($model, 'keluhan_durasi_lama')->dropDownList([ 'menit' => 'menit', 'jam' => 'jam', 'hari' => 'hari', 'minggu' => 'minggu','bulan'=>'bulan','tahun'=>'tahun' ]) ?>
                        </div>
                     
               
             </div>
            
               <div class="form-group">  
                         <label class="col-lg-4 control-label" for="frekuensi">Frekuensi :</label>
                          <div class="col-sm-4">
                        
                        
                        <?= $form->field($model, 'keluhan_durasi_jenis')->textInput()?>
                    </div>
                    </div>
            
             <div class="form-group">  
                         <label class="col-lg-4 control-label" for="frekuensi">Penyebaran :</label>
                          <div class="col-sm-4">
                        
                        
                        <?= $form->field($model, 'keluhan_durasi_jenis')->textInput()?>
                    </div>
                    </div>
             
        </div>
    <?php ActiveForm::end(); ?>

</div>

<script>var id = '<?php echo $_GET['id']; ?>' </script>  
<?php $this->registerJsFile('/admin/js/popupTerpimpin.js'); ?>


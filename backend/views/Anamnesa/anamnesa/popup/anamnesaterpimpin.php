<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\bootstrap\Modal;


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
                     <label class="col-lg-3 control-label" for="sifat_perlangsungan">Sifat Perlangsungan:</label>
                     <label class="col-lg-3 control-label" for="durasi">Durasi :</label>
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
                        <?php 
                        
             $rinci_lama = ['1' => 'Sepanjang Hari', '2' => 'Tidak Menentu', '3' => '1 kali sehari', '4'=>'2 kali sehari','5'=>'3 kali sehari','6'=>'>3 kali sehari', '7'=>'1 kali seminggu','8'=>'2 kali seminggu','9'=>'3 kali seminggu', '10'=>'> 3 kali seminggu'];
   
                        ?>
                        
                        <?= $form->field($model, 'keluhan_durasi_lama')->dropDownList($rinci_lama)?>
                    </div>
                    </div>
            
             <div class="form-group">  
                         <label class="col-lg-4 control-label" for="frekuensi">Penyebaran :</label>
                          <div class="col-sm-4">
                        
                        
                        <?= $form->field($model, 'keluhan_durasi_jenis')->radioList(['1'=>'Menjalar','2'=>'Tembus ke belakang']); ?>
                    </div>
                    </div>
            
            
              <div class="form-group">    
                     <label class="col-lg-3 control-label" for="sifat_perlangsungan">Puncak keluhan:</label>
                    
                    <div class="col-sm-3">
                          <?= $form->field($model, 'keluhan_durasi_nil')->textInput(['maxlength'=>'2']); ?>
                       </div>
                        <div class="col-sm-2">
                             <?= $form->field($model, 'keluhan_durasi_lama')->dropDownList([ 'menit' => 'menit', 'jam' => 'jam', 'hari' => 'hari', 'minggu' => 'minggu','bulan'=>'bulan','tahun'=>'tahun' ]) ?>
                        </div>
                     
               
             </div>
            
               <div class="form-group">  
                         <label class="col-lg-4 control-label" for="frekuensi">Kemunculan :</label>
                          <div class="col-sm-4">
                        <?php 
                        
         $kemunculan = ['Perlahan' => 'Perlahan', 'Berulang' => 'Berulang', 'Spontan/tiba-tiba' => 'Spontan/tiba-tiba'];
   
                        ?>
                        
                        <?= $form->field($model, 'kel_kemunculan')->dropDownList($kemunculan)?>
                          <?= $form->field($model, 'kel_kemunculan_saat')->hiddenInput()?>
                              
                    </div>
                    </div>
            
            
             <div class="form-group">    
                     <label class="col-lg-3 control-label" for="sifat_perlangsungan">Penjelasan:</label>
                     <label class="col-lg-3 control-label" for="durasi">Awalnya :</label>
                    <div class="col-sm-3">
                          <?= $form->field($model, 'kel_penjelasan_awal')->textInput(['maxlength'=>'2000']); ?>
                       </div>
                      
               
             </div>

            <div class="form-group">    
                     <label class="col-lg-3 control-label" for="durasi">Kemudian :</label>
                    <div class="col-sm-3">
                          <?= $form->field($model, 'kel_penjelasan_kemudian')->textInput(['maxlength'=>'2000']); ?>
                       </div>
                      
               
             </div>

            <div class="form-group">    
                     <label class="col-lg-3 control-label" for="durasi">Saat ini :</label>
                    <div class="col-sm-3">
                          <?= $form->field($model, 'kel_penjelasan_saat')->textInput(['maxlength'=>'2000']); ?>
                       </div>
                      
               
             </div>

            
        </div>
    <?php ActiveForm::end(); ?>

</div>
<?php

    Modal::begin([
            'id' => 'm_popupmenjalar',
             'size' => 'modal-lg',
        ]);
 
    echo "<div id='modalMenjalarrinci'></div>";
 
    Modal::end();



?>

<?php

    Modal::begin([
            'id' => 'm_popupkemunculan',
             'size' => 'modal-lg',
        ]);
 
    echo "<div id='modalKemunculanrinci'></div>";
 
    Modal::end();



?> 

<?php

    Modal::begin([
            'id' => 'm_popupperlangsungan',
             'size' => 'modal-lg',
        ]);
 
    echo "<div class='modal-body' id='modalPerlangsunganrinci'></div>";
 
    Modal::end();



?> 
<script>var id = '<?php echo $_GET['id']; ?>' </script>  
<?php //$this->registerJsFile('/admin/js/popupTerpimpin.js'); ?>
<?php 
/*
$this->registerJs("$(document).ready(function () {
   $('#anamnesa-keluhan_durasi_jenis').click(function () {
      //  if (this.checked) {
         
           $('#m_popupmenjalar').modal('show').find('#modalMenjalarrinci').load(baseurl + '/Anamnesa/anamnesa/popup-menjalar?id='+".$_GET['id'].");
            
        }
   }); 
   
   });");
*/

$this->registerJs("$(document).ready(function () {
  
     $('input[name=\"Anamnesa[keluhan_durasi_jenis]\"]').change(function () {
      if($('input[name=\"Anamnesa[keluhan_durasi_jenis]\"]:checked').val() == '1'){
           $('#m_popupmenjalar').modal('show').find('#modalMenjalarrinci').load(baseurl + '/Anamnesa/anamnesa/popup-menjalar?id='+".$_GET['id'].");
            }
       
   }); 
   
     $('#anamnesa-kel_kemunculan').change(function () {
      
           $('#m_popupkemunculan').modal('show').find('#modalKemunculanrinci').load(baseurl + '/Anamnesa/anamnesa/popup-kemunculan?id=".$_GET['id']."&param='+$(this).val());
            
       
   }); 
   
$('#anamnesa-keluhan_durasi_lama').change(function(){
 $('#m_popupperlangsungan').modal('show').find('#modalPerlangsunganrinci').load(baseurl + '/Anamnesa/anamnesa/sifat-kelangsungan?id=".$_GET['id']."');
});
   
   });");

?>


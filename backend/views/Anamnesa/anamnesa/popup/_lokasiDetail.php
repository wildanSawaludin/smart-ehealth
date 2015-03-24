<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use backend\models\Lookup;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\bootstrap\Modal;
use yii\helpers\BaseHtml;
//use kartik\popover\PopoverX;

?>
 
   <?=   \yii\helpers\BaseHtml::activeHiddenInput($model, 'keluhan_rincian',['id'=>'idkeluhan','value'=>$datakeluhan]); ?>
 <!--   <input type="text" name="idkeluhan" id="idkeluhan" value="<?php //echo $datakeluhan; ?>">!-->
    <?php 


if(!empty($datakeluhan)) { ?>
 <div class="tab-pane fade in active" id="rinci">    
                            <?php 
                           
                       //    echo "testttt".$datakeluhan;
                        //    echo "testttt".$datakeluhan."testtttttttttttt2".$this->datakeluhan2;
                           // $keluh = str_replace("_"," ",$datakeluhan);
                            $rinci = Lookup::items($datakeluhan,'rincian_lokasi');
                          //  var_dump($rinci);
//                            exit();
                            ?>
     
       <?= 
                          //  $form->field($model, 'faktor_resiko_kebiasaan')->radioList($rinci);
                          \yii\helpers\BaseHtml::activeRadioList($model, 'keluhan_lokasi',$rinci,[
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio"><label>';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . $label . '" >';
                                    $return .= '' . ucwords($label) . '';
                                    $return .= '</label></div>';

                                    return $return;
                                }
                            ]);
                            
           

                            ?>
                            
<?php } else {
    
             $rinci = ['Kepala' => 'Kepala', 'Wajah' => 'Wajah', 'Mata' => 'Mata', 'Hidung'=>'Hidung','Mulut'=>'Mulut','Telinga'=>'Telinga', 'Leher'=>'Leher','Tenggorokan'=>'Tenggorokan','Bahu'=>'Bahu', 'Tangan'=>'Tangan','Dada'=>'Dada','Perut'=>'Perut','Pinggang'=>'Pinggang', 'Punggung'=>'Punggung','Kelamin'=>'Kelamin','Kaki'=>'Kaki', 'Seluruh Tubuh'=>'Seluruh Tubuh'];
   
             
             
             ?>
    <div class="tab-pane fade in active" id="rinci">    

            
           
             <?= 
                          //  $form->field($model, 'faktor_resiko_kebiasaan')->radioList($rinci);
                          \yii\helpers\BaseHtml::activeRadioList($model, 'keluhan_lokasi_umum',$rinci,[
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio"><label>';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . $label . '" >';
                                    $return .= '' . ucwords($label) . '';
                                    $return .= '</label></div>';

                                    return $return;
                                }
                            ]);
                            
           

            
}       ?>     
                
                          
                 </div> 
     
<?php

    Modal::begin([
            'id' => 'm_lokasiDetail',
             'size' => 'modal-lg',
        ]);
 
    echo "<div id='modalContentrinci'></div>";
 
    Modal::end();



?>     
<?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {
   
       
$('input[name=\"Anamnesa[keluhan_lokasi_umum]\"]').change(function () {
 

         $('#m_lokasiDetail').modal('show').find('#modalContentrinci').load(baseurl + '/Anamnesa/anamnesa/popup-rincilokasi?id='+".$_GET['id']."+'&param='+$(this).val()+'&keluhan='+".$_GET['datakeluhan2'].");
            
    });
 

   
   

    });");
?>

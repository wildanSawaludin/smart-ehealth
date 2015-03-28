<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\bootstrap\Modal;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$rinci_menjalar = ['Kepala' => 'Kepala', 'Wajah' => 'Wajah', 'Mata' => 'Mata', 'Hidung'=>'Hidung','Mulut'=>'Mulut','Telinga'=>'Telinga', 'Leher'=>'Leher','Tenggorokan'=>'Tenggorokan','Bahu'=>'Bahu', 'Tangan'=>'Tangan','Dada'=>'Dada','Perut'=>'Perut','Pinggang'=>'Pinggang', 'Punggung'=>'Punggung','Kelamin'=>'Kelamin','Kaki'=>'Kaki', 'Seluruh Badan'=>'Seluruh Badan'];
   
?>

 <?=                            \yii\helpers\BaseHtml::activeRadioList($model, 'keluhan_menjalar_pil',$rinci_menjalar);
                   
                      
   ?>     

<?php

    Modal::begin([
            'id' => 'm_lokasimenjalar',
             'size' => 'modal-lg',
        ]);
 
    echo "<div id='modalMenjalardatarinci'></div>";
 
    Modal::end();



?> 

<?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {
   
       
$('input[name=\"Anamnesa[keluhan_menjalar_pil]\"]').change(function () {
 
   
         $('#m_lokasimenjalar').modal('show').find('#modalMenjalardatarinci').load(baseurl + '/Anamnesa/anamnesa/popup-rincilokasijalar?id='+".$_GET['id']."+'&param='+$(this).val());
          
    });
 

   
   

    });");
?>



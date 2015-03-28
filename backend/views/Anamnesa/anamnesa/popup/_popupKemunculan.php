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


$rinci_kemunculan = ['Pagi hari' => 'Pagi hari', 'Siang hari' => 'Siang hari', 'Sore hari' => 'Sore hari', 'Malam hari'=>'Malam hari','Dini hari'=>'Dini hari','Bangun pagi'=>'Bangun pagi', 'Bangun tidur'=>'Bangun tidur','Saat makan'=>'Saat makan','Saat haid'=>'Saat haid','Lainnya'=> ''];
   
?>

 <?=                            \yii\helpers\BaseHtml::radioList('rinci_kemunculan',[] ,$rinci_kemunculan);
                   
                      
   ?>     

<?php
//$this->registerJsFile('/admin/js/popupLokasi.js');
$this->registerJs("$(document).ready(function () {
   
       
$('input[name=\"rinci_kemunculan\"]').change(function () {
 
   if($('input[name=\"rinci_kemunculan\"]:checked').val() == 'Lainnya'){
    alert('test');
}
       
    });
 

   
   

    });");
?>
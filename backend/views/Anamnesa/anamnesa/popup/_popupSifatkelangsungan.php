<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\Url;



?>
<div class="anamnesa-form">

    
     <?php
    
    $items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Karakter/Jenis',
        'content'=>yii\base\View::render('_kelangsunganKarakter',['model'=>$model]),
        'active'=>true
    ],
        
        [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Peringan/Pereda',
        'content'=>yii\base\View::render('_kelangsunganPereda',['model'=>$model]),
       
    ],
        
          
        [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Pemberat',
        'content'=>yii\base\View::render('_kelangsunganPemberat',['model'=>$model]),
       
    ],
   
 

];
    
    echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false,
    'id'=>'tabs-sifatkelangsungan',
    'pluginOptions' =>  ['enableCache'=>false],
  //  'enableCache'=>false,
   //  'pluginEvents' => ["tabsX.beforeSend" => "$('#tabs-keluhanlokasi').on('tabsX.beforeSend', function (event) {
  //  alert('test);
//});"], 
]);
    ?>

</div> 
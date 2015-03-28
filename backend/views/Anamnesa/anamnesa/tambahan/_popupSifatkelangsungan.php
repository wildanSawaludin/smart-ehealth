<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\Url;



?>
<div class="modal-content" style="width: 700px;margin-left: 400px;margin-top: 100px">

    
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
   
 
   /* [
        'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Dropdown',
        'items'=>[
             [
                 'label'=>'<i class="glyphicon glyphicon-chevron-right"></i> Option 1',
                 'encode'=>false,
                 'content'=>'test4',
             ],
             [
                 'label'=>'<i class="glyphicon glyphicon-chevron-right"></i> Option 2',
                 'encode'=>false,
                 'content'=>'content4',
             ],
        ],
    ],*/
];
    
    echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false,
    'id'=>'tabs-kelangsungan',
    'pluginOptions' =>  ['enableCache'=>false],
  //  'enableCache'=>false,
   //  'pluginEvents' => ["tabsX.beforeSend" => "$('#tabs-keluhanlokasi').on('tabsX.beforeSend', function (event) {
  //  alert('test);
//});"], 
]);
    ?>

</div> 
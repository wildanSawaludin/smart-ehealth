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
        'label'=>'<i class="glyphicon glyphicon-home"></i> Inspeksi',
        'content'=>yii\base\View::render('_kepalaInspeksi',['model'=>$model]),
        'active'=>true
    ],
   [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Palpasi',
        'content'=>yii\base\View::render('_kepalaPalpasi',['model'=>$model])
       
    ],
  

];
    
    echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false,
    'id'=>'tabs-kepala',
    'pluginOptions' =>  ['enableCache'=>false],

]);
    ?>
    
  
    
</div>






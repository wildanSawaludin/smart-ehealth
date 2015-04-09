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
        'label'=>'<i class="glyphicon glyphicon-home"></i> Status Terkini',
        'content'=>yii\base\View::render('_statusTerkini',['model'=>$model]),
        'active'=>true
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Tanda tanda vital',
     //   'content'=>yii\base\View::render('_keluhanLokasi',['model'=>$model]),
        'id'=>'tabs-tandavital',
        'content'=>'<div id="tabtandavital"></div>',
        'linkOptions'=>['data-enable-cache'=>false,'data-url'=>\yii\helpers\Url::to(['/Anamnesa/pemeriksaan-fisik/tanda-vital','id'=>$model->id])],//,'datakeluhan'=>str_replace("_"," ",$_GET['param'])]])],
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Evaluasi',
     //   'content'=>yii\base\View::render('_keluhanLokasi',['model'=>$model]),
        'id'=>'tabs-evaluasi',
        'content'=>'<div id="tabevaluasi"></div>',
        'linkOptions'=>['data-enable-cache'=>false,'data-url'=>\yii\helpers\Url::to(['/Anamnesa/pemeriksaan-fisik/evaluasi','id'=>$model->id])],//,'datakeluhan'=>str_replace("_"," ",$_GET['param'])]])],
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
    'id'=>'tabs-pemeriksaanfisik',
    'pluginOptions' =>  ['enableCache'=>false],
  //  'enableCache'=>false,
   //  'pluginEvents' => ["tabsX.beforeSend" => "$('#tabs-keluhanlokasi').on('tabsX.beforeSend', function (event) {
  //  alert('test);
//});"], 
]);
    ?>
    
  
    
</div>






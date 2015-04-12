<?php


use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Anamnesa */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Resume',
]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anamnesa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="anamnesa-form">

    <?php
    
    $items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Anamnesa',
         'content'=>yii\base\View::render('_anamnesa',['modelAnamnesa'=>$modelAnamnesa]),
        'active'=>true,
       
    ],
   [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Pemeriksaan fisik',
         'content'=>yii\base\View::render('_pemeriksaanfisik',['modelPemeriksaanFisik'=>$modelPemeriksaanFisik]),
      //  'active'=>true,
       
    ],
   /* [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Diagnosa',
     //   'content'=>yii\base\View::render('_keluhanLokasi',['model'=>$model]),
     //   'id'=>'tabs-evaluasi',
        'content'=>'<div id="tab-resume-diagnosa"></div>',
        'linkOptions'=>['data-enable-cache'=>false,'data-url'=>\yii\helpers\Url::to(['/Anamnesa/pemeriksaan-fisik/evaluasi','id'=>$model->id])],//,'datakeluhan'=>str_replace("_"," ",$_GET['param'])]])],
    ],*/
  
   
];
    
    echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false,
    'id'=>'tabs-resumekesehatan',
    'pluginOptions' =>  ['enableCache'=>false],
  //  'enableCache'=>false,
   //  'pluginEvents' => ["tabsX.beforeSend" => "$('#tabs-keluhanlokasi').on('tabsX.beforeSend', function (event) {
  //  alert('test);
//});"], 
]);
    ?>
    
  
    
</div>







</div>
<?php
use kartik\tabs\TabsX;
use yii\helpers\Url;
use yii\web\View;

$items = [
    [
        'label'=>'Resep Obat Non-Racikan',
        'id' => 'obat-non-racikan',
        'content' => View::render('_obatNonRacikan',[
            'resepNonracikan' => $resepNonracikan
        ]),
        'active' => true,
        'linkOptions'=>['data-url'=>Url::to(['/diagnosa/tab-obat-non-racikan?id='.$_GET['id']])],
    ],
    [
        'label'=>'Resep Racikan',
        'id' => 'obat-racikan',
        'content' => View::render('_obatRacikan',[
            'resepRacikan' => $resepRacikan
        ])
    ],
];

echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false,
    'id'=>'tabs-resep-form',
    'pluginOptions' =>  ['enableCache'=>false],
]);
?>
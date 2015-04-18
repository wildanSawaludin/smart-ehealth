<?php
use kartik\tabs\TabsX;
use yii\helpers\Url;
use yii\web\View;

$items = [
    [
        'label'=>'Resep Obat Non-Racikan',
        'id' => 'obat-non-racikan-update',
        'content' => View::render('_obatNonRacikanUpdate',[
            'resepNonracikanIsi' => $resepNonracikanIsi,
            'resepNonracikanDetailIsi' => $resepNonracikanDetailIsi
        ]),
        'active' => true,
        'linkOptions'=>['data-url'=>Url::to(['/saran-anjuran/index?id='.$_GET['id']])],
    ],
    [
        'label'=>'Resep Racikan',
        'id' => 'obat-racikan-update',
        'content' => View::render('_obatRacikanUpdate',[
            'resepRacikan' => $resepRacikan
        ]),
        'linkOptions'=>['data-url'=>Url::to(['/saran-anjuran/resep-obat-racikan?id='.$_GET['id']])],
    ],
];

echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false,
    'id'=>'tabs-obat-update-form',
    'pluginOptions' =>  ['enableCache'=>false],
]);
?>
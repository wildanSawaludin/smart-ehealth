<?php
use kartik\tabs\TabsX;
use yii\helpers\Url;
use yii\web\View;

$items = [
    [
        'label'=>'Resep Obat Non-Racikan',
        'content' => View::render('_obatNonRacikanUpdate',[
            'resepNonracikanIsi' => $resepNonracikanIsi,
            'resepNonracikanDetailIsi' => $resepNonracikanDetailIsi
        ]),
        'active' => true,
        'linkOptions'=>['data-url'=>Url::to(['/saran-anjuran/index?id='.$_GET['id']])],
    ],
    [
        'label'=>'Resep Racikan',
        'content' => 'sdsds'
    ],
];

echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false
]);
?>
<?php
use kartik\tabs\TabsX;
use yii\base\View;
use yii\helpers\Url;

?>

<div class="diagnosa-tab-form">
    <?php

    $items = [
        [
            'label'=>'Diagnosa Awal/Sementara',
            'content' => View::render('_diagnosaAwal', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'modelDiagnosa' => $modelDiagnosa,
                'id' => $_GET['id']
            ]),
            'linkOptions'=>['data-url'=>Url::to(['/diagnosa/tab-diagnosa?id='.$_GET['id'].'&diagnosa=Awal&diagnosaTab=_diagnosaAwal'])],
            'active' => true
        ],
        [
            'label'=>'Diagnosa Banding',
            'content' => View::render('_diagnosaBanding', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'modelDiagnosa' => $modelDiagnosa,
                'id' => $_GET['id']
            ]),
            'linkOptions'=>['data-url'=>Url::to(['/diagnosa/tab-diagnosa?id='.$_GET['id'].'&diagnosa=Banding&diagnosaTab=_diagnosaBanding'])],
        ],
        [
            'label'=>'Diagnosa Kerja',
            'content' => View::render('_diagnosaKerja', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'modelDiagnosa' => $modelDiagnosa,
                'id' => $_GET['id']
            ]),
            'linkOptions'=>['data-url'=>Url::to(['/diagnosa/tab-diagnosa?id='.$_GET['id'].'&diagnosa=Kerja&diagnosaTab=_diagnosaKerja'])],
        ],
        [
            'label'=>'Diagnosa Akhir',
            'content' => View::render('_diagnosaAkhir', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'modelDiagnosa' => $modelDiagnosa,
                'id' => $_GET['id']
            ]),
            'linkOptions'=>['data-url'=>Url::to(['/diagnosa/tab-diagnosa?id='.$_GET['id'].'&diagnosa=Akhir&diagnosaTab=_diagnosaAkhir'])],
        ],
    ];

    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_LEFT,
        'encodeLabels'=>false
    ]);

    ?>

</div>
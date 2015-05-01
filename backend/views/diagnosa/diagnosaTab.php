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
            'id' => 'diagnosa-awal-sementara',
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
            'id' => 'tab-diagnosa-banding',
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
            'id' => 'tab-diagnosa-kerja',
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
            'id' => 'tab-diagnosa-akhir',
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
        'encodeLabels'=>false,
        'id'=>'tabs-diagnosa',
        'pluginOptions' =>  ['enableCache'=>false],
    ]);

    ?>

</div>
<?php
use kartik\tabs\TabsX;
use yii\base\View;

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
            'active' => true
        ],
        [
            'label'=>'Diagnosa Banding',
            'content' => View::render('_diagnosaBanding', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'id' => $_GET['id']
            ]),
        ],
        [
            'label'=>'Diagnosa Kerja',
            'content' => View::render('_diagnosaKerja', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'id' => $_GET['id']
            ]),
        ],
        [
            'label'=>'Diagnosa Akhir',
            'content' => View::render('_diagnosaAkhir', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'id' => $_GET['id']
            ]),
        ],
    ];

    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_ABOVE,
        'sideways'=>true,
        'encodeLabels'=>false
    ]);

    ?>

</div>
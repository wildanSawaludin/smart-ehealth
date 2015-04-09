<?php

use yii\base\View;
use kartik\tabs\TabsX;
?>

<div class="diagnosa-form">

    <?php

        $items = [
            [
                'label'=>'Diagnosa',
                'content' => View::render('diagnosaTab', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'modelDiagnosa' => $modelDiagnosa,
                    'id' => $_GET['id']
                ]),
                'active' => true
            ],
            [
                'label'=>'Saran/Anjuran',
                'content' => 'sdsdsds',
            ]
        ];

        echo TabsX::widget([
            'items'=>$items,
            'position'=>TabsX::POS_ABOVE,
            'sideways'=>true,
            'encodeLabels'=>false
        ]);

    ?>

</div>
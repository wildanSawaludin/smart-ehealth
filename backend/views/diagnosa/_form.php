<?php

use yii\base\View;
use kartik\tabs\TabsX;
use yii\helpers\Url;

?>

<div class="diagnosa-form">

    <?php

        $items = [
            [
                'label'=>'Diagnosa',
                'id' => 'tab-diagnosa',
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
                'id' => 'tab-saran-anjuran',
                'content' => '',
                'linkOptions'=>['data-enable-cache'=>false,'data-url'=>Url::to(['/saran-anjuran/index?id='.$_GET['id']])],
            ]
        ];

        echo TabsX::widget([
            'items'=>$items,
            'position'=>TabsX::POS_ABOVE,
            'sideways'=>true,
            'encodeLabels'=>false,
            'id'=>'tabs-diagnosa-form',
            'pluginOptions' =>  ['enableCache'=>false],
        ]);

    ?>

</div>

<a href="<?= Yii::$app->urlManager->baseUrl?>/diagnosa/show-resep-obat-form?id=<?= isset($_GET['id']) ? $_GET['id'] : '' ?>">Resep Obat</a>
<?php

use kartik\tabs\TabsX;
use yii\helpers\Url;
use yii\helpers\Html;
 
/*
$items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Home',
        'content'=>$content1,
        'active'=>true,
        'linkOptions'=>['data-url'=>Url::to(['/Anamnesa/anamnesa/update?id=27#'])]
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
        'content'=>$content2,
        'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=2'])]
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Dropdown',
        'items'=>[
             [
                 'label'=>'<i class="glyphicon glyphicon-chevron-right"></i> Option 1',
                 'encode'=>false,
                 'content'=>$content3,
                 'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=3'])]
             ],
             [
                 'label'=>'<i class="glyphicon glyphicon-chevron-right"></i> Option 2',
                 'encode'=>false,
                 'content'=>$content4,
                 'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=4'])]
             ],
        ],
    ],
];
// Ajax Tabs Above
echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);
*/

/* @var $this yii\web\View */
/* @var $model backend\models\Anamnesa */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Anamnesa',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Anamnesas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

    $content = '

            <div class="col-sm-4">
                <img src="https://www.google.com/images/srpr/logo11w.png">
            </div>
            <div class="col-sm-8">
                    '.
                    $this->render('_form', [
                        'model' => $model,
                        'faktor_resiko_riwayat' => $faktor_resiko_riwayat,
                        'faktor_resiko_kebiasaan' => $faktor_resiko_kebiasaan,
                        'psikososial_tingber' => $psikososial_tingber
                    ]).
                '
            </div>

    ';

    $items = [
                [
                    'label' => 'Anamnesa',
                    'content' => '',
                    'headerOptions' => ['style'=>'font-weight:bold'],
                ],
                [
                    'label' => 'Pemeriksaan Fisik',
                    'content' => $content,
                    'headerOptions' => ['style'=>'font-weight:bold'],
                    'active' => true
                ]
            ];

          
            echo '<div class="col-sm-12">  '. TabsX::widget([
                'position' => TabsX::POS_ABOVE,
                'align' => TabsX::ALIGN_LEFT,
                'items'=>$items,
                'encodeLabels'=>false,
            ]).'</div>';
            

?>


<script type="text/javascript">

    function getUrlVars() {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }
    
    function relocate() {

        var id = getUrlVars()['id'];

        if(id != undefined && id != '') {
            window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/Anamnesa/anamnesa/main') ?>?id="+id;
        }

    }

    $(document).ready(function() {
        $("#w1 li a:first").click(function() { relocate(); });
    })

</script>

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
                <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-5 control-label">Keluhan Utama</label>
                        <div class="col-sm-1">
                          <p class="form-control-static"></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label">Anamnesas Terpimpin</label>
                        <div class="col-sm-1">
                          <p class="form-control-static"></p>
                        </div>
                      </div>
                    </form>
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
                    'content' => $content,
                    'headerOptions' => ['style'=>'font-weight:bold'],
                    'active' => true
                ],
                [
                    'label' => 'Pemeriksaan Fisik',
                    'content' => '',
                    'headerOptions' => ['style'=>'font-weight:bold'],
                ],
                [
                    'label' => 'Diagnosa',
                    'content' => '',
                    'headerOptions' => ['style'=>'font-weight:bold' ]
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

    $(document).ready(function() {

        var id = getUrlVars()['id'];

        if(id != undefined && id != "") {

            $($("#w1 li a")[1]).bind('click', id, function(){ 
                window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/Anamnesa/anamnesa/pemeriksaan-fisik') ?>?id="+id;
            })

            $($("#w1 li a")[2]).bind('click', id, function(){ 
                window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/diagnosa/update') ?>?id="+id;
            })
        }

    })

</script>

<?php

use kartik\tabs\TabsX;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Anamnesa */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Anamnesa',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnosa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

 $content = '

            <div class="col-sm-12">
                    '.
                   $this->render('_form', [
                        'model' => $model,
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                        'modelDiagnosa' => $modelDiagnosa,
                        /*'modelResepNonRacikan' => $modelResepNonRacikan,
                        'modelResepNonracikanDetail' => $modelResepNonracikanDetail,
                        'modelResepNonracikanDetailIsi' => $modelResepNonracikanDetailIsi*/
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
                    'content' => '',
                    'headerOptions' => ['style'=>'font-weight:bold'],
                ],
                [
                    'label' => 'Diagnosa',
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
<?php
 Modal::begin([
     'id' => 'pop-diagnosa',
     'header' => 'Pilih Diagnosa'
 ]);

Modal::end();

Modal::begin([
    'id' => 'pop-info',
    'header' => 'Pilih Diagnosa'
]);

Modal::end();
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
            $($("#w2 li a")[0]).bind('click', id, function(){ 
                window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/Anamnesa/anamnesa/main') ?>?id="+id;
            })

            $($("#w2 li a")[1]).bind('click', id, function(){ 
                window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/Anamnesa/anamnesa/pemeriksaan-fisik') ?>?id="+id;
            })
        }

    })

</script>

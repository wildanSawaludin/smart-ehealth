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

$GLOBALS['page_title'] = '<h1>Anamnesa<small>Diagnosa</small></h1>';

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

<div class="row">
    <div class="nav-tabs-custom">
        <ul id="tab-main" class="nav nav-tabs">
            <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Anamnesa</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Pemeriksaan Fisik</a></li>
            <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Diagnosa</a></li>
            <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
              <div class="info-box">
                <span class="info-box-icon bg-grey"><span style="margin-top:6px" class="glyphicon glyphicon-user"></span></span>
				<!--<span class="info-box-icon bg-grey"><span class="glyphicon glyphicon-chevron-right"></span></span>-->
                <div class="info-box-content">
                  <span class="info-box-text">No RM :&nbsp;<?= str_pad($pasien->id, 6, '0', STR_PAD_LEFT) ?></span>
                  <span class="info-box-name">Nama &nbsp;&nbsp;:&nbsp;<?= $pasien->nama.' / '.$pasien->getUsia().' / '.$pasien->jenkel[0] ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			<!--<li class="pull-right header">
                <dl class="dl-horizontal">
                    <dt>No RM</dt>
                    <dd><?= str_pad($pasien->id, 6, '0', STR_PAD_LEFT) ?></dd>
                    <dt>Nama</dt>
                    <dd><?= $pasien->nama.' / '.$pasien->getUsia().' / '.$pasien->jenkel[0] ?></dd>
                </dl>
            </li>-->
        </ul>
        <div class="tab-content" style="min-height:800px;">
            <div class="tab-pane active" id="tab_3">
                <div class="col-sm-12">
                    <?= 
                        $this->render('_form', [
                            'model' => $model,
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                            'modelDiagnosa' => $modelDiagnosa,
                        ])
                    ?>
                </div>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_1">
                
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>
</div>

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
            $($("#tab-main li a")[0]).bind('click', id, function(){ 
                window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/Anamnesa/anamnesa/main') ?>?id="+id;
            })

            $($("#tab-main li a")[1]).bind('click', id, function(){ 
                window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/Anamnesa/anamnesa/pemeriksaan-fisik') ?>?id="+id;
            })
        }

    })

</script>

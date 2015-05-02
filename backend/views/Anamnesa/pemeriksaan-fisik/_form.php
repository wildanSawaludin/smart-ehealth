<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\tabs\TabsX;
use backend\models\Lookup;
use yii\helpers\Url;

//$this->title = Yii::t('app', 'Update {modelClass}: ', [
//    'modelClass' => 'Anamnesa',
//]) . ' ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Anamnesas'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
//
//$GLOBALS['page_title'] = '<h1>Anamnesa<small>Pemeriksaan Fisik</small></h1>';
//$GLOBALS['collapse'] = true;

$this->title = Yii::t('app', 'Resume Kesehatan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Resume Kesehatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$GLOBALS['page_title'] = '<h1>Resume<small>Kesehatan</small></h1>';

if(Yii::$app->user->can('Dokter') || Yii::$app->user->can('Administrator')){
$items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Status Terkini',
        'content'=>yii\base\View::render('_statusTerkini',['model'=>$model,'pasien'=>$pasien, 'registrasi' => $registrasi]),
        'active'=>true
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Tanda tanda vital',
     //   'content'=>yii\base\View::render('_keluhanLokasi',['model'=>$model]),
        'id'=>'tabs-tandavital',
        'content'=>'<div id="tabtandavital"></div>',
        'linkOptions'=>['data-enable-cache'=>false,'data-url'=>\yii\helpers\Url::to(['/Anamnesa/pemeriksaan-fisik/tanda-vital','id'=>$model->id])],//,'datakeluhan'=>str_replace("_"," ",$_GET['param'])]])],
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Evaluasi',
     //   'content'=>yii\base\View::render('_keluhanLokasi',['model'=>$model]),
        'id'=>'tabs-evaluasi',
        'content'=>'<div id="tabevaluasi"></div>',
        'linkOptions'=>['data-enable-cache'=>false,'data-url'=>\yii\helpers\Url::to(['/Anamnesa/pemeriksaan-fisik/evaluasi','id'=>$model->id])],//,'datakeluhan'=>str_replace("_"," ",$_GET['param'])]])],
    ],
];
}
else{
    $items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Status Terkini',
        'content'=>yii\base\View::render('_statusTerkini',['model'=>$model,'pasien'=>$pasien, 'registrasi' => $registrasi]),
        'active'=>true
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Tanda tanda vital',
     //   'content'=>yii\base\View::render('_keluhanLokasi',['model'=>$model]),
        'id'=>'tabs-tandavital',
        'content'=>'<div id="tabtandavital"></div>',
        'linkOptions'=>['data-enable-cache'=>false,'data-url'=>\yii\helpers\Url::to(['/Anamnesa/pemeriksaan-fisik/tanda-vital','id'=>$model->id])],//,'datakeluhan'=>str_replace("_"," ",$_GET['param'])]])],
    ],
        ];
}

?>


<div class="row">
    <div class="nav-tabs-custom">
        <ul id="tab-main" class="nav nav-tabs">
            <?php if(!Yii::$app->user->can('Perawat')){ ?>
            <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Anamnesa</a></li>
            <?php } ?>
            <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Pemeriksaan Fisik</a></li>
            <?php if(Yii::$app->user->can('Dokter') || Yii::$app->user->can('Administrator')){ ?>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Diagnosa</a></li>
            <?php }?>
            <li class="pull-right header">
                <dl class="dl-horizontal">
                    <dt>No RM</dt>
                    <dd><?= str_pad($pasien->id, 6, '0', STR_PAD_LEFT) ?></dd>
                    <dt>Nama</dt>
                    <dd><?= $pasien->nama.' / '.$pasien->getUsia().' / '.$pasien->jenkel[0] ?></dd>
                </dl>
            </li>
        </ul>
        <div class="tab-content" style="min-height:700px;">
            <div class="tab-pane active" id="tab_2">
                <div class="col-sm-12">
                    <!--
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <h3 style="text-align:center;">Depan</h3>
                        </div>
                        <div class="col-sm-6">
                            <img style="max-height: 201px;" src="<?= Yii::$app->urlManager->baseUrl . '/static/head.jpg' ?>">
                            <h3 style="text-align:center;">Belakang</h3>
                            <img style="max-height: 351px;" src="<?= Yii::$app->urlManager->baseUrl . '/static/back.jpg' ?>">
                        </div>
                        <div class="col-sm-6">
                            <img style="max-height: 500px;margin-top:28px;" src="<?= Yii::$app->urlManager->baseUrl . '/static/front.jpg' ?>">
                        </div>
                    </div>
                    -->
                    <div class="col-sm-12">
                        <?= 
                            TabsX::widget([
                                'items'=>$items,
                                'position'=>TabsX::POS_ABOVE,
                                'bordered'=>true,
                                'encodeLabels'=>false,
                                'id'=>'tabs-pemeriksaanfisik',
                                'pluginOptions' =>  ['enableCache'=>false],
                            ]);
                        ?>
                    </div>
                </div>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_1">
                
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {

        var id = <?= $model->registrasi_id ?>;

        if(id != undefined && id != "") {

            $($("#tab-main li a")[0]).bind('click', id, function(){ 
                window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/Anamnesa/anamnesa/main') ?>?id="+id;
            })

            $($("#tab-main li a")[2]).bind('click', id, function(){ 
                window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('/diagnosa/update') ?>?id="+id;
            })
        }

    })

</script>

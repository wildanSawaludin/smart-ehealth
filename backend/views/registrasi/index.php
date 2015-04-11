<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use backend\models\Registrasi;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrasi Pendaftaran');
$this->params['breadcrumbs'][] = $this->title;
$GLOBALS['page_title'] = '<h1>Registrasi<small>Pendaftaran</small></h1>';
?>

<div class="registrasi-index row">
    <section class="col-sm-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Informasi Pasien</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" style="padding-bottom:20px;">
                <div id="infoBody">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                            <span class="fa fa-user fa-5x" style="margin-top: 50px;margin-bottom: 50px;"></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

        <section class="col-sm-8">
            <?=
                $this->render('_form', [
                    'model' => $model,
                    'pId' => $pId,
                ])
            ?>
        </section>
</div>

<!--
<div class="form-group no-margin-botom">
                        <label class="col-sm-3 col-md-offset-1 control-label">No RM</label>
                        <div class="col-sm-7">
                            <p class="form-control-static">00009</p>
                        </div>
                    </div>
                    <div class="form-group no-margin-botom">
                        <label class="col-sm-3 col-md-offset-1 control-label">Nama</label>
                        <div class="col-sm-7">
                            <p class="form-control-static">Maya Pratama</p>
                        </div>
                    </div>
                    <div class="form-group no-margin-botom">
                        <label class="col-sm-3 col-md-offset-1 control-label">Gender</label>
                        <div class="col-sm-7">
                            <p class="form-control-static">P</p>
                        </div>
                    </div>
                    <div class="form-group no-margin-botom">
                        <label class="col-sm-3 col-md-offset-1 control-label">TTL</label>
                        <div class="col-sm-7">
                            <p class="form-control-static">Makassar, 31-10-1990</p>
                        </div>
                    </div>
                    <div class="form-group no-margin-botom">
                        <label class="col-sm-3 col-md-offset-1 control-label">Usia</label>
                        <div class="col-sm-7">
                            <p class="form-control-static">25 Tahun</p>
                        </div>
                    </div>
                    <div class="form-group no-margin-botom">
                        <label class="col-sm-3 col-md-offset-1 control-label">Alamat</label>
                        <div class="col-sm-7">
                            <p class="form-control-static">Jl. Merapi No.23</p>
                        </div>
                    </div>
                    <div class="form-group no-margin-botom">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="button" id="btnUpdate" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Update</button>                        </div>
                    </div>
    -->

<div class="row">
    <section class="col-sm-12">
        <div class="box box-primary" style="margin-top:20px;">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-2 col-md-offset-7">
                        <h4 style="text-align:right;">Ubah Tanggal</h4>
                    </div>
                    <div class="col-sm-3 pull-right">
                        <form id="dateTimeFilter" action="" method="POST">
                            <?=                
                            DatePicker::widget([
                                'name' => 'tanggal_registrasi',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ],
                                'value' => $input,
                                'options' => [
                                    'id' => 'time_treshold',
                                    'onchange' => 
                                        '$.pjax.reload({
                                            url: "'.Url::to(['index']).'?RegistrasiSearch[tanggal_registrasi]="+$(this).val(),
                                            container: "#pjax-gridview",
                                            timeout: 1000,
                                        })',
                                ]
                            ]);
                            ?>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 class="text-center">Daftar Pasien Hari Ini</h1>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <?php Pjax::begin(['id' => 'pjax-gridview']) ?>
            
                <?php

                    $dataProvider->pagination->pageSize=5;

                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'pjax' => true,
                        'bootstrap' => true,
                        'bordered' => true,
                        'hover' => true,
                        'layout' => "{items}\n{summary}\n{pager}",
                        'columns' => [
                            'no_reg',
                            [
                                'attribute' => 'pasienNama',
                                'value' => $model->pasienNama
                            ],
                            [
                                'attribute' => 'tanggal_registrasi',
                                'filterType' => GridView::FILTER_DATE,
                                'format' => 'raw',
                                'width' => '100px',
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['format' => 'dd-mm-yyyy']
                                ],
                            ],
                            'status_pelayanan',
                            'status_asuransi',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete} {resume}',
                                'buttons' =>
                                [
                                    'resume' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-zoom-in"></span>', $url, [
                                                    'title' => Yii::t('yii', 'Resume'),
                                                //  'data-confirm' => Yii::t('yii', 'Apa Anda yakin?'),
                                                    'data-method' => 'post',
                                        ]);
                                    }
                                ],
                                'options' => [ 
                                    'style' => 'text-align:center;'

                                ]
                            ]
                        ],
                    ]);
                ?>
            </div>
            <?php Pjax::end() ?>
        </div>
    </section>
</div>

<script type="text/javascript">

    var pasienInfo = {
        'url': "<?= Yii::$app->urlManager->createAbsoluteUrl('registrasi/pasien') ?>",
        'pasienId' : null,
        'clearData': function() {
            $("#infoBody").html('');
        },
        'showData' : function($data) {
            $("#infoBody").html($data);
        },
        'update' : function($pasienId) {
            window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('pasien/update?id=') ?>"+$pasienId
        },
        'getInfo': function($id) {
            $.get(this.url+'?id='+$id, function(data) {
                pasienInfo.showData(data);
            });
        }
    }

    $(document).ready(function() {

        var firstPasien = $('.kv-grid-table tbody tr:first').data('key');
        if(firstPasien != undefined) {
            pasienInfo.getInfo(firstPasien);
        }

        $('#infoBody').delegate('#btnUpdate', 'click', function() {
            pasienInfo.update($(this).data('pasien'));
        })

        $('#pjax-gridview').delegate('tbody tr', 'click', function(event) {
            $(this).addClass('selected-row').siblings().removeClass('selected-row');

            pasienInfo.getInfo($(this).data('key'));
        })

    })

</script>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
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
                        <?= Html::submitButton('<span class="glyphicon glyphicon-pencil"></span> Update', ['class' => 'btn btn-primary']) ?>
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
                            DateTimePicker::widget([
                                'name' => 'tanggal_registrasi',
                                'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd hh:ii',
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
                                'visible' => $model->haveActivated() ? false : true,
                                'template' => '{delete} {resume} {account}',
                                'buttons' =>
                                [
                                    'resume' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-zoom-in"></span>', $url, [
                                                    'title' => Yii::t('yii', 'Resume'),
                                                //  'data-confirm' => Yii::t('yii', 'Apa Anda yakin?'),
                                                    'data-method' => 'post',
                                        ]);
                                    },
                                    'account' => function ($url, $model) {
                                        return Html::a('<span class="fa fa-unlock"></span>', $url, [
                                                    'title' => Yii::t('yii', 'Resume'),
                                                //  'data-confirm' => Yii::t('yii', 'Apa Anda yakin?'),
                                                    'data-method' => 'post',
                                        ]);
                                    }
                                ],
                                'options' => [ 
                                    'style' => [
                                        'text-align:center;'
                                    ]
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

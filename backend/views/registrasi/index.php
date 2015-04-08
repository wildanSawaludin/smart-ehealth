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

    <div class="col-sm-12">

        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-8">
                            <?=
                            $this->render('_form', [
                                'model' => $model,
                                'pId' => $pId,
                            ])
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box" style="margin-top:20px;">
            <?php
                //echo '<label>Start Date/Time</label>';
                echo DateTimePicker::widget([
                    'name' => 'dp_2',
                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd hh:ii',
                        'todayHighlight' => true
                    ],
                    'options' => [
                        'onchange' => 
                            'console.log("filtering");

                            $.pjax.reload({
                                url: "'.Url::to(['index']).'?EmployeeSearch[group_id]="+$(this).val(),
                                container: "#pjax-gridview",
                                timeout: 1000,
                            });'
                    ]
                ]);

            ?>

            <?php Pjax::begin(['id' => 'pjax-gridview']) ?>
            
                <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'pjax' => true,
                        'columns' => [
                            [
                                'class' => 'kartik\grid\SerialColumn',
                                'contentOptions' => ['class' => 'kartik-sheet-style'],
                                'width' => '40px',
                                'header' => '',
                                'headerOptions' => ['class' => 'kartik-sheet-style']
                            ],
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
                            // 'status_rawat',
                            // 'dr_penanggung_jawab',
                            // 'icdx_id',
                            'status_asuransi',
                            // 'catatan:ntext',
                            // 'asuransi_noreg',
                            // 'asuransi_nama',
                            // 'asuransi_tgl_lahir',
                            // 'asuransi_status_jaminan',
                            // 'asuransi_penanggung_jawab',
                            // 'asuransi_alamat',
                            // 'asuransi_notelp',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}{resume}',
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
                            ]
                        ],
                        /*'headerRowOptions' => [
                            'class' => 'box-header'
                        ],*/
                        'tableOptions' => [
                            'class' => 'box-body'
                        ]
                    ]);
                ?>
                
            <?php Pjax::end() ?>
        </div>
    </div>

</div>

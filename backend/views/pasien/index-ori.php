<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pasiens');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'contentOptions' => ['class' => 'kartik-sheet-style'],
                'width' => '40px',
                'header' => '',
                'headerOptions' => ['class' => 'kartik-sheet-style']
            ],
            'nama',
            'tempat_lahir',
            'tgl_lahir',
            'jenkel',
            // 'goldar',
            // 'agama',
            // 'pekerjaan',
            // 'warga_negara',
            // 'alamat:ntext',
            // 'notelp',
            // 'nama_ayah',
            // 'pekerjaan_ayah',
            // 'nama_ibu',
            // 'pekerjaan_ibu',
            // 'marital_status',
            // 'nama_pasangan',
            // 'pekerjaan_pasangan',
            [
                'class' => 'kartik\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '', [
                                    'title' => Yii::t('yii', 'Update'), 'onclick' => 'showDlg(' . $model->id . ')'
                        ]);
                    }
                        ],
//                        'dropdown' => $this->dropdown,
//                        'urlCreator' => function($action, $model, $key, $index) {
//                            if ($action === 'update') {
//                                return '#';
//                            }
//                        },
//                        'viewOptions' => ['title' => 'This will launch the book details page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
//                        'updateOptions' => ['onclick' => 'showDlg(' . $data->id . ')'],
//                        'deleteOptions' => ['title' => 'This will launch the book delete action. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                    ],
                    [
                        'class' => 'kartik\grid\CheckboxColumn',
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                    ],
                ],
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' => [
                    ['content' =>
//                        Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => Yii::t('app', 'create'), 'class' => 'btn btn-success', 'onclick' => 'showDlg(null)']) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'reset')])
                    ],
                    '{export}',
                    '{toggleData}',
                ],
                // set export properties
                'export' => [
                    'fontAwesome' => true
                ],
                // parameters from the demo form
                'bordered' => $bordered,
                'striped' => $striped,
                'condensed' => $condensed,
                'responsive' => $responsive,
                'hover' => $hover,
                'showPageSummary' => $pageSummary,
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<i class="glyphicon glyphicon-user"></i>  Pasien',
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Daftar {modelClass}', ['modelClass' => 'Pasien',]), ['create'], ['class' => 'btn btn-success']),
                ],
                'persistResize' => false,
                'exportConfig' => $exportConfig,
            ]);
            ?>

</div>

<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrasi Pendaftaran');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-index">

    <h1><?php //Html::encode($this->title)  ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    $this->render('_form', [
        'model' => $model,
        'pId' => $pId,
    ])
    ?>

    <p>
        <?php
//            Html::a(Yii::t('app', 'Create {modelClass}', [
//                'modelClass' => 'Registrasi',
//            ]), ['create'], ['class' => 'btn btn-success']) 
        ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
                'template' => '{view} {delete}',
                'buttons' => ['view', 'delete']
            ]
        ],
    ]);
    ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registrasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Registrasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'no_reg',
            'pasienId',
            'registrasi_date',
            'status_pelayanan',
            // 'status_rawat',
            // 'dr_penanggung_jawab',
            // 'icdx_id',
            // 'status_asuransi',
            // 'catatan:ntext',
            // 'asuransi_noreg',
            // 'asuransi_nama',
            // 'asuransi_tgl_lahir',
            // 'asuransi_status_jaminan',
            // 'asuransi_penanggung_jawab',
            // 'asuransi_alamat',
            // 'asuransi_notelp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

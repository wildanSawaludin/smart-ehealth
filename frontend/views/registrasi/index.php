<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrasis');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Registrasi'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'no_reg',
            'pasien_id',
            'tanggal_registrasi',
            'status_registrasi',
            // 'asal_registrasi',
            // 'status_pelayanan',
            // 'tanggal_kunjungan',
            // 'status_rawat',
            // 'dr_penanggung_jawab',
            // 'icdx_id',
            // 'status_asuransi',
            // 'catatan:ntext',
            // 'asuransi_noreg',
            // 'asuransi_noreg_other',
            // 'asuransi_nama',
            // 'asuransi_tgl_lahir',
            // 'asuransi_status_jaminan',
            // 'asuransi_penanggung_jawab',
            // 'asuransi_alamat',
            // 'asuransi_notelp',
            // 'no_antrian',
            // 'asuransi_provider_id',
            // 'faskes_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Registrasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registrasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_reg',
            'pasien_id',
            'tanggal_registrasi',
            'status_registrasi',
            'asal_registrasi',
            'status_pelayanan',
            'tanggal_kunjungan',
            'status_rawat',
            'dr_penanggung_jawab',
            'icdx_id',
            'status_asuransi',
            'catatan:ntext',
            'asuransi_noreg',
            'asuransi_noreg_other',
            'asuransi_nama',
            'asuransi_tgl_lahir',
            'asuransi_status_jaminan',
            'asuransi_penanggung_jawab',
            'asuransi_alamat',
            'asuransi_notelp',
            'no_antrian',
            'asuransi_provider_id',
            'faskes_id',
        ],
    ]) ?>

</div>

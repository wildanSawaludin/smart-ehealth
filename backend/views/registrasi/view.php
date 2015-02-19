<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Pasien;

/* @var $this yii\web\View */
/* @var $model backend\models\Registrasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registrasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->no_reg;
?>
<div class="registrasi-view">

    <h1><?= Html::encode($model->no_reg) ?></h1>

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
    <?php
        $model->pasienId = Pasien::findOne($model->pasienId)->nama;
        $date=date_create($model->registrasi_date);
        $model->registrasi_date = date_format($date,"d-m-Y H:i:s");
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_reg',
            'pasienId',
            'registrasi_date',
            'status_pelayanan',
            'status_rawat',
            'dr_penanggung_jawab',
            'icdx_id',
            'status_asuransi',
            'catatan:ntext',
            'asuransi_noreg',
            'asuransi_nama',
            'asuransi_tgl_lahir',
            'asuransi_status_jaminan',
            'asuransi_penanggung_jawab',
            'asuransi_alamat',
            'asuransi_notelp',
        ],
    ]) ?>

</div>

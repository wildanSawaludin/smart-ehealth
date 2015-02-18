<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Registrasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RegistrasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registrasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_reg') ?>

    <?= $form->field($model, 'pasien_id') ?>

    <?= $form->field($model, 'tanggal_registrasi') ?>

    <?= $form->field($model, 'status_registrasi') ?>

    <?php // echo $form->field($model, 'asal_registrasi') ?>

    <?php // echo $form->field($model, 'status_pelayanan') ?>

    <?php // echo $form->field($model, 'tanggal_kunjungan') ?>

    <?php // echo $form->field($model, 'status_rawat') ?>

    <?php // echo $form->field($model, 'dr_penanggung_jawab') ?>

    <?php // echo $form->field($model, 'icdx_id') ?>

    <?php // echo $form->field($model, 'status_asuransi') ?>

    <?php // echo $form->field($model, 'catatan') ?>

    <?php // echo $form->field($model, 'asuransi_noreg') ?>

    <?php // echo $form->field($model, 'asuransi_noreg_other') ?>

    <?php // echo $form->field($model, 'asuransi_nama') ?>

    <?php // echo $form->field($model, 'asuransi_tgl_lahir') ?>

    <?php // echo $form->field($model, 'asuransi_status_jaminan') ?>

    <?php // echo $form->field($model, 'asuransi_penanggung_jawab') ?>

    <?php // echo $form->field($model, 'asuransi_alamat') ?>

    <?php // echo $form->field($model, 'asuransi_notelp') ?>

    <?php // echo $form->field($model, 'no_antrian') ?>

    <?php // echo $form->field($model, 'asuransi_provider_id') ?>

    <?php // echo $form->field($model, 'faskes_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

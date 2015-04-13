<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Registrasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registrasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_reg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasien_id')->textInput() ?>

    <?= $form->field($model, 'tanggal_registrasi')->textInput() ?>

    <?= $form->field($model, 'status_registrasi')->dropDownList([ 'Antrian' => 'Antrian', 'Pemeriksaan' => 'Pemeriksaan', 'Hasil' => 'Hasil', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'asal_registrasi')->dropDownList([ 'Apps' => 'Apps', 'Web' => 'Web', 'Faskes' => 'Faskes', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status_pelayanan')->dropDownList([ 'Rawat Jalan' => 'Rawat Jalan', 'Inap' => 'Inap', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status_rawat')->dropDownList([ 'Biasa' => 'Biasa', 'Persalinan' => 'Persalinan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'dr_penanggung_jawab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icdx_id')->textInput() ?>

    <?= $form->field($model, 'status_asuransi')->dropDownList([ 'Umum' => 'Umum', 'BPJS Kesehatan' => 'BPJS Kesehatan', 'BPJS Ketenagakerjaan' => 'BPJS Ketenagakerjaan', 'Asuransi Lainnya' => 'Asuransi Lainnya', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asuransi_noreg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asuransi_noreg_other')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asuransi_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asuransi_tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'asuransi_status_jaminan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asuransi_penanggung_jawab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asuransi_alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asuransi_notelp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_antrian')->textInput() ?>

    <?= $form->field($model, 'asuransi_provider_id')->textInput() ?>

    <?= $form->field($model, 'faskes_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

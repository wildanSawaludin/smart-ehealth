<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registrasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_reg')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'pasienId')->textInput() ?>

    <?= $form->field($model, 'registrasi_date')->textInput() ?>

    <?= $form->field($model, 'status_pelayanan')->dropDownList([ 'Rawat Jalan' => 'Rawat Jalan', 'Inap' => 'Inap', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status_rawat')->dropDownList([ 'Biasa' => 'Biasa', 'Persalinan' => 'Persalinan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'dr_penanggung_jawab')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'icdx_id')->textInput() ?>

    <?= $form->field($model, 'status_asuransi')->dropDownList([ 'Umum' => 'Umum', 'BPJS Kesehatan' => 'BPJS Kesehatan', 'BPJS Ketenagakerjaan' => 'BPJS Ketenagakerjaan', 'Asuransi Lainnya' => 'Asuransi Lainnya', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asuransi_noreg')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'asuransi_nama')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'asuransi_tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'asuransi_status_jaminan')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'asuransi_penanggung_jawab')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'asuransi_alamat')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'asuransi_notelp')->textInput(['maxlength' => 15]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

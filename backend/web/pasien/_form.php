<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'jenkel')->dropDownList([ 'Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'goldar')->dropDownList([ 'O' => 'O', 'A' => 'A', 'B' => 'B', 'AB' => 'AB', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Kristen Katholik' => 'Kristen Katholik', 'Budha' => 'Budha', 'Hindu' => 'Hindu', 'Konghucu' => 'Konghucu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pekerjaan')->dropDownList([ 'PNS' => 'PNS', 'Swasta' => 'Swasta', 'Wiraswasta' => 'Wiraswasta', 'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa', 'TNI' => 'TNI', 'POLRI' => 'POLRI', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'warga_negara')->dropDownList([ 'Indonesia' => 'Indonesia', 'Asing' => 'Asing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'notelp')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'pekerjaan_ayah')->dropDownList([ 'PNS' => 'PNS', 'Swasta' => 'Swasta', 'Wiraswasta' => 'Wiraswasta', 'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa', 'TNI' => 'TNI', 'POLRI' => 'POLRI', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'pekerjaan_ibu')->dropDownList([ 'PNS' => 'PNS', 'Swasta' => 'Swasta', 'Wiraswasta' => 'Wiraswasta', 'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa', 'TNI' => 'TNI', 'POLRI' => 'POLRI', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'marital_status')->dropDownList([ 'Menikah' => 'Menikah', 'Belum Menikah' => 'Belum Menikah', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama_pasangan')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'pekerjaan_pasangan')->dropDownList([ 'PNS' => 'PNS', 'Swasta' => 'Swasta', 'Wiraswasta' => 'Wiraswasta', 'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa', 'TNI' => 'TNI', 'POLRI' => 'POLRI', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

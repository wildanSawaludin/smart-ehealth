<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AsuransiProviderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asuransi-provider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pasien_id') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'penanggung_jawab') ?>

    <?= $form->field($model, 'no_pks') ?>

    <?php // echo $form->field($model, 'tgl_mulai_ks') ?>

    <?php // echo $form->field($model, 'tgl_selesai_ks') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Registrasi */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
label {color:#ffffff;}
</style>

<div class="registrasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tanggal_kunjungan')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => '(yyyy-mm-dd)'],
                'pluginOptions' => [
                    'autoclose' => true, 'format' => 'yyyy-mm-dd'
    ]]);?>
    <?php $kec = [1 => 'Mariso', 2 => 'Tamalate', 3 => 'Bontoala', 4 => 'Rappoocini',
                    5 => 'Makassar', 6 => 'Ujung Tanah', 7 => 'Tallo', 8 => 'Ujung Pandang',
                    9 => 'Mamajang', 10 => 'Tamalanrea', 11 => 'Panakkukang', 12 => 'Manggala',
                    13 => 'Wajo', 14 => 'Biringkanaya'
                                ];?>
    <?= $form->field($model, 'faskes_id')->dropDownList($kec, ['prompt' => '-- Pilih Kecamatan --',
        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl('/registrasi/lists?id=').'"+$(this).val(), 
        function( data ) {$( "select#faskes_id" ).html( data );});'])->label('Kecamatan');; ?>
    
    <?php $dataPost=ArrayHelper::map(backend\models\FasilitasKesehatan::find()->asArray()->all(), 'id', 'nama'); ?>
    <?= $form->field($model, 'faskes_id')->dropDownList($dataPost,['prompt' => '-- Pilih Fasilitas Kesehatan --','id'=>'faskes_id'])->label('Fasilitas Kesehatan');;?>
    
    <?= $form->field($model, 'status_pelayanan')->radioList([ 'Rawat Jalan' => 'Rawat Jalan','Rawat Inap' => 'Rawat Inap'], ['inline' => true]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-12">
    <section style="padding:5px;">
        <div id="tab" role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#dataumum-pass" aria-controls="dataumum-pass" role="tab" data-toggle="tab">Data Umum</a></li>
                <li role="presentation"><a href="#statkel-pass" aria-controls="statkel-pass" role="tab" data-toggle="tab">Status Keluarga</a></li>
            </ul>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'pasien-form',
                        'enableAjaxValidation' => false,
                        'enableClientValidation' => true,
                        'type' => ActiveForm::TYPE_HORIZONTAL,
                        'formConfig' => [
                            'deviceSize' => ActiveForm::SIZE_SMALL,
                            'labelSpan' => 4
                        ]
            ]);
            ?>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="dataumum-pass" style="padding:20px">
                    <?= $form->field($model, 'nama')->textInput(['maxlength' => 25]) ?>
                    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => 30]) ?>
                    <?php
                    echo $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => '(dd-mm-yyyy)'],
                        'pluginOptions' => [
                            'autoclose' => true, 'format' => 'dd-mm-yyyy'
                        ]
                    ]);
                    ?>
                    <?= $form->field($model, 'jenkel')->radioList([ 'Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan',], ['inline' => true]) ?>
                    <?= $form->field($model, 'goldar')->radioList([ 'O' => 'O', 'A' => 'A', 'B' => 'B', 'AB' => 'AB',], ['inline' => true]) ?>
                    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Kristen Katholik' => 'Kristen Katholik', 'Budha' => 'Budha', 'Hindu' => 'Hindu', 'Konghucu' => 'Konghucu',], ['prompt' => '']) ?>
                    <?= $form->field($model, 'pekerjaan')->dropDownList([ 'PNS' => 'PNS', 'Swasta' => 'Swasta', 'Wiraswasta' => 'Wiraswasta', 'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa', 'TNI' => 'TNI', 'POLRI' => 'POLRI',], ['prompt' => '']) ?>
                    <?= $form->field($model, 'warga_negara')->radioList([ 'Indonesia' => 'Indonesia', 'Asing' => 'Asing',], ['inline' => true]) ?>
                    <?= $form->field($model, 'alamat')->textarea(['rows' => 1]) ?>
                    <?= $form->field($model, 'notelp')->textInput(['maxlength' => 15]) ?>
                </div>
                <div role="tabpanel" class="tab-pane " id="statkel-pass" style="padding:20px">
                    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => 25]) ?>
                    <?= $form->field($model, 'pekerjaan_ayah')->dropDownList([ 'PNS' => 'PNS', 'Swasta' => 'Swasta', 'Wiraswasta' => 'Wiraswasta', 'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa', 'TNI' => 'TNI', 'POLRI' => 'POLRI',], ['prompt' => '']) ?>
                    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => 25]) ?>
                    <?= $form->field($model, 'pekerjaan_ibu')->dropDownList([ 'PNS' => 'PNS', 'Swasta' => 'Swasta', 'Wiraswasta' => 'Wiraswasta', 'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa', 'TNI' => 'TNI', 'POLRI' => 'POLRI',], ['prompt' => '']) ?>
                    <?= $form->field($model, 'marital_status')->radioList([ 'Menikah' => 'Menikah', 'Belum Menikah' => 'Belum Menikah',], ['inline' => true]) ?>
                    <?= $form->field($model, 'nama_pasangan')->textInput(['maxlength' => 25]) ?>
                    <?= $form->field($model, 'pekerjaan_pasangan')->dropDownList([ 'PNS' => 'PNS', 'Swasta' => 'Swasta', 'Wiraswasta' => 'Wiraswasta', 'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa', 'TNI' => 'TNI', 'POLRI' => 'POLRI',], ['prompt' => '']) ?>
                </div>
            </div>
            <div class="form-group" style="text-align:center">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#tab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>

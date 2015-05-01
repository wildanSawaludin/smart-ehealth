<?php
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;
use dosamigos\ckeditor\CKEditor;
?>
<div class="modal-content" style="width: 750px;margin-left: 260px;margin-top: 100px">
    <div class="modal-header">
        Informasi Diagnosa
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
            'id' => 'info-form',
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,'showLabels'=>false]
        ]);
        ?>
        <ul class="nav nav-tabs" id="tabs-cnt" style="padding-top:0px;margin-bottom: 10px">
            <li class="active"><a href="#klinis" data-toggle="tab">Gejala Klinis </a></li>
            <li ><a href="#penunjang" data-toggle="tab">Pem. Penunjang</a></li>
            <li ><a href="#tindakan" data-toggle="tab">Terapi/Tindakan</a></li>
            <li ><a href="#gizi" data-toggle="tab">Gizi & Nutrisi</a></li>

        </ul>
        <div class="tab-content">

            <div class="tab-pane fade in active" id="klinis">
                Anamnesa : <br>
                <pre><?= $model['anamnesa']; ?> </pre>
                Pemeriksaan Fisik : <br>
                <pre><?= $model['pemeriksaan_fisik']; ?></pre>
            </div>
            <div class="tab-pane fade" id="penunjang">
                <pre><?= $model['pemeriksaan_penunjang']; ?></pre>
            </div>
            <div class="tab-pane fade" id="tindakan">
                <pre><?= $model['terapi_tindakan']; ?></pre>
            </div>
            <div class="tab-pane fade" id="gizi">
                <pre><?= $model['gizi_nutrisi']; ?></pre>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

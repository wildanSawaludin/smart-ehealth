<?php

use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;

?>
<div class="modal-content" style="width: 750px;margin-left: 400px;margin-top: 100px">
    <div class="modal-header">
        Riwayat Perawatan
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
                'id' => 'riwayatPerawatan-form',
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => [
                    'deviceSize' => ActiveForm::SIZE_SMALL,
                    'labelSpan' => 1,
                    'showLabels'=>false
                ]
            ]); 
        ?>
        <div class="form-group">
            <label class="col-md-2 control-label" for="Diagnosa">Waktu :</label>
            <div class="col-md-4">
                <?php
                    echo $form->field($model, 'riwayat_perawatan_waktu')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => ''],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'dd-MM-yyyy'
                        ],
                        'language' => 'id'
                    ]);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="Diagnosa">Tempat :</label>
            <div class="col-md-4">
                <?php 
                    $list = ['Rumah Sakit' => 'Rumah Sakit', 'Puskesmas' => 'Puskesmas', 'Rumah' => 'Rumah'];
                    echo $form->field($model, 'riwayat_perawatan_tempat')->radioList($list); 
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="Diagnosa">Lama Rawat :</label>
            <div class="col-md-2">
                <?= $form->field($model, 'riwayat_perawatan_nil') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'riwayat_perawatan_lama')->dropDownList(['hari' => 'hari', 'minggu' => 'minggu', 'bulan' => 'bulan', 'tahun' => 'tahun']) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-4">
                <input id="btnOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>var id = '<?php echo $_GET['id']; ?>' </script>
<script src="/admin/js/riwayatPerawatan.js"></script>            

    
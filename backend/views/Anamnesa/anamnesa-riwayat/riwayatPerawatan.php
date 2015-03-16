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
                'id' => 'keluhanDetail-form',
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
        <div class="row">
            <div class="col-sm-4">
                <?php
                    echo '<label class="control-label">Waktu</label>';
                    echo $form->field($model, 'riwayat_perawatan_waktu')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => ''],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'dd/mm/yyyy'
                        ]
                    ]);
                ?>
            </div>
        </div>
        <?php 
            $list = ['Rumah Sakit' => 'Rumah Sakit', 'Puskesmas' => 'Puskesmas', 'Rumah' => 'Rumah'];
            echo $form->field($model, 'riwayat_perawatan_tempat')->radioList($list); 
        ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
            

    
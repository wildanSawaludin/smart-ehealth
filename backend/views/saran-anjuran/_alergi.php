<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 25/03/15
 * Time: 20:19
 */

use kartik\widgets\ActiveForm;

?>

<div class="modal-content" style="width: 750px;margin-left: 260px;margin-top: 100px">
    <div class="modal-header">
        Alergi
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php
        $form = ActiveForm::begin([
            'id' => 'alergi-form',
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
            <div class="col-md-4">
                <?= $form->field($model, 'alergi_eosinofil_pil')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <?= $form->field($model, 'alergi_total_pil')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <?= $form->field($model, 'alergi_atopy_pil')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <?= $form->field($model, 'alergi_spesifik_pil')->checkbox() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-info" id="btnOkAlergi">OK</a>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#btnOkAlergi').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/saran-anjuran/popup-alergi?id=' + id,
                data: $('#alergi-form').serialize(),
                success: function (data) {
                    //alert('Success Update Data');
                    //$("m_urnalisa").modal('hide');
                }
            });
        });
    });
</script>
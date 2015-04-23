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
        Pemeriksaan Radiologi
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php
        $form = ActiveForm::begin([
            'id' => 'radiologi-form',
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
                <?= $form->field($model, 'radiologi_ctscan_pil')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <?= $form->field($model, 'radiologi_usg_pil')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <?= $form->field($model, 'radiologi_mri_pil')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <?= $form->field($model, 'radiologi_xray_pil')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <?= $form->field($model, 'radiologi_lain_pil')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <div style="margin-left: 40px;">
                <?php
                    $list = ['BSO' => 'BSO', 'Esofagografi' => 'Esofagografi', 'Gastroduodenografi' => 'Gastroduodenografi', 'Follow Throuah' => 'Follow Throuah'];
                    $list2 = ['Collon Inloop' => 'Collon Inloop', 'IVP' => 'IVP', 'Histerosalfigografi' => 'Histerosalfigografi', 'Uretrosistografi' => 'Uretrosistografi'];

                    $model->radiologi_lain_lain = $radiologi_lain;
                ?>
                <div class="col-md-4">
                    <?= $form->field($model, 'radiologi_lain_lain')->checkboxList($list) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'radiologi_lain_lain')->checkboxList($list2) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-info" id="btnOkRadiologi">OK</a>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#btnOkRadiologi').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/saran-anjuran/popup-radiologi?id=' + id,
                data: $('#radiologi-form').serialize(),
                success: function (data) {
                    //alert('Success Update Data');
                    //$("m_urnalisa").modal('hide');
                }
            });
        });
    });
</script>
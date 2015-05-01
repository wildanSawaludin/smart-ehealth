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
        Urinalisa
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php
            $form = ActiveForm::begin([
                'id' => 'urinalisa-form',
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => [
                    'deviceSize' => ActiveForm::SIZE_SMALL,
                    'labelSpan' => 1,
                    'showLabels'=>false

                ]
            ]);

            $list = [
                'Urin Rutin' => 'Urin Rutin',
                'Flow Cytametry' => 'Flow Cytametry',
                'Protein Bance Jone' => 'Protein Bance Jones',
                'Protein Total' => 'Protein Total'
            ];

            $model->kp_urinalisa = $kp_urinalisa;
        ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'kp_urinalisa')->checkboxList($list) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-info" id="btnOkUrinalisa">OK</a>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#btnOkUrinalisa').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/saran-anjuran/popup-urinalisa?id=' + id,
                data: $('#urinalisa-form').serialize(),
                success: function (data) {
                    //alert('Success Update Data');
                    //$("m_urnalisa").modal('hide');
                }
            });
        });
    });
</script>
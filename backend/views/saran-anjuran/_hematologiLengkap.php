<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 22/04/15
 * Time: 21:17
 */

use kartik\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'hematologi-lengkap-form',
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
    'Hematologi Rutin (CBC)' => 'Hematologi Rutin (CBC)',
    'Hematologi Lengkap' => 'Hematologi Lengkap',
    'Golongan Darah' => 'Golongan Darah',
    'Hemoglobin' => 'Hemoglobin',
    'Laju Endap Darah (LED)' => 'Laju Endap Darah (LED)'
];
$model->kp_hematologi_lengkap = $kp_hematologi_lengkap;
?>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'kp_hematologi_lengkap')->checkboxList($list) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <a class="btn btn-info" id="btnOkLengkap">OK</a>
    </div>
</div>
<?php ActiveForm::end(); ?>

<script>
    $(document).ready(function(){
        $('#btnOkLengkap').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/saran-anjuran/hematologi-lengkap?id=' + id,
                data: $('#hematologi-lengkap-form').serialize(),
                success: function (data) {
                    //alert('Success Update Data');
                    $("m_hematologi").modal('hide');
                }
            });
        });
    });
</script>

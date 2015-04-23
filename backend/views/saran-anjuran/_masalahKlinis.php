<?php
use kartik\widgets\ActiveForm;

$form = ActiveForm::begin([
        'id' => 'masalah-klinis-form',
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
        <?= $form->field($model, 'mk_cesereb_pil')->checkbox() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'mk_ami_pil')->checkbox() ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <?= $form->field($model, 'mk_kolesistitis_pil')->checkbox() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'mk_osteoporosis_pil')->checkbox() ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <?= $form->field($model, 'mk_sirosis_pil')->checkbox() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'mk_pankreatitis_pil')->checkbox() ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <?= $form->field($model, 'mk_galjan_pil')->checkbox() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'mk_ulpep_pil')->checkbox() ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <?= $form->field($model, 'mk_throbven_pil')->checkbox() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'mk_pneumonia_pil')->checkbox() ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <?= $form->field($model, 'mk_emfisema_pil')->checkbox() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'mk_galgin_pil')->checkbox() ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <?= $form->field($model, 'mk_kanpar_pil')->checkbox() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'mk_arthreu_pil')->checkbox() ?>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <?= $form->field($model, 'mk_skleromul_pil')->checkbox() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'mk_sle_pil')->checkbox() ?>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a class="btn btn-info" id="btnOkMasalahKlinis">OK</a>
    </div>
</div>

<?php ActiveForm::end(); ?>

<script>
    $(document).ready(function(){

        $('#btnOkMasalahKlinis').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/saran-anjuran/masalah-klinis?id=' + id,
                data: $('#masalah-klinis-form').serialize(),
                success: function (data) {
                    alert('Success Update Data');
                    //$("m_urnalisa").modal('hide');
                }
            });
        });
    });
</script>

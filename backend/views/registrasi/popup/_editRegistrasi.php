<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use backend\models\AsuransiProvider;

$style1 = "";
$style2 = "";
switch ($model->status_asuransi) {
    case '':
        $style1 = "display:none";
        $style2 = "display:none";
        break;
    case 'Umum':
        $style1 = "display:none";
        $style2 = "display:none";
        break;
    case 'BPJS Kesehatan':
        $style1 = "display:block";
        $style2 = "display:none";
        break;
    case 'BPJS Ketenagakerjaan':
        $style1 = "display:block";
        $style2 = "display:none";
        break;
    case 'Asuransi Lainnya':
        $style1 = "display:none";
        $style2 = "display:block";
        break;
}
$url = \yii\helpers\Url::to(['pasien-list']);
$urlIcdx = \yii\helpers\Url::to(['icdx-list']);
$urlId = \yii\helpers\Url::to(['id-list']);
$initScriptIcdx = <<< SCRIPT
    function (element, callback) {
        var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$urlIcdx}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;

?>
<div id="tab" role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <?php if($model->status_pelayanan=='Rawat Inap'){ ?>
        <li role="presentation" ><a href="#sp-tab" aria-controls="sp-tab" role="tab" data-toggle="tab">Surat Pengantar</a></li>
        <?php } ?>
        <li role="presentation" class="active"><a href="#sa-tab" aria-controls="sa-tab" role="tab" data-toggle="tab">Status Asuransi</a></li>
    </ul>
    <?php
    $form = ActiveForm::begin([
        'id' => 'pasien-form',
        'enableAjaxValidation' => true,
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
        <?php if($model->status_pelayanan=='Rawat Inap'){ ?>
        <div role="tabpanel" class="tab-pane " id="sp-tab" style="padding:20px">
            <?php  echo $form->errorSummary($model); ?>
            <?php
                echo $form->field($model, 'status_rawat_reged')->dropDownList([ 'Biasa' => 'Biasa', 'Persalinan' => 'Persalinan',], ['prompt' => '']);
                echo $form->field($model, 'dr_penanggung_jawab_reged')->textInput(['maxlength' => 25]);
                echo $form->field($model, 'icdx_id_reged')->widget(Select2::classname(), [
                    'options' => ['placeholder' => 'Select ICDX ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'ajax' => [
                            'url' => $urlIcdx,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(term,page) { return {search:term}; }'),
                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                        ],
                        'initSelection' => new JsExpression($initScriptIcdx)
                    ],
                ]);
                echo $form->field($model, 'catatan_reged')->textarea(['rows' => 6]);
            ?>
        </div>
        <?php } ?>
        <div role="tabpanel" class="tab-pane active" id="sa-tab" style="padding:20px">
            <?= $form->field($model, 'status_asuransi_reged')->radioList([ 'Umum' => 'Umum', 'BPJS Kesehatan' => 'BPJS Kesehatan', 'BPJS Ketenagakerjaan' => 'BPJS Ketenagakerjaan', 'Asuransi Lainnya' => 'Asuransi Lainnya',], ['inline' => true]) ?>
            <div id="elrg-1" style="<?= $style1 ?>">
                <?= $form->field($model, 'asuransi_noreg_reged')->textInput(['maxlength' => 15]) ?>
                <?= $form->field($model, 'asuransi_nama_reged')->textInput(['maxlength' => 25]) ?>
                <?php
                echo $form->field($model, 'asuransi_tgl_lahir_reged')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter Tgl Lahir ...'],
                    'pluginOptions' => [
                        'autoclose' => true, 'format' => 'dd-mm-yyyy'
                    ]
                ]);
                ?>
                <?= $form->field($model, 'asuransi_status_jaminan_reged')->textInput(['maxlength' => 30]) ?>
            </div>
            <div id="elrg-2" style="<?= $style2 ?>">
                <?php //$form->field($model, 'asuransi_noreg_other')->textInput(['maxlength' => 15]) ?>
                <?= $form->field($model, 'asuransi_provider_id_reged')->dropDownList(ArrayHelper::map(AsuransiProvider::find()->asArray()->all(), 'id', 'nama'), ['prompt' => 'Select Asuransi', 'style' => 'width:70%;']) ?>
                <?= $form->field($model, 'asuransi_penanggung_jawab_reged')->textInput(['maxlength' => 30]) ?>
                <?= $form->field($model, 'asuransi_alamat_reged')->textInput(['maxlength' => 30]) ?>
                <?= $form->field($model, 'asuransi_notelp_reged')->textInput(['maxlength' => 15]) ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
<?php ActiveForm::end(); ?>
<script>
    $(document).ready(function () {
        $('#tab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        
        $('input[name="Registrasi[status_asuransi_reged]"]').change(function() {
            if ($(this).val() == 'Umum') {
                $('#elrg-1').css('display', 'none');
                $('#elrg-2').css('display', 'none');
                $("#elrg-1 input").val(null);
                $("#elrg-2 input").val(null);
            }
            if ($(this).val() == 'BPJS Kesehatan') {
                $('#elrg-1').css('display', 'block');
                $('#elrg-2').css('display', 'none');
                $("#elrg-1 input").val(null);
                $("#elrg-2 input").val(null);
            }
            if ($(this).val() == 'BPJS Ketenagakerjaan') {
                $('#elrg-1').css('display', 'block');
                $('#elrg-2').css('display', 'none');
                $("#elrg-1 input").val(null);
                $("#elrg-2 input").val(null);
            }
            if ($(this).val() == 'Asuransi Lainnya') {
                $('#elrg-2').css('display', 'block');
                $('#elrg-1').css('display', 'none');
                $("#elrg-1 input").val(null);
                $("#elrg-2 input").val(null);
            }
        });
    });
</script>

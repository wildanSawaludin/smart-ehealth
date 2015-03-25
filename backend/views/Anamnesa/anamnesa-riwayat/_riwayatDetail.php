<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use kartik\widgets\Typeahead;
use yii\helpers\Url;

?>
<div class="modal-content" style="width: 750px;margin-left: 400px;margin-top: 100px">
    <div class="modal-header">
        Riwayat Penyakit
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
                    'id' => 'riwayatPenyakit-form',
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
        <?php
        $url = Url::to(['Anamnesa/anamnesa-riwayat/icdx-list']);
        // Script to initialize the selection based on the value of the select2 element
        $initScript = <<< SCRIPT
            function (element, callback) {
            var id=\$(element).val();
            if (id !== "") {
               \$.ajax("{$url}?id=" + id, {
                 dataType: "json"
               }).done(function(data) { callback(data.results);});
            }

        }
SCRIPT;
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label" for="Diagnosa">Diagnosa :</label>
            <div class="col-md-2">
                <?php
                ;
                echo $form->field($modelAnamnesa, 'riwayatsakit_icdx_id')->widget(Typeahead::classname(), [
                    'options' => ['placeholder' => 'ICD X', 'id' => 'kode', 'value' => ($modelAnamnesa->riwayatsakit_icdx_id != null) ? $modelAnamnesa->riwayatsakitIcdx->kode : ''],
                    'pluginOptions' => ['highlight'=>true],
                    'dataset' => [
                        [
                            'remote' => Url::to(['Anamnesa/anamnesa-riwayat/type-ahead-kode']) . '?q=%QUERY',
                            'limit' => 10
                        ]
                    ],
                    'pluginEvents' => [
                        "typeahead:selected" => "function(obj, datum, name) { \$(nama).val(datum.nama); \$(idicdx).val(datum.id); }",
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-7">
                <?php
                echo $form->field($modelAnamnesa, 'riwayatsakit_icdx_id')->widget(Typeahead::classname(), [
                    'options' => ['placeholder' => 'Nama Penyakit', 'id' => 'nama',  'value' => ($modelAnamnesa->riwayatsakit_icdx_id != null) ? $modelAnamnesa->riwayatsakitIcdx->inggris : ''],
                    'pluginOptions' => ['highlight'=>true],
                    'dataset' => [
                        [
                            'remote' => Url::to(['Anamnesa/anamnesa-riwayat/type-ahead-name']) . '?q=%QUERY',
                            'limit' => 10
                        ]
                    ],
                    'pluginEvents' => [
                        "typeahead:selected" => "function(obj, datum, name) { \$(kode).val(datum.kode); \$(idicdx).val(datum.id); }",
                    ]
                ]);
                ?>
            </div>
        </div>
        <input type="hidden" id="idicdx">
        
        <div class="form-group">
            <label class="col-lg-3 control-label" for="lama_perlangsungan">Lama Perlangsungan :</label>
            <div class="col-lg-2">
                <?= $form->field($modelAnamnesa, 'riwayat_penyakit_nil') ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($modelAnamnesa, 'riwayat_penyakit_lama')->dropDownList(['hari' => 'hari', 'minggu' => 'minggu', 'bulan' => 'bulan', 'tahun' => 'tahun']) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>var id = '<?php echo $_GET['id']; ?>' </script>
<!--<script src="/admin/js/riwayatPenyakit.js"></script>-->
<script>
    $(document).ready(function () {
        $('#kode').mousedown(function(){
            $('#kode').val("");
        });
        $('#nama').mousedown(function(){
            $('#nama').val("");
        });
        $('#btnOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-riwayat/update-penyakit?id='+id,
                data: "riwayat_penyakit_pil=1&riwayatsakit_icdx_id="+$('#idicdx').val()+
                "&riwayat_penyakit_nil="+$('#anamnesa-riwayat_penyakit_nil').val()+
                "&riwayat_penyakit_lama="+$('#anamnesa-riwayat_penyakit_lama').val(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_riwayatpenyakit").modal('hide');
                }
            });
        });
    });
</script>

    
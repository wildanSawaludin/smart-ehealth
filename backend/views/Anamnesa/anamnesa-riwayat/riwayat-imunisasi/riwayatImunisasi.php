<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 20/03/15
 * Time: 21:43
 */

use kartik\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Typeahead;
use yii\helpers\Url;
use yii\bootstrap\Modal;

?>
<div class="modal-content" style="width: 450px;margin-left: 400px;margin-top: 100px">
    <div class="modal-header">
        Riwayat Penyakit
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
            'id' => 'riwayatTransfusi-form',
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
                <div class="form-group field-anamnesa-riwayat_imunisasi has-success">
                    <?php
                        $riwayat_imunisasi = explode(',', $model->riwayat_imunisasi);
                        foreach ($riwayat_imunisasi as $index => $value) {

                    ?>
                        <?php } ?>
                    <div class="col-sm-12"><input type="hidden" value="" name="Anamnesa[riwayat_imunisasi]">
                    <div id="anamnesa-riwayat_imunisasi"><div class="checkbox"><label><input type="checkbox" id="chkbox0" value="Lengkap" <?= ($model->riwayat_imunisasi == 'Lengkap') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Lengkap</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox1" value="Hepatitis B" <?= ($model->riwayat_imunisasi == 'Hepatitis B') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Hepatitis B</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox2" value="BCG" <?= ($model->riwayat_imunisasi == 'BCG') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> BCG</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox3" value="Polio" <?= ($model->riwayat_imunisasi == 'Polio') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Polio</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox4" value="DPT" <?= ($model->riwayat_imunisasi == 'DPT') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> DPT</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox5" value="Campak" <?= ($model->riwayat_imunisasi == 'Campak') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Campak</label></div></div></div>

                    <div class="col-sm-12"><div class="help-block"></div></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group field-anamnesa-riwayat_imunisasi has-success">

                    <div class="col-sm-12"><input type="hidden" value="" name="Anamnesa[riwayat_imunisasi]">
                    <div id="anamnesa-riwayat_imunisasi"><div class="checkbox"><label><input type="checkbox" id="chkbox6" value="Hepatitis A" <?= ($model->riwayat_imunisasi == 'Hepatitis A') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Hepatitis A</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox7" value="MMR" <?= ($model->riwayat_imunisasi == 'MMR') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> MMR</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox8" value="Tifoid" <?= ($model->riwayat_imunisasi == 'Tifoid') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Tifoid</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox9" value="Varisela" <?= ($model->riwayat_imunisasi == 'Varisela') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Varisela</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox10" value="Influenza" <?= ($model->riwayat_imunisasi == 'Influenza') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Influenza</label></div>
                    <div class="checkbox"><label><input type="checkbox" id="chkbox11" value="Tetanus" <?= ($model->riwayat_imunisasi == 'Tetanus') ? 'checked=true':'' ?> name="Anamnesa[riwayat_imunisasi][]"> Tetanus</label></div></div></div>

                    <div class="col-sm-12"><div class="help-block"></div></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-4">
                <input id="btnImunisasiOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>var id = '<?php echo $_GET['id']; ?>' </script>
<!--<script src="/admin/js/riwayatImunisasi.js"></script>-->
<script>
    $(document).ready(function(){
        $('#chkbox0').change(function(){
            if($('#chkbox0').prop( "checked" )){
                $('#chkbox1').prop("disabled", true);
                $('#chkbox2').prop("disabled", true);
                $('#chkbox3').prop("disabled", true);
                $('#chkbox4').prop("disabled", true);
                $('#chkbox5').prop("disabled", true);
                $('#chkbox6').prop("disabled", true);
                $('#chkbox7').prop("disabled", true);
                $('#chkbox8').prop("disabled", true);
                $('#chkbox9').prop("disabled", true);
                $('#chkbox10').prop("disabled", true);
                $('#chkbox11').prop("disabled", true);
            }else{
                $('#chkbox1').prop("disabled", false);
                $('#chkbox2').prop("disabled", false);
                $('#chkbox3').prop("disabled", false);
                $('#chkbox4').prop("disabled", false);
                $('#chkbox5').prop("disabled", false);
                $('#chkbox6').prop("disabled", false);
                $('#chkbox7').prop("disabled", false);
                $('#chkbox8').prop("disabled", false);
                $('#chkbox9').prop("disabled", false);
                $('#chkbox10').prop("disabled", false);
                $('#chkbox11').prop("disabled", false);
            }
        });

        $('#btnImunisasiOk').click(function(){
            var value = $("input:checkbox[name='Anamnesa[riwayat_imunisasi][]']:checked").map(function()
            {
                return $(this).val();
            }).get();

            var imunisasi = $("input:checkbox[name='Anamnesa[riwayat_imunisasi_pil]']:checked").map(function()
            {
                return $(this).val();
            }).get();

            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-imunisasi/update-imunisasi?id=' + id,
                data: 'nama_jenis=' + value + '&imunisasi_pil=' + imunisasi,
                success: function (data) {
                    //alert('Success Update Data');
                    $("#m_riwayatimunisasi").modal('hide');
                }
            });
            console.log(value);
        });
    });
</script>

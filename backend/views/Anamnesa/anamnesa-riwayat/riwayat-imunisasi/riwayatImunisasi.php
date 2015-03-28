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
                        $list = ['Lengkap' => 'Lengkap', 'Hepatitis B' => 'Hepatitis B', 'BCG' => 'BCG', 'Polio' => 'Polio', 'DPT' => 'DPT', 'Campak' => 'Campak'];
                        $model->riwayat_imunisasi = $riwayat_imunisasi;
                        echo $form->field($model, 'riwayat_imunisasi')->checkboxList($list);
                    ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group field-anamnesa-riwayat_imunisasi has-success">
                    <?php
                        $list = ['Hepatitis A' => 'Hepatitis A', 'MMR' => 'MMR', 'Tifoid' => 'Tifoid', 'Varisela' => 'Varisela', 'Influenze' => 'Influenza', 'Tetanus' => 'Tetanus'];
                        $model->riwayat_imunisasi = $riwayat_imunisasi;
                        echo $form->field($model, 'riwayat_imunisasi')->checkboxList($list);
                    ?>

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
        $('input[name="Anamnesa[riwayat_imunisasi][]"]').change(function(){
            //alert($('input[name="Anamnesa[riwayat_imunisasi][]"]').val());
            if($('input[value="Lengkap"]').prop("checked")){
                $('input[value="Hepatitis B"]').attr("checked", false).prop("disabled", true);
                $('input[value="BCG"]').attr("checked", false).prop("disabled", true);
                $('input[value="Polio"]').attr("checked", false).prop("disabled", true);
                $('input[value="DPT"]').attr("checked", false).prop("disabled", true);
                $('input[value="Campak"]').attr("checked", false).prop("disabled", true);
                $('input[value="Hepatitis A"]').attr("checked", false).prop("disabled", true);
                $('input[value="MMR"]').attr("checked", false).prop("disabled", true);
                $('input[value="Tifoid"]').attr("checked", false).prop("disabled", true);
                $('input[value="Varisela"]').attr("checked", false).prop("disabled", true);
                $('input[value="Influenza"]').attr("checked", false).prop("disabled", true);
                $('input[value="Tetanus"]').attr("checked", false).prop("disabled", true);
            }else{
                $('input[value="Hepatitis B"]').prop("disabled", false);
                $('input[value="BCG"]').prop("disabled", false);
                $('input[value="Polio"]').prop("disabled", false);
                $('input[value="DPT"]').prop("disabled", false);
                $('input[value="Campak"]').prop("disabled", false);
                $('input[value="Hepatitis A"]').prop("disabled", false);
                $('input[value="MMR"]').prop("disabled", false);
                $('input[value="Tifoid"]').prop("disabled", false);
                $('input[value="Varisela"]').prop("disabled", false);
                $('input[value="Influenza"]').prop("disabled", false);
                $('input[value="Tetanus"]').prop("disabled", false);
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
                url: baseurl + '/Anamnesa/riwayat-imunisasi/update-imunisasi?id=' + id,
                data: 'nama_jenis=' + value + '&imunisasi_pil=' + imunisasi,
                success: function (data) {
                    alert('Success Update Data');
                    $("#m_riwayatimunisasi").modal('hide');
                }
            });
            console.log(value);
        });
    });
</script>

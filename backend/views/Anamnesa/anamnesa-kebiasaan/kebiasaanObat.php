<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 25/03/15
 * Time: 20:19
 */

use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\helpers\Url;

?>

<div class="modal-content" style="width: 975px;margin-left: 260px;margin-top: 100px">
        <div class="modal-header">
            Obat-obatan
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
            <table class="table">
                <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Awal Pemakaian</th>
                    <th>Lama Pemakaian</th>
                    <th>Waktu Pemakaian</th>
                    <th><input type="button" value="+" class="btn btn-success" id="tambahKebiasaanObat"></th>
                </tr>
                </thead>
                <tbody id="tbody-kebiasaan_obat">
                    <?php
                        foreach($modelKebiasaanObat as $key => $value):
                    ?>
                    <tr id="trObatAppend1">
                        <td><input type="text" id="kebiasaan-nama_obat1" class="form-control obat" name="nama_obat[]" value="<?= $value['nama_obat'] ?>" ></td>
                        <td>
                            <div class="col-md-4">
                                <input type="text" id="awal_pemakaian_nil1" class="form-control obat" name="awal_pemakaian_nil[]" value="<?= $value['awal_pemakaian_nil'] ?>">
                            </div>
                            <div class="col-md-6">
                                <select id="awal_pemakaian_waktu1" class="form-control obat" name="awal_pemakaian_waktu[]">
                                    <option value="hari" <?= ($value['awal_pemakaian_waktu'] == "hari") ? 'selected=selected':'' ?>>hari</option>
                                    <option value="minggu" <?= ($value['awal_pemakaian_waktu'] == "minggu") ? 'selected=selected':'' ?>>minggu</option>
                                    <option value="bulan" <?= ($value['awal_pemakaian_waktu'] == "bulan") ? 'selected=selected':'' ?>>bulan</option>
                                    <option value="tahun" <?= ($value['awal_pemakaian_waktu'] == "tahun") ? 'selected=selected':'' ?>>tahun</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-4">
                                <input type="text" id="lama_pemakaian_nil1" class="form-control obat" name="lama_pemakaian_nil[]" value="<?= $value['lama_pemakaian_nil'] ?>">
                            </div>
                            <div class="col-md-6">
                                <select id="lama_pemakaian_waktu1" class="form-control obat" name="lama_pemakaian_waktu[]">
                                    <option value="hari" <?= ($value['lama_pemakaian_waktu'] == "hari") ? 'selected=selected':'' ?>>hari</option>
                                    <option value="minggu" <?= ($value['lama_pemakaian_waktu'] == "minggu") ? 'selected=selected':'' ?>>minggu</option>
                                    <option value="bulan" <?= ($value['lama_pemakaian_waktu'] == "bulan") ? 'selected=selected':'' ?>>bulan</option>
                                    <option value="tahun" <?= ($value['lama_pemakaian_waktu'] == "tahun") ? 'selected=selected':'' ?>>tahun</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <select id="waktu_pemakaian1" class="form-control obat" name="waktu_pemakaian[]">
                                <option value="Sesudah makan" <?= ($value['waktu_pemakaian'] == "Sesudah makan") ? 'selected=selected':'' ?>>Sesudah makan</option>
                                <option value="Sebelum makan" <?= ($value['waktu_pemakaian'] == "Sebelum makan") ? 'selected=selected':'' ?>>Sebelum makan</option>
                                <option value="Menjelang tidur" <?= ($value['waktu_pemakaian'] == "Menjelang tidur") ? 'selected=selected':'' ?>>Menjelang tidur</option>
                                <option value="Pagi hari" <?= ($value['waktu_pemakaian'] == "Pagi hari") ? 'selected=selected':'' ?>>Pagi hari</option>
                                <option value="Saat makan" <?= ($value['waktu_pemakaian'] == "Saat makan") ? 'selected=selected':'' ?>>Saat makan</option>
                                <option value="Setengah jam sebelum makan" <?= ($value['waktu_pemakaian'] == "Setengah jam sebelum makan") ? 'selected=selected':'' ?>>Setengah jam sebelum makan</option>
                                <option value="1 jam sebelum makan" <?= ($value['waktu_pemakaian'] == "1 jam sebelum makan") ? 'selected=selected':'' ?>>1 jam sebelum makan</option>
                                <option value="Setengah jam setelah makan" <?= ($value['waktu_pemakaian'] == "Setengah jam setelah makan") ? 'selected=selected':'' ?>>Setengah jam setelah makan</option>
                                <option value="1 jam setelah makan <?= ($value['waktu_pemakaian'] == "1 jam setelah makan") ? 'selected=selected':'' ?>">1 jam setelah makan</option>
                            </select>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
			<hr>
            <div class="form-group">
               <div class="col-md-offset-1 col-md-4">
                    <input id="btnKebiasaanOk" type="button" class="btn btn-primary" value="OK">
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script>var id = '<?php echo $_GET['id']; ?>' </script>
<script>
    $(document).ready(function() {
        var i = 1;
        $('#tambahKebiasaanObat').click(function () {
            $('#tbody-kebiasaan_obat').append(
                "<tr id='trObatAppend" + i + "'>" +
                    "<td><input type='text' name='nama_obat[]' class='form-control obat' id='kebiasaan-nama_obat" + i + "'></td>" +
                    "<td>" +
                        "<div class='col-md-4'>" +
                            "<input type='text' name='awal_pemakaian_nil[]' class='form-control obat' id='awal_pemakaian_nil" + i + "'>" +
                        "</div>" +
                        "<div class='col-md-6'>" +
                            "<select name='awal_pemakaian_waktu[]' class='form-control obat' id='awal_pemakaian_waktu" + i + "'>" +
                                "<option value='hari'>hari</option>" +
                                "<option value='minggu'>minggu</option>" +
                                "<option value='bulan'>bulan</option>" +
                                "<option value='tahun'>tahun</option>" +
                            "</select>" +
                        "</div>" +
                    "</td>" +
                    "<td>" +
                        "<div class='col-md-4'>" +
                            "<input type='text' name='lama_pemakaian_nil[]' class='form-control obat' id='lama_pemakaian_nil" + i + "'>" +
                        "</div>" +
                        "<div class='col-md-6'>" +
                            "<select name='lama_pemakaian_waktu[]' class='form-control obat' id='lama_pemakaian_waktu" + i + "'>" +
                                "<option value='hari'>hari</option>" +
                                "<option value='minggu'>minggu</option>" +
                                "<option value='bulan'>bulan</option>" +
                                "<option value='tahun'>tahun</option>" +
                                "</select>" +
                        "</div>" +
                    "</td>" +
                    "<td>" +
                        "<select name='waktu_pemakaian[]' class='form-control obat' id='waktu_pemakaian" + i + "'>" +
                            "<option value='Sesudah makan'>Sesudah makan</option>" +
                            "<option value='Sebelum makan'>Sebelum makan</option>" +
                            "<option value='Menjelang tidur'>Menjelang tidur</option>" +
                            "<option value='Pagi hari'>Pagi hari</option>" +
                            "<option value='Saat makan'>Saat makan</option>" +
                            "<option value='Setengah jam sebelum makan'>Setengah jam sebelum makan</option>" +
                            "<option value='1 jam sebelum makan'>1 jam sebelum makan</option>" +
                            "<option value='Setengah jam setelah makan'>Setengah jam setelah makan</option>" +
                            "<option value='1 jam setelah makan'>1 jam setelah makan</option>" +
                        "</select>" +
                    "</td>" +
                "</tr>"
            );

            i++;
        });

        $('#btnKebiasaanOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-pengobatan?id='+id,
                data: $('.obat').serialize()+"&kebiasaan_obat_pil=1",
                success:function(data){
                    alert('Success Update Data');
                    //$("#m_riwayatpengobatan").modal('hide');
                },

            });

        });
    });
</script>
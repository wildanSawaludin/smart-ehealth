<?php

use kartik\widgets\ActiveForm;
use kartik\grid\GridView;

?>
<div class="modal-content" style="width: 750px;margin-left: 400px;margin-top: 100px">
    <div class="modal-header">
        Riwayat Pengobatan
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
            'id' => 'riwayatPengobatan-form',
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
                <th>Frekuensi</th>
                <th>Lama Pengobatan</th>
                <th><input type="button" value="+" class="btn btn-success" id="tambahObat"></th>
            </tr>
            </thead>
            <tbody id="tbody-obat">
            <?php
                foreach($modelPengobatan as $key => $value):
            ?>
            <tr id="trObat<?= $key+1 ?>">
                <td><div class="form-group field-riwayatpengobatan-nama_obat">

                        <div class="col-sm-12"><input type="text" name="RiwayatPengobatan[nama_obat][]" value="<?= $value['nama_obat'] ?>" class="obat form-control" id="riwayatpengobatan-nama_obat1"></div>

                        <div class="col-sm-12"><div class="help-block"></div></div>
                    </div></td>
                <td><div class="form-group field-riwayatpengobatan-frekuensi">

                        <div class="col-sm-12"><select name="RiwayatPengobatan[frekuensi][]" class="obat form-control" id="riwayatpengobatan-frekuensi1">
                                <option value="1 kali sehari" <?php echo ($value['frekuensi'] == "1 kali sehari") ? 'selected=selected':'' ?>>1 kali sehari</option>
                                <option value="2 kali sehari" <?php echo ($value['frekuensi'] == "2 kali sehari") ? 'selected=selected':'' ?>>2 kali sehari</option>
                                <option value="3 kali sehari" <?php echo ($value['frekuensi'] == "3 kali sehari") ? 'selected=selected':'' ?>>3 kali sehari</option>
                                <option value="Kondisi tertentu" <?php echo ($value['frekuensi'] == "Kondisi tertentu") ? 'selected=selected':'' ?>>Kondisi Tertentu</option>
                            </select></div>

                        <div class="col-sm-12"><div class="help-block"></div></div>
                    </div></td>
                <td>
                    <div class="col-md-4">
                        <div class="form-group field-riwayatpengobatan-lama_pengobatan">

                            <div class="col-sm-12"><input type="text" name="RiwayatPengobatan[lama_pengobatan][]" value="<?= $value['lama_pengobatan'] ?>" class="obat form-control" id="riwayatpengobatan-lama_pengobatan1"></div>

                            <div class="col-sm-12"><div class="help-block"></div></div>
                        </div>                    </div>
                    <div class="col-md-6">
                        <div class="form-group field-riwayatpengobatan-lama_pengobatan_waktu">

                            <div class="col-sm-12"><select name="RiwayatPengobatan[lama_pengobatan_waktu][]" class="obat form-control" id="riwayatpengobatan-lama_pengobatan_waktu1">
                                    <option value="hari" <?php echo ($value['lama_pengobatan_waktu'] == "hari") ? 'selected=selected':'' ?>>hari</option>
                                    <option value="minggu" <?php echo ($value['lama_pengobatan_waktu'] == "minggu") ? 'selected=selected':'' ?>>minggu</option>
                                    <option value="bulan" <?php echo ($value['lama_pengobatan_waktu'] == "bulan") ? 'selected=selected':'' ?>>bulan</option>
                                    <option value="tahun" <?php echo ($value['lama_pengobatan_waktu'] == "tahun") ? 'selected=selected':'' ?>>tahun</option>
                                </select></div>

                            <div class="col-sm-12"><div class="help-block"></div></div>
                        </div>                    </div>
                </td>
                <td><input type="button" id="btnDelete" class="btn btn-danger" value="X" onClick=delObat("<?= $key+1 ?>")> </td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
        <div class="form-group">
            <div class="col-md-offset-10 col-md-2">
                <input id="btnOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>var id = '<?php echo $_GET['id']; ?>' </script>
<!--<script src="/admin/js/riwayatPengobatan.js"></script>-->
<script>
    $(document).ready(function(){
        var i=1;
        $('#tambahObat').click(function(){
            $('#tbody-obat').append(
                "<tr id='trObatAppend"+i+"'>" +
                "<td><input type='text' name='RiwayatPengobatan[nama_obat][]' class='form-control obat' id='riwayatpengobatan-nama_obat"+i+"'></td>" +
                "<td>" +
                "<select name='RiwayatPengobatan[frekuensi][]' class='form-control obat' id='riwayatpengobatan-frekuensi"+i+"'>" +
                "<option value='1 kali sehari'>1 kali sehari</option>" +
                "<option value='2 kali sehari'>2 kali sehari</option>" +
                "<option value='3 kali sehari'>3 kali sehari</option>" +
                "<option value='Kondisi tertentu'>Kondisi Tertentu</option>" +
                "</select>" +
                "</td>" +
                "<td>" +
                "<div class='col-md-4'>" +
                "<input type='text' name='RiwayatPengobatan[lama_pengobatan][]' class='form-control obat' id='riwayatpengobatan-lama_pengobatan"+i+"'>" +
                "</div>" +
                "<div class='col-md-6'>" +
                "<select name='RiwayatPengobatan[lama_pengobatan_waktu][]' class='form-control obat' id='riwayatpengobatan-lama_pengobatan_waktu"+i+"'>" +
                "<option value='hari'>hari</option>" +
                "<option value='minggu'>minggu</option>" +
                "<option value='bulan'>bulan</option>" +
                "<option value='tahun'>tahun</option>" +
                "</select>" +
                "</div>" +
                "</td>" +
                "<td><input type='button' id='btnDelete' class='btn btn-danger' value='X' onClick=delObatAppend("+i+")> </td>" +
                "</tr>"
            );

            i++;
        });

        $('input[name="RiwayatPengobatan[lama_pengobatan][]"]').keypress(function(e){
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $('#btnOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-riwayat/update-pengobatan?id='+id,
                data: $('.obat').serialize(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_riwayatpengobatan").modal('hide');
                }
            }) ;

        });
    });

    function delObat(id){
        $('#trObat'+id).remove();
    }

    function delObatAppend(id){
        $('#trObatAppend'+id).remove();
    }
</script>


    
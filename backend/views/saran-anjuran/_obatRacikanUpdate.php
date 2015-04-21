<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 15/04/15
 * Time: 5:40
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 11/04/15
 * Time: 0:31
 */
use kartik\widgets\ActiveForm;

?>
<div class="row">
    <?php $form = ActiveForm::begin([
        'id' => 'obat-racikan-form',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        //'action' => ['diagnosa/save-obat-nonracikan?id='.$_GET['id'].'&param=Kerja'],
        'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,'showLabels'=>false]
    ]);
    ?>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4">No Resep</label>
            <div class="col-md-3">
                <?= $form->field($resepRacikan, 'no_resep')->textInput(['readonly' => true]) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Dokter</label>
            <div class="col-md-3">
                <input type="text"  class="form-control" readonly="true" value="<?= $resepRacikan->user->username ?>">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <?php $list = ['CITO!' => 'CITO!','Statim' => 'Statim','Urgent' => 'Urgent','P.I.M' => 'P.I.M'] ?>
        <?= $form->field($resepRacikan, 'status')->dropDownList($list) ?>
    </div>

    <div class="col-md-12">
        <a class="btn btn-info" id="tambah_obat_racikan">Tambah Obat</a>
        <div id="nama_obat_racikan">
            <?php if($resepRacikanDetail != null): ?>
                <?php
                    //foreach ($resepRacikanDetail as $value):
                    foreach ($racikanObat as $valueObat):

                    ?>
                    <div class="form-group">

                        <label class="control-label col-md-1"><b>R/</b></label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" readonly value="<?= $valueObat['nama_obat'] ?>">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" readonly value="<?= $valueObat['kek_isi'] ?>">
                        </div>

                    </div>
                    <div class=form-group>
                        <label class="control-label col-md-2">∫</label>
                        <div class="col-md-1">
                            <!--<input type="text" class="form-control" readonly value="<?/*= $value['aturan_pakai_sehari'] */?>">-->
                        </div>
                        <div class="col-md-1">dd</div>
                        <div class="col-md-2"><!--<input type="text" class="form-control" readonly value="<?/*= $value['aturan_pakai_jumlah'] */?>" >--></div>
                    </div>
                <?php endforeach; ?>
                <?php
                foreach ($resepRacikanDetail as $value):
                    //foreach ($racikanObat as $valueObat):

                    ?>
                    <div class="col-md-2">
                        <input type="text" class="form-control" readonly value="<?= $value['m_f'] ?>">
                    </div>
                    <div class=col-md-2>
                        <input type="text" class="form-control" readonly value="<?= $value['jumlah'] ?>">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <input type="hidden" name="id_resep_racikan" value="<?= $resepRacikan['id']; ?>">
    <div class="form-group">
        <label class="control-label col-md-2">iter :</label>
        <div class="col-md-2">
            <?php
            $listIter = ['n.i' => 'n.i', '1x' => '1x', '2x' => '2x', '3x' => '3x', '4x' => '4x'];
            echo $form->field($resepRacikan, 'iter')->dropDownList($listIter);
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2">&nbsp;</label>
        <div class="col-md-2">
            <?= $form->field($resepRacikan, 'label_etiket')->checkbox(['label' => 'Label/Etiket']) ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2">&nbsp;</label>
        <div class="col-md-2">
            <a class="btn btn-info" id="simpan-obat_racikan" onclick="racikanObat()">Ok</a>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>

<script>
    $(document).ready(function(){
        $('#isi_no_resep_racikan').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/saran-anjuran/save-obat-racikan?id=<?php echo $_GET['id']; ?>',
                data: 'param=resep_racikan',
                success:function(data){
                    location.reload(baseurl + '/saran-anjuran/index?id=<?php echo $_GET['id']; ?>');
                }
            });
        });
        var i = 0;
        $('#tambah_obat_racikan').click(function(){

            $('#nama_obat_racikan').append(
                '<div class=form-group>'+
                    '<label class="control-label col-md-1"><b>R/</b></label>'+
                    '<div class="col-md-2 nama_obat'+i+'">'+
                        '<input type="text" class="form-control" name="nama_obat_racikan_'+i+'[]" placeholder="nama obat"> '+
                    '</div>'+
                    '<div class="col-md-2 kek_isi'+i+'">'+
                        '<input type="text" class="form-control" name="kek_isi_racikan_'+i+'[]" placeholder="kek/isi">'+
                    '</div>'+
                    '<div class="col-md-2 tombol"><a class="btn btn-info" id="tambah_nama_obat_racikan" onclick="tambahNamaObatRacikan('+i+')">+</a></div>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label class="control-label col-md-2">m.f</label>'+
                    '<div class="col-md-1">'+
                        '<select name="mf_racikan[]" class="form-control">'+
                            '<option value=""></option>'+
                            '<option value="Pulveres">Pulveres</option>'+
                            '<option value="Pulvis">Pulvis</option>'+
                            '<option value="Caps.">Caps.</option>'+
                            '<option value="Ungt.">Ungt.</option>'+
                            '<option value="Cream">Cream</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-1">dtd No.</div>'+
                    '<div class="col-md-2"><input type="text" name="dtd_no_racikan[]" class="form-control"></div>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label class="control-label col-md-2">∫</label>'+
                    '<div class="col-md-1">'+
                        '<input type="text" class="form-control" name="aturan_pakai_sehari_racikan[]" maxlength="1">'+
                    '</div>'+
                    '<div class="col-md-1">dd</div>'+
                    '<div class="col-md-2"><input type="text" name="aturan_pakai_jumlah_racikan[]" class="form-control"></div>'+
                '</div>'
            );
            i++;
        });

        /*$('#tambah_nama_obat_racikan').click(function(){
            alert('aaa');
            $('.nama_obat').append(
                '<input type="text" class="form-control" name="nama_obat_racikan[]" placeholder="nama obat"><a class="btn btn-info" id="hapus_nama_obat_racikan">-</a>'
            );

            $('.kek_isi').append(
            '<input type="text" class="form-control" name="kek_isi_racikan[]" placeholder="kek/isi">'
            );
        });*/

        /*$('#simpan-obat-racikan').click(function(){
            $.ajax({
                type: 'POST',
                url: baseurl + '/saran-anjuran/save-resep-racikan-detail?id=obat_racikan_detail',
                data: $('#obat-racikan-form').serialize(),
                success:function(data){
                    console.log(data);
                }
            });
        });*/
    });
    var a = 2;
    function tambahNamaObatRacikan(i)
    {

        $('.nama_obat'+i).append(
            '<input type="text" class="form-control" name="nama_obat_racikan_'+i+'[]" placeholder="nama obat">'
        );

        $('.kek_isi'+i).append(
            '<input type="text" class="form-control" name="kek_isi_racikan_'+i+'[]" placeholder="kek/isi">'
        );
        a++;
        /*$('.tombol').append(
            '<a class="btn btn-danger" id="hapus_nama_obat_racikan">-</a>'
        );*/
    }

    function racikanObat()
    {
        $.ajax({
            type: 'POST',
            url: baseurl + '/saran-anjuran/save-resep-racikan-detail?id=obat_racikan_detail',
            data: $('#obat-racikan-form').serialize(),
            success:function(data){
                console.log(data);
            }
        });
    }
</script>

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
        'id' => 'obat-non-racikan-form',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        //'action' => ['diagnosa/save-obat-nonracikan?id='.$_GET['id'].'&param=Kerja'],
        'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,'showLabels'=>false]
    ]);
    ?>

        <div class="form-group">
            <label class="control-label">No. Resep</label>
            <input type="text" id="no_resep" readonly="true"><a id="isi_no_resep" class="btn btn-info">Isi No Resep</a>
            <br>
            <label class="control-label">Dokter</label>
            <input type="text" readonly="true" value="<?= Yii::$app->user->identity->username ?>">
        </div>

    <div class="col-md-6">
        <?php $list = ['CITO!' => 'CITO!','Statim' => 'Statim','Urgent' => 'Urgent','P.I.M' => 'P.I.M'] ?>
        <?= $form->field($resepNonracikan, 'status')->dropDownList($list) ?>
    </div>

    <div class="col-md-12">
        <a class="btn btn-info" id="tambah_obat">Tambah Obat</a>
        <div id="nama_obat">

        </div>
    </div>
    <input type="hidden" name="id_resep_nonracikan" value="<?= $resepNonracikan['id']; ?>">
    <div class="form-group">
        <label class="control-label col-md-2">iter :</label>
        <div class="col-md-2">
            <?php
                $listIter = ['n.i' => 'n.i', '1x' => '1x', '2x' => '2x', '3x' => '3x', '4x' => '4x'];
                echo $form->field($resepNonracikan, 'iter')->dropDownList($listIter);
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2">&nbsp;</label>
        <div class="col-md-2">
            <?= $form->field($resepNonracikan, 'label_etiket')->checkbox(['label' => 'Label/Etiket']) ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2">&nbsp;</label>
        <div class="col-md-2">
            <a class="btn btn-info" id="simpan-obat">Ok</a>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>
<?php

/*$this->registerJs("$(document).ready(function () {
       $('#tambah_obat').click(function(){
            $('#nama_obat').append(
                '<div class=form-group>'+
                    '<label class=control-label col-md-1><b>R/</b></label>'+
                    '<div class=col-md-2>'+
                        '<input type=text class=form-control name=nama_obat[] placeholder=nama obat>'+
                    '</div>'+
                    '<div class=col-md-2>'+
                        '<input type=text class=form-control name=kek_isi[] placeholder=kek/isi>'+
                    '</div>'+
                    '<div class=col-md-2>'+
                        '<input type=text class=form-control name=sediaan[] placeholder=sediaan>'+
                    '</div>'+
                    '<div class=col-md-2>'+
                        '<input type=text class=form-control name=jumlah[] placeholder=jumlah>'+
                    '</div>'+

                '</div>'+
                '<div class=form-group>'+
                    '<label class=control-label col-md-2>∫</label>'+
                    '<div class=col-md-1>'+
                        '<input type=text class=form-control name=aturan_pakai_sehari[] maxlength=1>'+
                    '</div>'+
                    '<div class=col-md-1>dd</div>'+
                    '<div class=col-md-2><input type=text name=aturan_pakai_jumlah[] class=form-control></div>'+
                '</div>'
            )
        });

        $('#simpan-obat').click(function(){
            $.ajax({
                type: 'POST',
                url: baseurl + 'diagnosa/save-obat-nonracikan?id=obat_detail',
                data: $('#obat-non-racikan-form').serialize(),
                success:function(data){
                    console.log(data);
                }
            });
        });
    });
");*/
?>
<script>
    $(document).ready(function(){
       $('#isi_no_resep').click(function(){
           $.ajax({
               type: "POST",
               url: baseurl + '/saran-anjuran/save-obat-nonracikan?id=<?php echo $_GET['id']; ?>',
               data: 'param=resep_non_racikan',
               success:function(data){
               		location.reload(baseurl + '/saran-anjuran/index?id=<?php echo $_GET['id']; ?>');
               }
           });
       });

        $('#tambah_obat').click(function(){
            $('#nama_obat').append(
                '<div class=form-group>'+
                    '<label class="control-label col-md-1"><b>R/</b></label>'+
                    '<div class="col-md-2">'+
                        '<input type="text" class="form-control" name="nama_obat[]" placeholder="nama obat">'+
                    '</div>'+
                    '<div class="col-md-2">'+
                        '<input type="text" class="form-control" name="kek_isi[]" placeholder="kek/isi">'+
                    '</div>'+
                    '<div class="col-md-2">'+
                        '<input type="text" class="form-control" name="sediaan[]" placeholder="sediaan">'+
                    '</div>'+
                    '<div class="col-md-2">'+
                        '<input type="text" class="form-control" name="jumlah[]" placeholder="jumlah">'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label class="control-label col-md-2">∫</label>'+
                    '<div class="col-md-1">'+
                        '<input type="text" class="form-control" name="aturan_pakai_sehari[]" maxlength="1">'+
                    '</div>'+
                    '<div class="col-md-1">dd</div>'+
                    '<div class="col-md-2"><input type="text" name="aturan_pakai_jumlah[]" class="form-control"></div>'+
                '</div>'
            )
        });

        $('#simpan-obat').click(function(){
            $.ajax({
                type: 'POST',
                url: baseurl + '/saran-anjuran/save-resep-nonracikan-detail?id=obat_detail',
                data: $('#obat-non-racikan-form').serialize(),
                success:function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
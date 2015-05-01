<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 25/03/15
 * Time: 20:19
 */

use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\bootstrap\Modal;
use yii\helpers\Url;

?>

<div class="modal-content" style="width: 750px;margin-left: 260px;margin-top: 100px">
    <div class="modal-header">
        Rokok
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
        <div class="form-group">
            <label class="col-md-3 control-label">Pemakaian per hari :</label>
            <div class="col-md-2" style="width: 11%">
                <?= $form->field($model, 'kebiasaan_rokok_jmlh')->textInput(['class' => 'numeric', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, numerik maksimal 2 karakter']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'kebiasaan_rokok_satuan')->dropDownList(['batang' => 'batang', 'bungkus' => 'bungkus']) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Lama Pemakaian :</label>
            <div class="col-md-2" style="width: 11%">
                <?= $form->field($model, 'kebiasaan_rokok_nil')->textInput(['class' => 'numeric', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, numerik maksimal 2 karakter']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'kebiasaan_rokok_lama')->dropDownList(['hari' => 'hari', 'minggu' => 'minggu', 'bulan' => 'bulan', 'tahun' => 'tahun']) ?>
            </div>
            <div class="col-md-1">
                <a href="#" class="lama_pemakaian_popup"><span style="font-size:24px;" class="glyphicon glyphicon-edit"></span></a>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Nama/Jenis Rokok :</label>
            <div class="col-md-5">
                <?php
                    $data = ['Dji Sam Soe', 'Marlboro', 'Surya', 'Sampoerna', 'Gudang Garam', 'Jarum Super', 'Dunhill', 'Class Mild', 'Magnum'];
                    echo $form->field($model, 'kebiasaan_rokok_jenis')->widget(Typeahead::classname(), [
                        'options' => ['placeholder' => 'Jenis rokok', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, teks maksimal 30 karakter (autocomplete attribute)'],
                        'pluginOptions' => ['highlight'=>true],
                        'dataset' => [
                            [
                                'local' =>  $data,
                                'limit' => 10
                            ]
                        ]
                    ]);
                ?>
            </div>
        </div>
		<hr>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-4">
                <input id="btnKebiasaanRokokOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php
        Modal::begin([
            'id' => 'm_lamapemakaianrokok',
            'header' => '<h7>Lama Pemakaian</h7>'
        ]);
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label">Awal pemakaian :</label>
            <div class="col-md-4">
                <?= $form->field($model, 'kebiasaan_rokok_awal')->dropDownList(['' => '', 'Usia < 10 tahun' => 'Usia < 10 tahun','Usia 10 – 20 tahun' => 'Usia 10 – 20 tahun','Usia 20 – 30 tahun' => 'Usia 20 – 30 tahun','Usia > 30 tahun' => 'Usia > 30 tahun']) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Waktu berhenti :</label>
            <div class="col-md-4">
                <?= $form->field($model, 'kebiasaan_rokok_berhenti')->dropDownList(['' => '', 'Usia < 10 tahun' => 'Usia < 10 tahun','Usia 10 – 20 tahun' => 'Usia 10 – 20 tahun','Usia 20 – 30 tahun' => 'Usia 20 – 30 tahun','Usia > 30 tahun' => 'Usia > 30 tahun']) ?>
            </div>
        </div>
		<hr>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-4">
                <input id="btnLamaPemakaian" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php
        Modal::end();
        ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>var id = '<?php echo $_GET['id']; ?>' </script>
<script>
    $(document).ready(function(){
        jQuery('.numeric').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        $('.lama_pemakaian_popup').click(function(){
            $('#m_lamapemakaianrokok').modal('show');
        });

        $('#btnKebiasaanRokokOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-rokok?id='+id,
                data: "kebiasaan_rokok_jmlh="+$('#anamnesa-kebiasaan_rokok_jmlh').val()+
                      "&kebiasaan_rokok_satuan="+$('#anamnesa-kebiasaan_rokok_satuan').val()+
                      "&anamnesa-kebiasaan_rokok_nil="+$('#anamnesa-kebiasaan_rokok_nil').val()+
                      "&anamnesa-kebiasaan_rokok_jenis="+$('#anamnesa-kebiasaan_rokok_jenis').val(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_kebiasaanrokok").modal('hide');
                }
            })
        });

        $('#btnLamaPemakaian').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-rokok?id='+id,
                data: "kebiasaan_rokok_awal="+$('#anamnesa-kebiasaan_rokok_awal').val()+"&kebiasaan_rokok_berhenti="+$('#anamnesa-kebiasaan_rokok_berhenti').val(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_lamapemakaianrokok").modal('hide');
                }
            })
        });
    });
</script>
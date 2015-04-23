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
        Kegiatan Waktu Senggang
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
            'id' => 'kebiasaan-kegiatan-form',
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
		<div class="col-md-12">
			<div class="form-group">
				<label for="jenis_kegiatan" class="col-md-4">Jenis Kegiatan :</label>
				<div class="col-md-4">
					<?= $form->field($model, 'kegiatan_jenis')->textInput(['data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, teks maksimal 30 karakter']) ?>
				</div>
			</div>
        </div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="frekuensi" style="margin-top:5px;" class="col-md-4">Frekuensi :</label>
				<div class="col-md-2">
					<?= $form->field($model, 'kegiatan_frekuensi_kali')->textInput(['class' => 'numeric', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, numerik maksimal 2 karakter']) ?>
				</div>
				<div class="col-md-1" style="margin-top:5px;">Kali</div>
				<div class="col-md-4">
					<?php
					$listFrekuensi = ['sehari' => 'sehari', 'seminggu' => 'seminggu', 'sebulan' => 'setahun'];
					echo $form->field($model, 'kegiatan_frekuensi_lama')->dropDownList($listFrekuensi);
					?>
				</div>
			</div>
		</div>
		&nbsp;
		<hr>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnKebiasaanKegiatanOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>

<script>var id = '<?php echo $_GET['id']; ?>' </script>
<script>
    $(document).ready(function(){
        jQuery('.numeric').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        $('#btnKebiasaanKegiatanOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-kegiatan?id='+id,
                data: $('#kebiasaan-kegiatan-form').serialize(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_kebiasaaanWaktuSenggang").modal('hide');
                }
            })
        });

    });
</script>
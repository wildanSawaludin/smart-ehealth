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
        Olahraga
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
            'id' => 'kebiasaan-olahraga-form',
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
				<label for="jenis" class="col-md-3">Jenis :</label>
				<div class="col-md-3">
					<?php

						$list = ['Jogging' => 'Jogging', 'Lari' => 'Lari', 'Bersepeda' => 'Bersepeda', 'Renang' => 'Renang', 'Senam' => 'Senam', 'Yoga' => 'Yoga'];
						$model->olahraga_jenis = $olahraga_jenis;
						echo $form->field($model, 'olahraga_jenis')->checkboxList($list);
						
					?>
				</div>
				<div class="col-md-3">
					<?php

						$list = ['Sepak bola' => 'Sepak bola', 'Voli' => 'Voli', 'Bola basket' => 'Bola basket', 'Sepak takraw' => 'Sepak takraw', 'Gym' => 'Gym'];
						$model->olahraga_jenis = $olahraga_jenis;
						echo $form->field($model, 'olahraga_jenis')->checkboxList($list);
						echo $form->field($model, 'olahraga_jenis_lainnya_pil')->checkbox(['label' => '','style' => 'position:absolute;margin-top:-10px;margin-left:-20px;',]);
						echo $form->field($model, 'olahraga_jenis_lainnya')->textInput(['placeHolder' => 'Lainnya', 'data-toggle' => 'tooltip', 'style' => 'position:absolute;margin-top:-50px;margin-left:20px;', 'data-placement' => 'middle', 'title' => 'Manual, teks maksimal 30 karakter']);
					?>
				</div>
				
			</div>
		</div>
        
		 <div class="col-md-12"> 
			<div class="form-group">
				<label for="frekuensi" style="margin-top:5px;" class="col-md-3">Frekuensi</label>
				<div class="col-md-2">
					<?= $form->field($model, 'olahraga_frekuensi_kali')->textInput(['data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, numerik maksimal 2 karakter']) ?>
				</div>
				<div class="col-md-1" style="margin-top:5px;">Kali</div>
				<div class="col-md-4">
					<?php
						$listFrekuensi = ['sehari' => 'sehari', 'seminggu' => 'seminggu', 'sebulan' => 'setahun'];
						echo $form->field($model, 'olahraga_frekuensi_lama')->dropDownList($listFrekuensi);
					?>
				</div>
			</div>
		</div>
		&nbsp;
		<hr>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-4">
                <input id="btnKebiasaanOlahragaOk" type="button" class="btn btn-primary" value="OK">
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

        $('.lama_pemakaian_popup').click(function(){
            $('#m_lamapemakaianalkohol').modal('show');
        });

        $('#btnKebiasaanOlahragaOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-olahraga?id='+id,
                data: $('#kebiasaan-olahraga-form').serialize(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_kebiasaanolahraga").modal('hide');
                }
            })
        });

    });
</script>
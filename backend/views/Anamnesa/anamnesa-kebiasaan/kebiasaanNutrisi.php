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
        Nutrisi
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
        <ul class="nav nav-tabs" id="tabs-cnt" style="padding-top:0px;margin-bottom: 10px">
            <li class="active"><a href="#makanan" data-toggle="tab">Makanan </a></li>
            <li ><a href="#minuman" data-toggle="tab">Minuman</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="makanan">
                <div class="form-group">
                    <div class="col-md-4">
                        <?= $form->field($model, 'nutrisi_selera_pil')->checkbox(['label' => 'Selera Makan :']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'nutrisi_selera_makan')->dropDownList(['Baik' => 'Baik', 'Meningkat' => 'Meningkat', 'Menurun' => 'Menurun']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <?= $form->field($model, 'makan_frekuensi_pil')->checkbox(['label' => 'Frekuensi :']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'makan_frekuensi')->dropDownList(['3 kali sehari' => '3 kali sehari', '< 3 kali sehari' => '< 3 kali sehari', '> 3 kali sehari' => '> 3 kali sehari']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <?= $form->field($model, 'makan_pembatasan_pil')->checkbox(['label' => 'Pembatasan Asupan :']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'makan_frekuensi')->dropDownList(['3 kali sehari' => '3 kali sehari', '< 3 kali sehari' => '< 3 kali sehari', '> 3 kali sehari' => '> 3 kali sehari']) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="minuman">
                fgggff
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

        $('#btnKebiasaanAlkoholOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-alkohol?id='+id,
                data: "kebiasaan_alkohol_pil=1"+
                      "&anamnesa-kebiasaan_alkohol_nil="+$('#anamnesa-kebiasaan_alkohol_nil').val()+
                      "&anamnesa-kebiasaan_alkohol_lama="+$('#anamnesa-kebiasaan_alkohol_lama').val()+
                      "&anamnesa-kebiasaan_alkohol_jenis="+$('#anamnesa-kebiasaan_alkohol_jenis').val(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_kebiasaanalkohol").modal('hide');
                }
            })
        });

        $('#btnLamaPemakaian').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-alkohol?id='+id,
                data: "kebiasaan_alkohol_awal="+$('#anamnesa-kebiasaan_alkohol_awal').val()+"&kebiasaan_alkohol_berhenti="+$('#anamnesa-kebiasaan_alkohol_berhenti').val(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_lamapemakaianalkohol").modal('hide');
                }
            })
        });
    });
</script>
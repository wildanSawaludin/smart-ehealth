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

<div class="modal-content" style="width: 620px;margin-left: 260px;margin-top: 100px">
    <div class="modal-header">
        Perawatan Diri
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
            'id' => 'perawatan-diri-form',
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
                    <th></th>
                    <th>Frekuensi</th>
                    <th>Cara</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $form->field($model, 'perawatan_mandi_pil')->checkbox(['label' => 'Mandi']) ?></td>
                    <td>
                        <div class="col-md-3">
                            <?= $form->field($model, 'perawatan_mandi_jmlh')->textInput(['class' => 'numeric', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, numerik maksimal 2 karakter']) ?>
                        </div>
                        <div class="col-md-2">Kali</div>
                        <div class="col-md-5">
                            <?= $form->field($model, 'perawatan_mandi_lama')->dropDownList(['sehari' => 'sehari', 'seminggu' => 'seminggu', 'sebulan' => 'sebulan', 'setahun' => 'setahun']) ?>
                        </div>
                    </td>
                    <td>
                        <?= $form->field($model, 'perawatan_mandi_oleh')->dropDownList(['Sendiri' => 'Sendiri', 'Dibantu' => 'Dibantu']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?= $form->field($model, 'perawatan_rambut_pil')->checkbox(['label' => 'Cuci rambut']) ?></td>
                    <td>
                        <div class="col-md-3">
                            <?= $form->field($model, 'perawatan_rambut_jmlh')->textInput(['class' => 'numeric', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, numerik maksimal 2 karakter']) ?>
                        </div>
                        <div class="col-md-2">Kali</div>
                        <div class="col-md-5">
                            <?= $form->field($model, 'perawatan_rambut_lama')->dropDownList(['sehari' => 'sehari', 'seminggu' => 'seminggu', 'sebulan' => 'sebulan', 'setahun' => 'setahun']) ?>
                        </div>
                    </td>
                    <td>
                        <?= $form->field($model, 'perawatan_rambut_oleh')->dropDownList(['Sendiri' => 'Sendiri', 'Dibantu' => 'Dibantu']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?= $form->field($model, 'perawatan_kuku_pil')->checkbox(['label' => 'Perawatan kuku']) ?></td>
                    <td>
                        <div class="col-md-3">
                            <?= $form->field($model, 'perawatan_kuku_jmlh')->textInput(['class' => 'numeric', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, numerik maksimal 2 karakter']) ?>
                        </div>
                        <div class="col-md-2">Kali</div>
                        <div class="col-md-5">
                            <?= $form->field($model, 'perawatan_kuku_lama')->dropDownList(['sehari' => 'sehari', 'seminggu' => 'seminggu', 'sebulan' => 'sebulan', 'setahun' => 'setahun']) ?>
                        </div>
                    </td>
                    <td>
                        <?= $form->field($model, 'perawatan_kuku_oleh')->dropDownList(['Sendiri' => 'Sendiri', 'Dibantu' => 'Dibantu']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?= $form->field($model, 'perawatan_tidur_pil')->checkbox(['label' => 'Tidur']) ?></td>
                    <td>
                        <div class="col-md-3">
                            <?= $form->field($model, 'perawatan_tidur_jmlh')->textInput(['class' => 'numeric', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Manual, numerik maksimal 2 karakter']) ?>
                        </div>
                        <div class="col-md-2">Kali</div>
                        <div class="col-md-5">
                            <?= $form->field($model, 'perawatan_tidur_lama')->dropDownList(['sehari' => 'sehari', 'seminggu' => 'seminggu', 'sebulan' => 'sebulan', 'setahun' => 'setahun']) ?>
                        </div>
                    </td>
                    <td>
                        <?= $form->field($model, 'perawatan_tidur_oleh')->dropDownList(['Sendiri' => 'Sendiri', 'Dibantu' => 'Dibantu']) ?>
                    </td>
                </tr>
            </tbody>
        </table>
		<hr>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-4">
                <input id="btnKebiasaanPerawatanOk" type="button" class="btn btn-primary" value="OK">
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

        $('#btnKebiasaanPerawatanOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-perawatan?id='+id,
                data: $("#perawatan-diri-form").serialize(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_kebiasaanperawatandiri").modal('hide');
                }
            })
        });

    });

</script>
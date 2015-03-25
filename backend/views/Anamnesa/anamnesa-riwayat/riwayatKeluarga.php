<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 19/03/15
 * Time: 20:28
 */
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\helpers\Url;

?>
<div class="modal-content" style="width: 750px;margin-left: 400px;margin-top: 100px">
    <div class="modal-header">
        Riwayat Penyakit
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
            <label class="col-md-3 control-label" for="Diagnosa">Diagnosa :</label>
            <div class="col-md-2">
                <?php
                echo $form->field($model, 'riwayatkel_icdx_id')->widget(Typeahead::classname(), [
                    'options' => ['placeholder' => 'ICD X', 'id' => 'kode', 'value' => ($model->riwayatkel_icdx_id != null) ? $model->riwayatsakitIcdxKel->kode : ''],
                    'pluginOptions' => ['highlight'=>true],
                    'dataset' => [
                        [
                            'remote' => Url::to(['Anamnesa/anamnesa-riwayat/type-ahead-kode']) . '?q=%QUERY',
                            'limit' => 10
                        ]
                    ],
                    'pluginEvents' => [
                        "typeahead:selected" => "function(obj, datum, name) { \$(nama).val(datum.nama); \$(idicdx).val(datum.id); }",
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-7">
                <?php
                echo $form->field($model, 'riwayatkel_icdx_id')->widget(Typeahead::classname(), [
                    'options' => ['placeholder' => 'Nama Penyakit', 'id' => 'nama', 'value' => ($model->riwayatkel_icdx_id != null) ? $model->riwayatsakitIcdxKel->inggris : ''],
                    'pluginOptions' => ['highlight'=>true],
                    'dataset' => [
                        [
                            'remote' => Url::to(['Anamnesa/anamnesa-riwayat/type-ahead-name']) . '?q=%QUERY',
                            'limit' => 10
                        ]
                    ],
                    'pluginEvents' => [
                        "typeahead:selected" => "function(obj, datum, name) { \$(kode).val(datum.kode); \$(idicdx).val(datum.id); }",
                    ]
                ]);
                ?>
            </div>
        </div>
        <input type="hidden" id="idicdx">


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>var id = '<?php echo $_GET['id']; ?>' </script>
<script src="/admin/js/riwayatKeluarga.js"></script>

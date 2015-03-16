<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use kartik\widgets\TypeaheadBasic;
use yii\helpers\Url;

?>
<div class="modal-content" style="width: 750px;margin-left: 400px;margin-top: 100px">
    <div class="modal-header">
        Riwayat Penyakit
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
                    'id' => 'keluhanDetail-form',
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
        <?php
        $url = Url::to(['Anamnesa/anamnesa-riwayat/icdx-list']);
        // Script to initialize the selection based on the value of the select2 element
        $initScript = <<< SCRIPT
            function (element, callback) {
            var id=\$(element).val();
            if (id !== "") {
               \$.ajax("{$url}?id=" + id, {
                 dataType: "json"
               }).done(function(data) { callback(data.results);});
            }

        }
SCRIPT;
        ?>
        <div class="form-group">
            <label class="col-md-2 control-label" for="Diagnosa">Diagnosa :</label>
            <div class="col-md-8">
                <?php
                echo $form->field($model, 'kode')->widget(Select2::classname(), [
                    'options' => ['placeholder' => 'Kode ICD X'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'ajax' => [
                            'url' => $url,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(term,page) { return {search:term}; }'),
                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                        ],
                        'initSelection' => new JsExpression($initScript)
                    ],
                ]);
                ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>var id = '<?php echo $_GET['id']; ?>' </script>
<script src="/admin/js/riwayatPenyakit.js"></script>

    
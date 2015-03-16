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
                    
            echo $form->field($model, 'kode')->widget(Select2::classname(), [
                    'options' => ['placeholder' => 'Search for a city ...'],
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
            
            $data = ['aaa','fff'];
            echo $form->field($model, 'kode')->widget(TypeaheadBasic::classname(), [
            'data' => ['aaa','fff'],
            'options' => ['placeholder' => 'Filter as you type ...'],
            'pluginOptions' => ['highlight'=>true],
            
            ]);
        ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
            

    
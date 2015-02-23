<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Select2;
use backend\models\Pasien;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\models\AsuransiProvider */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .form-horizontal .control-label {
        margin-bottom: 0;
        padding-top: 7px;
        text-align: left;
    }
</style>

<div class="asuransi-provider-form">

    <?php
    $form = ActiveForm::begin([
                'id' => 'registrasi-form',
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => [
                    'deviceSize' => ActiveForm::SIZE_SMALL
                ]
    ]);
    $model->pasien_id = $pId;

    // The controller action that will render the list
    $url = \yii\helpers\Url::to(['pasien-list']);

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
    <!-- Tab panes -->
            <?php echo $form->errorSummary($model); ?>
            <?php
            echo Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'address_detail' => [
                        'label' => 'Pasien',
                        'labelSpan' => 2,
                        'columns' => 3,
                        'attributes' => [
                            'pasien_id' => [
                                'type' => Form::INPUT_WIDGET,
                                'widgetClass' => '\kartik\widgets\Select2',
                                'options' => [
//                                    'data' => ArrayHelper::map(Pasien::find()->asArray()->all(), 'id', 'nama'),
                                    'options' => ['placeholder' => 'Cari dan pilih pasien ...'],
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
                                ],
                                'columnOptions' => ['colspan' => 2, 'class' => 'col-sm-7'],
                            ],
                        ]
                    ]
                ]
            ]);
            //$form->field($model, 'pasienId')->textInput(); 
            ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'penanggung_jawab')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'no_pks')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tgl_mulai_ks')->textInput() ?>

    <?= $form->field($model, 'tgl_selesai_ks')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>



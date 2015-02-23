<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Select2;
use backend\models\Pasien;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use kartik\widgets\DatePicker;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\models\AsuransiProvider */
/* @var $form yii\widgets\ActiveForm */
if ($model->tgl_mulai_ks){
    $model->tgl_mulai_ks = Yii::$app->get('helper')->dateFormatingAppStrip($model->tgl_mulai_ks);
}
if ($model->tgl_selesai_ks){
    $model->tgl_selesai_ks = Yii::$app->get('helper')->dateFormatingAppStrip($model->tgl_selesai_ks);
}
?>
<style>
    .form-horizontal .control-label {
        margin-bottom: 0;
        padding-top: 7px;
        text-align: left;
    }
</style>


    <?php
    $form = ActiveForm::begin([
                'id' => 'registrasi-form',
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => [
                    'deviceSize' => ActiveForm::SIZE_SMALL
                ]
    ]);

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
                        'columns' => 2,
                        'attributes' => [
                            'pasien_id' => [
                                'type' => Form::INPUT_WIDGET,
                                'widgetClass' => '\kartik\widgets\Select2',
                                'options' => [
//                                    'data' => ArrayHelper::map(Pasien::find()->asArray()->all(), 'id', 'nama'),
                                    'options' => ['placeholder' => 'Cari dan pilih pasien ...','style' => 'width:60%;'],
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
                                'columnOptions' => ['colspan' => 2],
                            ],
                        ]
                    ]
                ]
            ]);
            //$form->field($model, 'pasienId')->textInput(); 
            ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 2,'style' => 'width:60%;']) ?>

    <?= $form->field($model, 'penanggung_jawab')->textInput(['maxlength' => 100,'style' => 'width:60%;']) ?>

    <?= $form->field($model, 'no_pks')->textInput(['maxlength' => 50,'style' => 'width:60%;']) ?>
    
    <?php
                echo $form->field($model, 'tgl_mulai_ks')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Masukan Tanggal Mulai Kerjasama ...','style' => 'width:40%;'],
                    'pluginOptions' => [
                        'autoclose' => true, 'format' => 'dd-mm-yyyy'
                    ],
                ]);
    ?>
    
    <?php
                echo $form->field($model, 'tgl_selesai_ks')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Masukan Tanggal Selesai Kerjasama ...','style' => 'width:40%;'],
                    'pluginOptions' => [
                        'autoclose' => true, 'format' => 'dd-mm-yyyy'
                    ],
                ]);
    ?>

    <div class="form-group" style="padding-left: 15px">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



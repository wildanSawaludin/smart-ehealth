<?php
use kartik\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\bootstrap\Modal;

$form = ActiveForm::begin([
        'id' => 'kelompok-pemeriksaan-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'deviceSize' => ActiveForm::SIZE_SMALL,
            'labelSpan' => 1,
            'showLabels'=>false

        ]
    ]);

    $list1 = ['Hematologi' => 'Hematologi',
        'Kimia Darah' => 'Kimia Darah',
        'Imunoserologi' => 'Imunoserologi',
        'Urinalisa' => 'Urinalisa',
        'Analisa Feses' => 'Analisa Feses',
        'Endokrinologi' => 'Endokrinologi'
    ];
    $list2 = [
        'Alergi' => 'Alergi',
        'Mikrobiologi' => 'Mikrobiologi',
        'Tuberkulosis' => 'Tuberkulosis',
        'Analisa CSF' => 'Analisa CSF',
        'Penanda Tumor' => 'Penanda Tumor',
        'Lain-Lain' => 'Lain-lain'
    ];
?>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'kp_hematologi_pil')->checkboxList($list1,[
            'item' =>
                function ($index, $label, $name, $checked, $value) {
                    return Html::checkbox($name, $checked, [
                        'value' => $value,
                        'label' => '<div class="checkbox"><label for="' . $label . '">' . $label . '</label></div>',
                        'labelOptions' => [
                            'class' => 'ckbox ckbox-primary checkbox-inline',
                        ],
                        'id' => $label,
                    ]);
                }
        ]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'kp_hematologi_pil')->checkboxList($list2,[
            'item' =>
                function ($index, $label, $name, $checked, $value) {
                    return Html::checkbox($name, $checked, [
                        'value' => $value,
                        'label' => '<div class="checkbox"><label for="' . $label . '">' . $label . '</label></div>',
                        'labelOptions' => [
                            'class' => 'ckbox ckbox-primary checkbox-inline',
                        ],
                        'id' => $label,
                    ]);
                }
        ]) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
<?php
Modal::begin([
    'id' => 'm_hematologi',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_urinalisa',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_alergi',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();
?>
<script>
    $(document).ready(function(){
        $("#Hematologi").change(function(){
            $('#m_hematologi').html('');
            $('#m_hematologi').load(baseurl + '/saran-anjuran/popup-hematologi?id='+id+'&param='+$(this).val());
            $('#m_hematologi').modal('show');
        });

        $("#Urinalisa").change(function(){
            $('#m_urinalisa').html('');
            $('#m_urinalisa').load(baseurl + '/saran-anjuran/popup-urinalisa?id='+id+'&param='+$(this).val());
            $('#m_urinalisa').modal('show');
        });

        $("#Alergi").change(function(){
            $('#m_alergi').html('');
            $('#m_alergi').load(baseurl + '/saran-anjuran/popup-alergi?id='+id+'&param='+$(this).val());
            $('#m_alergi').modal('show');
        });
    });
</script>

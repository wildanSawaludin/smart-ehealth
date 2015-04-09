<?php
use kartik\widgets\ActiveForm;
use kartik\grid\GridView;

?>

<div class="diagnosa-awal-form">

    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin([
                'id' => 'diagnosa-form',
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'action' => ['diagnosa/save?id='.$_GET['id'].'&param=Banding'],
                'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,'showLabels'=>false]
            ]);
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Diagnosa</th>
                    <th>Action</th>
                    <th><a href="#" id="tambah-diagnosa-banding" class="btn btn-info">+</a></th>
                </tr>
                </thead>
                <tbody id="tbody-diagnosa-banding">
                <?php foreach ($modelDiagnosa as $value):?>
                    <tr id="tr-diagnosa-awal<?= $model['icdx_id'] ?>">
                        <td><?= $value->icdx->kode ?></td>
                        <td><?= $value->icdx->inggris ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <button class="btn btn-primary" type="submit">Simpan</button>
            <?php ActiveForm::end() ?>
        </div>

    </div>

</div>
<script>
    $(document).ready(function(){
        /*$('#info').click(function(){
         $('#info-diagnosa').show();
         });*/

        $('#tambah-diagnosa-banding').click(function(){
            $('#pop-diagnosa').html();
            $('#pop-diagnosa').load(baseurl + '/diagnosa/pop-diagnosa?diagnosa=banding');
            $('#pop-diagnosa').modal('show');
            /*$('#tbody-diagnosa-awal').append(
             '<tr>' +
             '<td class="col-md-3"><input class="form-control"></td>' +
             '<td class="col-md-6"><input class="form-control"></td>' +
             '<td><i id="info" class="glyphicon glyphicon-info-sign"></i></td>' +
             '</tr>'
             );*/
        })
    });
</script>
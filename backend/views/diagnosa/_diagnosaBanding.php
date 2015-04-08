<?php
use kartik\widgets\ActiveForm;
use kartik\grid\GridView;

?>

<div class="diagnosa-awal-form">

    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin([
                'id' => 'diagnosa-form',
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,'showLabels'=>false]
            ]);
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><a href="#" id="tambah-diagnosa-awal" class="btn btn-info">+</a></th>
                    </tr>
                </thead>
                <tbody id="tbody-diagnosa-awal">
                    <tr id="tr-diagnosa-awal">
                        <td class="col-md-3"><input class="form-control"></td>
                        <td class="col-md-6"><input class="form-control"></td>
                        <td><i id="info" class="glyphicon glyphicon-info-sign"></i></td>
                    </tr>
                </tbody>
            </table>
            <?php ActiveForm::end() ?>
        </div>
        <div class="col-md-6">
            <div id="info-diagnosa" style="display: none;">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Informasi Diagnosa</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php
                            echo GridView::widget([
                                'dataProvider'=> $dataProvider,
                                'filterModel' => $searchModel,
                                'pjax' => true,
                                'columns' => [
                                    'kode',
                                    'inggris'
                                ],
                                'responsive'=>true,
                                'hover'=>true
                            ]);
                        ?>
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
       $('#info').click(function(){
         $('#info-diagnosa').show();
       });

        $('#tambah-diagnosa-banding').click(function(){
            $('#tbody-diagnosa-awal').append(
                '<tr>' +
                    '<td class="col-md-3"><input class="form-control"></td>' +
                    '<td class="col-md-6"><input class="form-control"></td>' +
                    '<td><i id="info" class="glyphicon glyphicon-info-sign"></i></td>' +
                '</tr>'
            );
        })
    });
</script>
<?php
use kartik\grid\GridView;
use yii\helpers\Html;

?>
<div class="modal-content" style="width: 750px;margin-left: 260px;margin-top: 100px">
    <div class="modal-header">
        Pilih Diagnosa
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php
        echo GridView::widget([
            'id'=>'popup-diagnosa',
            'dataProvider'=> $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{pager}",
            'columns' => [
                'kode',
                'inggris',
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{select}',
                    'buttons' => [
                        'select' => function($url, $model){
                            return Html::checkbox('pilih', false, ['value' => $model['id'].'#'.$model['kode'].'#'.$model['inggris']]);
                        }
                    ]
                ],
            ],
            'pjax' => true,
            'pjaxSettings'=>[
                'options'=>[
                    'enablePushState'=>false,
                ],
                'neverTimeout'=>true,
                'afterGrid'=>'<a id="pilih-diagnosa" class="btn btn-success">Pilih</a>',
            ],
            'responsive'=>true,
            'hover'=>true,
        ]);
        ?>
    </div>
</div>
<script>
    $(document).ready(function(){
       $('#pilih-diagnosa').click(function(){
         $('input:checkbox:checked').each(function(){
             var value = $(this).val();
             var data = value.split('#');

             $('#tbody-diagnosa-<?= $diagnosa ?>').append(
                 '<tr id="trdiagnosa'+data[0]+'">' +
                    '<td><input type="text" name="diagnosa_kode[]" readonly="true" value="'+data[1]+'"></td>' +
                    '<td><input type="text" name="diagnosa_nama[]" readonly="true" value="'+data[2]+'"></td>' +
                    '<td>view</td>' +
                    '<td><a class="btn btn-danger" onclick="hapusDiagnosaAwal('+data[0]+')">Hapus</a> </td>' +
                 '</tr>'+
                 '<input type="hidden" name="icdx_id[]" value="'+data[0]+'">'
             );
             $('#pop-diagnosa').modal('hide');
         });
       });
    });
</script>
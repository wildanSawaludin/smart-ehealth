<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use backend\models\Registrasi;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrasi Pendaftaran');
$this->params['breadcrumbs'][] = $this->title;
$GLOBALS['page_title'] = '<h1>Registrasi<small>Pendaftaran</small></h1>';

?>
<?php if(Yii::$app->user->can('Verifikator') || Yii::$app->user->can('Administrator')){ ?>
<div class="registrasi-index row">
    <section class="col-sm-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Informasi Pasien</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" style="padding-bottom:20px;">
                <div id="infoBody">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">
                            <span class="fa fa-user fa-5x" style="margin-top: 50px;margin-bottom: 50px;"></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

	<section class="col-sm-8">
		<?=
			$this->render('_form', [
				'model' => $model,
				'pId' => $pId,
			])
		?>
	</section>
</div>
<?php }?>

<div class="row">
    <section class="col-sm-12">
        <div class="box box-primary" style="margin-top:20px;">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-2 col-md-offset-7">
                        <h4 style="text-align:right;">Ubah Tanggal</h4>
                    </div>
                    <div class="col-sm-3 pull-right">
                        <form id="dateTimeFilter" action="" method="POST">
                            <?=                
                            DatePicker::widget([
                                'name' => 'tanggal_kunjungan',
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ],
                                'value' => $input,
                                'options' => [
                                    'id' => 'time_treshold',
                                    'onchange' => 
                                        '$.pjax.reload({
                                            url: "'.Url::to(['index']).'?RegistrasiSearch[tanggal_kunjungan]="+$(this).val(),
                                            container: "#pjax-gridview",
                                            timeout: 1000,
                                        })

                                        if($(this).val() != "") {
                                            $("#gridTitle").html("Daftar Pasien "+$(this).val());
                                        }
                                        else {
                                            $("#gridTitle").html("Daftar Pasien Hari Ini");   
                                        }

                                        ',
                                ]
                            ]);
                            ?>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 class="text-center" id="gridTitle">Daftar Pasien <?php $tanggal = Yii::$app->request->queryParams['RegistrasiSearch']['tanggal_kunjungan']; echo !is_null($tanggal) && $tanggal != '' ? $tanggal : 'Hari Ini'; ?></h1>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <?php Pjax::begin(['id' => 'pjax-gridview']) ?>
            
                <?php

                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'pjax' => true,
                        'bootstrap' => true,
                        'bordered' => true,
                        'hover' => true,
                        'layout' => "{items}\n{summary}\n{pager}",
                        'columns' => [
                            'no_antrian',
                            'format_noreg',
                            [
                                'label' => 'No Rm',
                                'attribute' => 'norm',
                                'value' => function ($model) {
                                    return str_pad($model->pasien->id, 6, '0', STR_PAD_LEFT);;
                                },
                            ],
                            [
                                'label' => 'Nama Pasien',
                                'attribute' => 'pasienNama'
                            ],
                            'usia',
                            [
                                'label' => 'Jenis Kelamin',
                                'attribute' => 'jenkel',
                                'value' => function ($model) {
                                    return $model->pasien->jenkel;
                                },
                            ],
                            [
                                'label' => 'Fasilitas Kesehatan',
                                'attribute' => 'faskesnama'

                            ],
                            'status_registrasi',
                            'status_pelayanan',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete} {resume} {edit}',
                                'buttons' =>
                                [
                                    'resume' => function ($url, $model) {
                                        if(Yii::$app->user->can('Dokter')||Yii::$app->user->can('Perawat')||Yii::$app->user->can('Administrator')){
                                            return Html::a('<span class="glyphicon glyphicon-zoom-in"></span>', $url, [
                                                        'title' => Yii::t('yii', 'Resume'),
                                                    //  'data-confirm' => Yii::t('yii', 'Apa Anda yakin?'),
                                                        'data-method' => 'post',
                                            ]);
                                        }
                                    },
                                    'edit' => function ($url, $model) {
                                        if(Yii::$app->user->can('Verifikator')||Yii::$app->user->can('Administrator')){
                                            return Html::a('<span class="glyphicon glyphicon-edit"></span>', 'javascript:void(0);', [
                                                        'title' => Yii::t('yii', 'Edit'),
                                                        'onclick'=>'editReg(\''.$model->id.'\')'
                                            ]);
                                        }
                                    },
                                    'delete' => function ($url, $model) {
                                        if(Yii::$app->user->can('Verifikator')||Yii::$app->user->can('Administrator')){
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('yii', 'Delete'),
                                                'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
                                                'data-method' => 'post',
                                            ]);
                                        }
                                    }
                                ],
                                'options' => [ 
                                    'style' => 'text-align:center;'

                                ]
                            ]
                        ],
                    ]);

                ?>
            </div>
            <?php Pjax::end() ?>
        </div>
    </section>
</div>
<?php
Modal::begin([
    'id' => 'md_edit_reg',
    'header' => '<h7>Edit Reg</h7>'
]);
Modal::end();
?>

<script type="text/javascript">

    var pasienInfo = {
        'url': "<?= Yii::$app->urlManager->createAbsoluteUrl('registrasi/registrasi') ?>",
        'pasien_id' : null,
        'clearData': function() {
            $("#infoBody").html('');
        },
        'showData' : function($data) {
            $("#infoBody").html($data);
        },
        'update' : function($pasien_id) {
            window.location.href = "<?= Yii::$app->urlManager->createAbsoluteUrl('pasien/update?id=') ?>"+$pasien_id
        },
        'getInfo': function($id) {
            $.get(this.url+'?id='+$id, function(data) {
                pasienInfo.showData(data);
            });
        },
        'getInfoByPasien': function($id, flag) {
            if($id == '')
                return false;

            $.get("<?= Yii::$app->urlManager->createAbsoluteUrl('registrasi/pasien') ?>"+'?id='+$id, function(data) {
                pasienInfo.showData(data);


                if(flag != undefined && flag == true) {
                    pasienInfo.setSelected();
                } 
            });

        },
        'setSelected': function() {
             $('#registrasi-pasien_id').select2("data", { id: $('#registrasi-catatan').select2("val"), text: $('#patienName').html() });
        }
    }

    $(document).ready(function() {

        var pasien_id = getUrlVars()['pasien_id'];

        if(pasien_id != undefined && pasien_id != '') {
            
            pasienInfo.getInfoByPasien(pasien_id);

            setTimeout(function() {
                $('#registrasi-catatan').select2("data", {id: pasien_id, text: pasien_id});
                $('#registrasi-pasien_id').select2("data", { id: pasien_id, text: $('#patienName').html()});
            }, 2000)

        }
        else {
            var firstPasien = $('.kv-grid-table tbody tr:first').data('key');
            if(firstPasien != undefined) {
                pasienInfo.getInfo(firstPasien);
            }
        }

        $('#infoBody').delegate('#btnUpdate', 'click', function() {
            pasienInfo.update($(this).data('pasien'));
        })

        $('#pjax-gridview').delegate('tbody tr', 'click', function(event) {
            $(this).addClass('selected-row').siblings().removeClass('selected-row');

            pasienInfo.getInfo($(this).data('key'));
        })        
 
    })

    function getUrlVars() {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

</script>

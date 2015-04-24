<?php
use kartik\tabs\TabsX;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\web\View;
use kartik\widgets\Select2;
use backend\models\Registrasi;



?>

<div class="hide">
<?=
Select2::widget([
                                                    'name' => 'dummy', 
                                                    'data' => [],
                                                    'hideSearch' => true,
                                                    'options' => [
                                                        'placeholder' => 'nama obat',
                                                        'class' => 'select2-select'
                                                    ],
                                                ])
                                                ?>
</div>

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Tindakan Lanjut
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <?php

                    $registrasi = Registrasi::findOne($_GET['id']);

                    $items = [
                        [
                            'label'=>'Obat-obatan',
                            'id' => 'obat-update',
                            'content' => View::render('//diagnosa/resep',[
                                /*
                                'resepNonracikanIsi' => $resepNonracikanIsi,
                                'resepNonracikanDetailIsi' => $resepNonracikanDetailIsi,
                                'resepRacikan' => $resepRacikan,
                                'resepRacikanDetail' => $resepRacikanDetail,
                                'racikanObat' => $racikanObat,
                                'id' => $_GET['id']
                                */
                                'registrasi' => $registrasi,
                                'user' => Yii::$app->user->identity,
                                'pasien' => $registrasi->pasien,
                                'resepRacikan' => $resepRacikan,
                                'resepNonRacikan' => $resepNonracikanIsi
                            ]),
                            'active' => true,
                            'linkOptions'=>['data-url'=>Url::to(['/saran-anjuran/index?id='.$_GET['id']])],
                        ],
                        [
                            'label'=>'Rawat inap',
                            'id' => 'rawat-inap-update',
                            'content' => '',
                            'linkOptions'=>['data-url'=>Url::to(['/saran-anjuran/index?id='.$_GET['id']])],
                        ],
                        [
                            'label'=>'Bedah/operasi',
                            'id' => 'bedah-operasi-update',
                            'content' => ''
                        ],
                        [
                            'label'=>'Kemoterapi',
                            'id' => 'kemoterapi-update',
                            'content' => ''
                        ],
                        [
                            'label'=>'Fisioterapi',
                            'id' => 'fisio-update',
                            'content' => ''
                        ],
                    ];

                    echo TabsX::widget([
                        'items'=>$items,
                        'position'=>TabsX::POS_ABOVE,
                        'encodeLabels'=>false,
                        'id'=>'tabs-saran-anjuran-update-form',
                        'pluginOptions' =>  ['enableCache'=>false],
                    ]);
                ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Pemeriksaan Penunjang
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-4">
                            <input id="laboratorium" type="checkbox" name="pemeriksaan_penunjang">Laboratorium
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <input id="non-laboratorium" type="checkbox" name="pemeriksaan_penunjang">Non-Laboratorium
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="margin-left: 40px;">
                            <div class="col-md-4">
                                <input id="radiologi" type="checkbox" name="pemeriksaan_penunjang">Radiologi
                            </div>
                            <div class="col-md-4">
                                <input id="ekg" type="checkbox" name="pemeriksaan_penunjang">Elektrokardiografi (EKG)
                            </div>
                            <div class="col-md-4">
                                <input id="uljb" type="checkbox" name="pemeriksaan_penunjang">ULJB/Treadmill Test
                            </div>
                            <div class="col-md-4">
                                <input id="Echocardiographhy" type="checkbox" name="pemeriksaan_penunjang">Echocardiographhy
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Collapsible Group Item #3
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
</div>
<?php
Modal::begin([
    'id' => 'm_laboratorium',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();

Modal::begin([
    'id' => 'm_radiologi',
//    'header' => '<h7>Tambah Pasien</h7>'
]);
Modal::end();
?>
<script>var id = '<?php echo $_GET['id'] ?>' </script>
<script>
    $(document).ready(function(){
       $('#laboratorium').click(function(){
          $('#m_laboratorium').html('');
          $('#m_laboratorium').load(baseurl + '/saran-anjuran/popup-laboratorium?id='+id+'&param='+$(this).val());
          $('#m_laboratorium').modal('show');
       });
        $('#radiologi').click(function(){
            $('#m_radiologi').html('');
            $('#m_radiologi').load(baseurl + '/saran-anjuran/popup-radiologi?id='+id+'&param='+$(this).val());
            $('#m_radiologi').modal('show');
        });
    });
</script>
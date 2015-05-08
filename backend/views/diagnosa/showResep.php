<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\NamaObat;

/* @var $this yii\web\View */
/* @var $registrasi backend\models\Anamnesa */

$data = ArrayHelper::map(NamaObat::find()->all(),'id','lazim');

if (Yii::$app->user->can('Apoteker')){
    $this->title = Yii::t('app','Resume Kesehatan');
    $GLOBALS['page_title'] = '<h1>Resume<small>Kesehatan</small></h1>';
}
?>

<div class="col-sm-12">
    <div class="nav nav-tabs">
        <ul id="tab-main" class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Resep Obat Non-Racikan</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Resep Obat Racikan</a></li>
            <?php if (Yii::$app->user->can('Apoteker')){ ?>
                <li class="pull-right header">
                    <dl class="dl-horizontal">
                        <dt>No RM</dt>
                        <dd><?= str_pad($pasien->id,6,'0',STR_PAD_LEFT) ?></dd>
                        <dt>Nama</dt>
                        <dd><?= $pasien->nama.' / '.$pasien->getUsia().' / '.$pasien->jenkel[0] ?></dd>
                    </dl>
                </li>
            <?php } ?>
        </ul>
        <div class="tab-content" style="min-height:800px;">
            <div class="tab-pane active" id="tab_1">
                <form class="form-horizontal" id="formRr" metod="post" action="<?= Yii::$app->urlManager->baseUrl ?>/diagnosa/add-resep-non-racikan">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Resep</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?= $resepNonRacikan['resepNonRacikan']->no_resep ?></p>
                                <input type="number" class="hide" name="resepNonRacikanId" value="<?= $resepNonRacikan->id ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Dokter</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?= $user->username ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <select class="form-control" name="status" disabled>
                                    <option></option>
                                    <option value="1" <?= $resepNonRacikan['resepNonRacikan']->status === "CITO!" ? "selected" : ''; ?>>CITO!</option> 
                                    <option value="2" <?= $resepNonRacikan['resepNonRacikan']->status === "Statim" ? "selected" : ''; ?>>Statim</option> 
                                    <option value="3" <?= $resepNonRacikan['resepNonRacikan']->status === "Urgent" ? "selected" : ''; ?>>Urgent</option> 
                                    <option value="4" <?= $resepNonRacikan['resepNonRacikan']->status === "P.I.M" ? "selected" : ''; ?>>P.I.M</option> 
                                </select>
                            </div>
                        </div>
                    </div>
                    <ul class="col-sm-12 list-unstyled list-rr">
                        <?php foreach ($resepNonRacikan['resepNonRacikanDetail'] as $key => $value) {
                            ?>

                            <li style="display:inline-block;">
                                R/ 
                                <input type="text" value="<?= $value->nama_obat ?>" readonly>
            
                                <input type="text" value="<?= $value->kek_isi ?>" readonly>
                                <input type="text" value="<?= $value->sediaan ?>" readonly> 
                                No. <input type="text" value="<?= $value->jumlah ?>" readonly> 
                                <p style="display:block;">&#8747; <input type="text" value="<?= $value->aturan_pakai_sehari ?>" readonly> dd <input type="text" value="<?= $value->aturan_pakai_jumlah ?>" readonly> </p>
                            </li>

                            <?php
                        }

                        //jika resep non racikan tidak ada maka tampilkan form isian kosong
                        if(empty($resepNonRacikan['resepNonRacikanDetail'])) {
                            ?>
                            <li style="display:inline-block;">
                                R/ <?=
                                Select2::widget([
                                    'name' => 'resep[seed][id_obat]',
                                    'data' => $data,
                                    'hideSearch' => true,
                                    'options' => [
                                        'placeholder' => 'nama obat',
                                        'class' => 'select2-select',
                                        'readonly' => true
                                    ],
                                ])
                                ?> 
                                <input type="text" readonly placeholder="kek. isi">
                                <input type="text" readonly placeholder="sediaan"> 
                                No. <input type="text" readonly placeholder="jumlah"> 
                                
                                <p style="display:block;">&#8747; <input type="text" readonly> dd <input type="text" readonly> </p>
                            </li>
                            <?php
                        }

                        ?>
                    </ul>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Iter</label>
                        <div class="col-sm-2">
                            <input type="text" readonly value="<?= $resepNonRacikan['resepNonRacikan']->iter; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="checkbox" name="label_etiket" value="1" disabled <?= $resepNonRacikan['resepNonRacikan']->label_etiket == 1 ? 'checked' : '';  ?>> Label / Etiket<br>
                        </div>
                            <?php if (!Yii::$app->user->can('Apoteker')){ ?>
                            <div class="col-sm-2 pull-right">  
                            <input type="submit" value="Selesai" id="sumbitRn" class="btn btn-primary">
                            <!--<?= Html::a('Selesai',['exit','id' => $resepRacikan->registrasi_id],['class' => 'btn btn-primary']) ?>-->
                            </div>
                            <?php } ?>
                            <?php if (Yii::$app->user->can('Apoteker')){ ?>
                            <div class="col-sm-2 pull-right">  
                                    <!--<input type="submit" value="Ok" id="sumbitRn" class="btn btn-primary">-->
                            <?= Html::a('Selesai',['/registrasi/index'],['class' => 'btn btn-primary']) ?>
                            </div>
                            <?php } ?>
                    </div>
                </form>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                <form class="form-horizontal" id="formRn" metod="post" action="<?= Yii::$app->urlManager->baseUrl ?>/diagnosa/add-resep-racikan">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Resep</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?= $resepRacikan['resepRacikan']->no_resep ?></p>
                                <input type="number" class="hide" name="resepRacikanId" value="<?= $resepRacikan->id ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Dokter</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?= $user->username ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <select class="form-control" name="status" disabled>
                                    <option></option>
                                    <option value="1" <?= $resepRacikan['resepRacikan']->status === "CITO!" ? "selected" : ''; ?>>CITO!</option> 
                                    <option value="2" <?= $resepNonRacikan['resepNonRacikan']->status === "Statim" ? "selected" : ''; ?>>Statim</option> 
                                    <option value="3" <?= $resepNonRacikan['resepNonRacikan']->status === "Urgent" ? "selected" : ''; ?>>Urgent</option> 
                                    <option value="4" <?= $resepNonRacikan['resepNonRacikan']->status === "P.I.M" ? "selected" : ''; ?>>P.I.M</option> 
                                </select>
                            </div>
                        </div>
                    </div>
                    <ul class="col-sm-12 list-unstyled list-rn">
                        <li style="">
                            R/ 
                            <ul class="list-obat list-unstyled">
                                <li>
                                    <p style="">
                                        <?=
                                        Select2::widget([
                                            'name' => 'resep[seed][list-obat][delimeter][id_obat]',
                                            'data' => $data,
                                            'hideSearch' => true,
                                            'options' => [
                                                'placeholder' => 'nama obat',
                                                'class' => 'select2-select'
                                            ],
                                        ])
                                        ?> 
                                        <input type="text" name="resep[seed][list-obat][delimeter][isi]" placeholder="kek. isi">
                                        <span class="fa fa-plus fa-2x btnTambahObat"></span> 
                                        <span class="fa fa-minus fa-2x btnRemoveObat hide"></span>

                                    </p>

                                </li>

                            </ul>
                            <p style="">
                                m.f. 
                                <select class="form=control" name="resep[seed][sediaan]">
                                    <option value="1">Pulveres</option>
                                    <option value="2">Pulvis</option>
                                    <option value="3">Caps</option>
                                    <option value="4">Ungt</option>
                                    <option value="5">Cream</option>
                                </select>
                                dtd. No. <input type="text" name="resep[seed][jumlah]" placeholder="jumlah"> 
                            </p>

                            <p style="display:block;">&#8747; <input type="text" name="resep[seed][dd_1]" disabled> dd <input type="text" name="resep[seed][dd_2]" disabled> <span class="fa fa-plus fa-2x btnTambah"></span> 
                                <span class="fa fa-minus fa-2x btnRemove hide"></span> </p>
                        </li>
                    </ul>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Iter</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="iter">
                                <option value="1">n.i</option> 
                                <option value="2">1x</option> 
                                <option value="3">2x</option> 
                                <option value="4">3x</option> 
                                <option value="5">4x</option> 
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2" style="text-align: right;">
                            <input type="checkbox" disabled name="label_etiket"  <?= $resepRacikan['resepRacikan']->label_etiket == 1 ? 'checked' : '';  ?>> 							    		
                        </div>
                        <div class="col-sm-2 "> Label / Etiket<br> </div>
                        <?php if (!Yii::$app->user->can('Apoteker')){ ?>
                            <div class="col-sm-2 pull-right">  
                            <input type="submit" value="Selesai" id="sumbitRn" class="btn btn-primary">
                            <!--<?= Html::a('Selesai',['exit','id' => $resepRacikan->registrasi_id],['class' => 'btn btn-primary','id' => 'sumbitRn']) ?>-->
                            </div>
                            <?php } ?>
                            <?php if (Yii::$app->user->can('Apoteker')){ ?>
                            <div class="col-sm-2 pull-right">  
                            <!--<input type="submit" value="Ok" id="sumbitRn" class="btn btn-primary">-->
                            <?= Html::a('Selesai',['/registrasi/index'],['class' => 'btn btn-primary']) ?>
                            </div>
                            <?php } ?>        
                    </div>
                </form>
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>
</div>

<style type="text/css">

    .select2-container.form-control {
        display: inline-table !important;
        width: 10% !important;
    }

    .select2-container {
        display: inline-table !important;
        width: 41% !important;
    }

    .select2-chosen {
        width: 100% !important;
    }

    .btnRemove:first-child {
        display: none !important;
        background-color: red;
    }


</style>

<script type="text/javascript">

    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    function randomString() {
        var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var result = '';
        for (var i = 10; i > 0; --i)
            result += chars[Math.round(Math.random() * (chars.length - 1))];
        return result;
    }

    $(document).ready(function() {

        //disabled all select2
        setTimeout(function(){
            $('.select2-select').select2("readonly", true);
        }, 2000);

    });

</script>
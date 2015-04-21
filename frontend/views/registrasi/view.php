<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\form\ActiveForm;
use yii\base\View;

/* @var $this yii\web\View */
/* @var $modelPasien app\models\Registrasi */

?>
<?php 
    $form = ActiveForm::begin([
        'id' => 'login-form-vertical', 
        'type' => ActiveForm::TYPE_VERTICAL
    ]); 


        $tempat = is_null($modelPasien->tempat_lahir) ? '-' : $modelPasien->tempat_lahir;
        $kunjungan = date("d-m-Y",strtotime($model->tanggal_kunjungan));
        $kunjungan =  $kunjungan = 00-00-0000 ? '-' : $kunjungan;
?>

<h3><center>Terima Kasih</center></h3>
<h3><center>Anda Telah Terdaftar</center></h3>
<h3><center>No. Antrian</center></h3>
<h3><center><?= $model->no_antrian ?></center></h3>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Tanggal Kunjungan</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?= $kunjungan ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">No Registrasi</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?= $model->no_reg ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">No RM</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo str_pad($modelPasien->id, 6, '0', STR_PAD_LEFT)?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Nama</label>
                    <div class="col-sm-7">
                        <p id="patienName" class="form-control-static"><?php echo $modelPasien->nama ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Gender</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo $modelPasien->jenkel ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Usia</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo $modelPasien->getUsia() ?> Tahun</p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Alamat</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo $modelPasien->alamat ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Status Pelayanan</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo $model->status_pelayanan ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <div class="col-sm-offset-4 col-sm-4">
<!--                        <button type="button" id="btnUpdate" data-pasien="<?= $modelPasien->id ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Update</button>                        -->
                        <?= Html::a(Yii::t('app', 'OK'), ['index'], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

  <?php ActiveForm::end(); ?>              


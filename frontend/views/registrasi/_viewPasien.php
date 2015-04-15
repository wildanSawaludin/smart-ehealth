<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\form\ActiveForm;
use yii\base\View;

/* @var $this yii\web\View */
/* @var $model app\models\Package */

?>
<?php 
    $form = ActiveForm::begin([
        'id' => 'login-form-vertical', 
        'type' => ActiveForm::TYPE_VERTICAL
    ]); 


$tempat = is_null($model->tempat_lahir) ? '-' : $model->tempat_lahir;
        $tanggal = is_null($model->tgl_lahir) ? '-' : $model->tgl_lahir; ?>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">No RM</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo str_pad($model->id, 6, '0', STR_PAD_LEFT)?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Nama</label>
                    <div class="col-sm-7">
                        <p id="patienName" class="form-control-static"><?php echo $model->nama ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Gender</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo $model->jenkel ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">TTL</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?= $tempat ?> <?= $tangal ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Usia</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo $model->getUsia() ?> Tahun</p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <label class="col-sm-3 col-md-offset-1 control-label">Alamat</label>
                    <div class="col-sm-7">
                        <p class="form-control-static"><?php echo $model->alamat ?></p>
                    </div>
                </div>
                <div class="form-group no-margin-botom">
                    <div class="col-sm-offset-4 col-sm-4">
<!--                        <button type="button" id="btnUpdate" data-pasien="<?= $model->id ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Update</button>                        -->
                        <?= Html::a(Yii::t('app', 'Update'), ['pasien/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

  <?php ActiveForm::end(); ?>              


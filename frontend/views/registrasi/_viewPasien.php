<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\form\ActiveForm;
use yii\base\View;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

?>
<?php 
    $form = ActiveForm::begin([
        'id' => 'login-form-vertical', 
        'type' => ActiveForm::TYPE_VERTICAL
    ]); 


        $tempat = is_null($model->tempat_lahir) ? '-' : $model->tempat_lahir;
        $tanggal = date("d-m-Y",strtotime($model->tgl_lahir));
        $tanggal =  $tanggal = 00-00-0000 ? '-' : $tanggal;?>
		
<div class="row">
	<label class="col-sm-3 col-md-offset-1">No RM</label>
	<div class="col-sm-7">
		<p> : <?php echo str_pad($model->id, 6, '0', STR_PAD_LEFT)?></p>
	</div>
</div>
<div class="row">
	<label class="col-sm-3 col-md-offset-1 control-label">Nama</label>
	<div class="col-sm-7">
		<p id="patienName"> : <?php echo $model->nama ?></p>
	</div>
</div>
<div class="row">
	<label class="col-sm-3 col-md-offset-1 control-label">Gender</label>
	<div class="col-sm-7">
		<p> : <?php echo $model->jenkel ?></p>
	</div>
</div>
<div class="row">
	<label class="col-sm-3 col-md-offset-1 control-label">TTL </label>
	<div class="col-sm-7">
		<p> : <?= $tempat ?>, <?= $tanggal ?></p>
	</div>
</div>
<div class="row">
	<label class="col-sm-3 col-md-offset-1 control-label">Usia</label>
	<div class="col-sm-7">
		<p> : <?php echo $model->getUsia() ?> Tahun</p>
	</div>
</div>
<div class="row">
	<label class="col-sm-3 col-md-offset-1 control-label">Alamat</label>
	<div class="col-sm-7">
		<p> : <?php echo $model->alamat ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-offset-4 col-sm-4">
<!--<button type="button" id="btnUpdate" data-pasien="<?= $model->id ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Update</button>                        -->
		<?= Html::a(Yii::t('app', 'Update'), ['registrasi/update-pasien', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	</div>
</div>

<?php ActiveForm::end(); ?>              


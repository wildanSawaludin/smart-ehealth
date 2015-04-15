<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pasien */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pasiens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$GLOBALS['page_title'] = '<h2>Informasi Pasien&nbsp;&nbsp;<i class="glyphicon glyphicon-eye-open"></i> </h2>';
?>

<div class="box box-primary">
	
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
	<section class="col-sm-12" style="margin-top:20px;"> 
		<p>
			<?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
					'method' => 'post',
				],
			]) ?>
		</p>
	</section>
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'tempat_lahir',
            'tgl_lahir',
            'jenkel',
            'goldar',
            'agama',
            'pekerjaan',
            'warga_negara',
            'alamat:ntext',
            'notelp',
            'nama_ayah',
            'pekerjaan_ayah',
            'nama_ibu',
            'pekerjaan_ibu',
            'marital_status',
            'nama_pasangan',
            'pekerjaan_pasangan',
        ],
    ]) ?>

</div>

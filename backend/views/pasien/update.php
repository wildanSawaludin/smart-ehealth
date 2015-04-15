<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pasien */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pasien',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pasiens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$GLOBALS['page_title'] = '<h2>Informasi Pasien&nbsp;&nbsp;<i class="glyphicon glyphicon-edit"></i> </h2>';
?>
<!--<h1><?= Html::encode($this->title) ?></h1>-->
<div class="row box box-primary" style="">
	<!-- form start -->
   
	 <?= $this->render('_form', ['model' => $model,]) ?>
        
	&nbsp;
  
</div>


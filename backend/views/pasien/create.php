<?php

use kartik\widgets\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pasien */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Pasien',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pasiens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$GLOBALS['page_title'] = '<h1>Daftar Pasien</h1>';
?>

<div class="row box box-primary">
   
        
            <!-- form start -->
           
		    <section style="margin-top:20px;" class="col-sm-8"><?= $this->render('_form', [
				'model' => $model,
			]) ?>
			</section>
        
</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kabkota */

$this->title = 'Create Kabkota';
$this->params['breadcrumbs'][] = ['label' => 'Kabkotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$GLOBALS['page_title'] = '<h2>Create Kab/Kota&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i> </h2>';
?>
<div class="row box box-primary">
	<section style="padding:5px;">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</section>
</div>

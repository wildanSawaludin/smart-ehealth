<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Propinsi */

$this->title = 'Create Propinsi';
$this->params['breadcrumbs'][] = ['label' => 'Propinsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$GLOBALS['page_title'] = '<h2>Create Propinsi&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i> </h2>';
?>
<div class="row box box-primary">
	<section style="padding:5px;">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</section>
</div>

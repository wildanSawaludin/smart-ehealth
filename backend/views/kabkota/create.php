<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kabkota */

$this->title = 'Create Kabkota';
$this->params['breadcrumbs'][] = ['label' => 'Kabkotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabkota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

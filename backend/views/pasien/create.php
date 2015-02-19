<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pasien */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Pasien',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pasiens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

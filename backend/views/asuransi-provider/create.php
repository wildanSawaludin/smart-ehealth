<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AsuransiProvider */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Asuransi Provider',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asuransi Providers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asuransi-provider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

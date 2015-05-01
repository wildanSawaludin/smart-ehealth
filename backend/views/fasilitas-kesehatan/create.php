<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FasilitasKesehatan */

$this->title = Yii::t('app', 'Create Fasilitas Kesehatan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fasilitas Kesehatans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-kesehatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

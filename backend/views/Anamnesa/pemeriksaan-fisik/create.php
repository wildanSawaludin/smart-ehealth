<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Anamnesa */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anamnesa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pasien' => $pasien
    ]) ?>

</div>

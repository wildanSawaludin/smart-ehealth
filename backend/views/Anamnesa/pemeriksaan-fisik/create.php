<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Anamnesa */

$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
        'pasien' => $pasien,
        'registrasi' => $registrasi,
    ]) ?>

<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Anamnesa */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Anamnesa',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnosa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="anamnesa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
        'modelDiagnosa' => $modelDiagnosa,
        'modelResepNonRacikan' => $modelResepNonRacikan,
        'modelResepNonracikanDetail' => $modelResepNonracikanDetail,
        'modelResepNonracikanDetailIsi' => $modelResepNonracikanDetailIsi
    ]) ?>

</div>
<?php
 Modal::begin([
     'id' => 'pop-diagnosa',
     'header' => 'Pilih Diagnosa'
 ]);

Modal::end();

Modal::begin([
    'id' => 'pop-info',
    'header' => 'Pilih Diagnosa'
]);

Modal::end();
?>
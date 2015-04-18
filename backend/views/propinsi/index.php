<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propinsi';
$this->params['breadcrumbs'][] = $this->title;
$GLOBALS['page_title'] = '<h2>Propinsi&nbsp;&nbsp;<i class="glyphicon glyphicon-tasks"></i> </h2>';

?>
<div class="box box-primary">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

  <div style="float:right;padding:4px;">
        <?= Html::a('Create Propinsi', ['create'], ['class' => 'btn btn-success']) ?>
    </div><br/><br/><br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

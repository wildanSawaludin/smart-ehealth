<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AsuransiProviderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Asuransi Providers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asuransi-provider-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?=
    $this->render('_form', [
        'model' => $model,
        'pId' => $pId,
    ])
    ?>

    <p>
        <?php 
//            Html::a(Yii::t('app', 'Create {modelClass}', [
//                'modelClass' => 'Asuransi Provider',
//            ]), ['create'], ['class' => 'btn btn-success']) 
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pasien_id',
            'alamat',
            'penanggung_jawab',
            'no_pks',
            // 'tgl_mulai_ks',
            // 'tgl_selesai_ks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

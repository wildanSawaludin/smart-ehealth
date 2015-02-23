<?php

use yii\helpers\Html;
use kartik\grid\GridView;

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
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'pasienNama',
                'value' => $model->pasienNama
            ],
            
            'alamat',
            'penanggung_jawab',
            'no_pks',
            [
                'attribute' => 'tgl_mulai_ks',
                'filterType' => GridView::FILTER_DATE,
                'format' => 'raw',
                'width' => '100px',
                'filterWidgetOptions' => [
                    'pluginOptions' => ['format' => 'dd-mm-yyyy']
                ],
            ],
            [
                'attribute' => 'tgl_selesai_ks',
                'filterType' => GridView::FILTER_DATE,
                'format' => 'raw',
                'width' => '100px',
                'filterWidgetOptions' => [
                    'pluginOptions' => ['format' => 'dd-mm-yyyy']
                ],
            ],
            // 'tgl_mulai_ks',
            // 'tgl_selesai_ks',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update} {delete}',
                'buttons' => ['view', 'update' , 'delete']
                ],
        ],
    ]); ?>

</div>

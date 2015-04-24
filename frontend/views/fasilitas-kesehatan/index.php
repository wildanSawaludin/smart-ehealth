<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FasilitasKesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fasilitas Kesehatan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-kesehatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?php// echo Html::a(Yii::t('app', 'Create Fasilitas Kesehatan'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bootstrap' => true,
        'bordered' => true,
        'hover' => false,
        'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            
//            'id',
            'nama',
            [
               'label' => 'Kecamatan',
               'attribute' => 'kecamatan_id',
               'value' => function ($model) {
               return $model->kecamatan->nama;
                                    },
            ],
            'alamat',
            'no_telepon',
            

        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pasiens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'tempat_lahir',
            'tgl_lahir',
            'jenkel',
            // 'goldar',
            // 'agama',
            // 'pekerjaan',
            // 'warga_negara',
            // 'alamat:ntext',
            // 'notelp',
            // 'nama_ayah',
            // 'pekerjaan_ayah',
            // 'nama_ibu',
            // 'pekerjaan_ibu',
            // 'marital_status',
            // 'nama_pasangan',
            // 'pekerjaan_pasangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

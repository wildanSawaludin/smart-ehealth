<?php

use yii\helpers\Html;
use yii\base\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrasi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-index-row">
    <?php if(Yii::$app->user->can('Pasien')){ ?>
    <div class="col-sm-6">
        <h3 class="box-title">Informasi Pasien</h3>
        <?php echo $this->render('_viewPasien', ['model' => $modelPasien]); ?>
    </div>
    <?php }?>
    
    <div class="col-sm-6">
        <h3 class="box-title">Registrasi Pasien</h3>
        <?php echo $this->render('_form', ['model' => $model]); ?>
    </div>
    
</div>

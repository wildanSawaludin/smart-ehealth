<?php

use yii\helpers\Html;
use yii\base\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrasi');
$this->params['breadcrumbs'][] = $this->title;
?>
<<<<<<< HEAD
<style>
hr {border:1px solid #888;}
.col-md-2 {padding:20px;margin-left:-30px;min-height:540px;background-image:url('../frontend/web/images/bg_sidebar.png');background-color:#9e1200;margin:-20px 0 -20px -20px;}
</style>
<!--<style>
.container {width:30%;}
.navbar-inverse {
    background-color: rgba(255, 0, 0, 0.7);
	border:none;}
.navbar-brand {
    color: #ffffff;}
.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
    background-color: #9e1200;
    color: #fff;
}
.navbar-inverse .navbar-nav > li > a {
    color: #ffd800;
}
.navbar-inverse .navbar-brand {
    color:#ffffff;
	/*background:url('../frontend/web/images/logo.png');*/
	background-repeat:no-repeat;background-position:0px 0px;
	margin-bottom:20px;position:relative;padding:5px 0px;
	font-family:'Roboto',Arial;
}

.navbar-inverse .navbar-brand:before {content:url('../../images/logo.png');margin-top:30px;padding-right:10px;}

</style>-->

<body style="background-color:#ebebeb;">
<?php if(Yii::$app->user->can('Pasien')){ ?>

<div class="row">
	<div class="col-sm-5 col-md-2"></div>
	
	<div class="col-sm-5 col-md-5">
		<div class="thumbnail">

		<div class="caption">
		<h2 class="text-center">Informasi Pasien&nbsp;&nbsp;
		<span class="glyphicon glyphicon-user"></span></h2>
		<hr><br/>
		<?php echo $this->render('_viewPasien', ['model' => $modelPasien]); ?>
		<?php }?>
		</div>
		</div>
	</div>
	<div class="col-sm-5 col-md-5">
		<div class="thumbnail">

		<div class="caption">
		<h2 class="text-center">Registrasi Pasien&nbsp;&nbsp;
		<span class="glyphicon glyphicon-tags"></span>
		</h2>
		<hr><br/>
		</div><!-- /.login-logo -->

		<div class="form-group">
		<?php echo $this->render('_form', ['model' => $model]); ?>
		</div>

		</div>
	</div>
</div>
    
</body>

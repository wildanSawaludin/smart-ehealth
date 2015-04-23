<?php

use yii\helpers\Html;
use yii\base\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrasi');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
hr {border:2px solid rgba(255,255,255,0.7)}
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

<body style="background:url('../frontend/web/images/bg_login.jpg') no-repeat center center fixed;   -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<body style="background-image:url('../frontend/web/images/bg_login.jpg')">
<div class="registrasi-index-row" style="margin-top:0%">
    <?php if(Yii::$app->user->can('Pasien')){ ?>
	<div class="col-sm-6">
	<h3 class="box-title">Informasi Pasien</h3>
	<?php echo $this->render('_viewPasien', ['model' => $modelPasien]); ?>
	</div>
	<?php }?>
	<div class="login-box">
	
		<div class="login-logo text-center">
		<h2 style="color:#fff;">Registrasi Pasien&nbsp;&nbsp;
		<span class="glyphicon glyphicon-user"></span>
		<span class="glyphicon glyphicon-tags"></span>
		</h2>
		<hr><br/>
		</div><!-- /.login-logo -->
		<div class="login-box-body">

		<div class="form-group has-feedback">
		<?php echo $this->render('_form', ['model' => $model]); ?>
		</div>

		</div><!-- /.login-box-body -->
	</div><!-- /.login-box -->
   
</div>
</body>
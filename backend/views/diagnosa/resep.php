<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\NamaObat;

/* @var $this yii\web\View */
/* @var $registrasi backend\models\Anamnesa */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Anamnesa',
    ]) . ' ' . $registrasi->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnosa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $registrasi->id, 'url' => ['view', 'id' => $registrasi->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

$GLOBALS['page_title'] = '<h1>Anamnesa<small>Diagnosa</small></h1>';

$data = ArrayHelper::map(NamaObat::find()->all(), 'id', 'lazim');

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

<div class="row">
    <div class="nav-tabs-custom">
        <ul id="tab-main" class="nav nav-tabs">
            <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Anamnesa</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Pemeriksaan Fisik</a></li>
            <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Diagnosa</a></li>
            <li class="pull-right header">
                <dl class="dl-horizontal">
                    <dt>No RM</dt>
                    <dd><?= str_pad($pasien->id, 6, '0', STR_PAD_LEFT) ?></dd>
                    <dt>Nama</dt>
                    <dd><?= $pasien->nama.' / '.$pasien->getUsia().' / '.$pasien->jenkel[0] ?></dd>
                </dl>
            </li>
        </ul>
        <div class="tab-content" style="min-height:800px;">
            <div class="tab-pane active" id="tab_3">
                <div class="col-sm-12">
                    <div class="nav nav-tabs">
				        <ul id="tab-main" class="nav nav-tabs">
				            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Resep Obat Non-Racikan</a></li>
				            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Resep Obat Racikan</a></li>
				        </ul>
				        <div class="tab-content" style="min-height:800px;">
				            <div class="tab-pane active" id="tab_1">
				                <form class="form-horizontal" id="formRr" metod="post" action="<?= Yii::$app->urlManager->baseUrl?>/diagnosa/add-resep-non-racikan">
								  	<div class="col-sm-10">
								  		<div class="form-group">
								    		<label class="col-sm-2 control-label">No Resep</label>
								    		<div class="col-sm-10">
								      			<p class="form-control-static"><?= $resepRacikan->no_resep ?></p>
								      			<input type="number" class="hide" name="resepNonRacikanId" value="<?= $resepNonRacikan->id ?>">
								    		</div>
								  		</div>
								  		<div class="form-group">
								    		<label for="inputPassword" class="col-sm-2 control-label">Dokter</label>
								    		<div class="col-sm-10">
								       			<p class="form-control-static"><?= $user->username ?></p>
								    		</div>
								  		</div>
								  	</div>
								  	<div class="col-sm-2">
								  		<div class="form-group">
								    		<div class="col-sm-10">
								    			<select class="form-control" name="status">
								    				<option value="1">CITO!</option> 
								    				<option value="2">Statim</option> 
								    				<option value="3">Urgent</option> 
								    				<option value="4">P.I.M</option> 
								    			</select>
								    		</div>
								  		</div>
								  	</div>
								  	<ul class="col-sm-12 list-unstyled list-rr">
								  		<li style="display:inline-block;">
								  			R/ <?= Select2::widget([
												    'name' => 'resep[seed][id_obat]', 
												    'data' => $data,
												    'hideSearch' => true,
												    'options' => [
												        'placeholder' => 'nama obat',
												        'class' => 'select2-select'
												    ],
												]) ?> 
											<input type="text" name="resep[seed][isi]" placeholder="kek. isi">
											<input type="text" name="resep[seed][sediaan]" placeholder="sediaan"> 
											No. <input type="text" name="resep[seed][jumlah]" placeholder="jumlah"> 
											<span class="fa fa-plus fa-2x btnTambah"></span> 
											<span class="fa fa-minus fa-2x btnRemove hide"></span>
								  			<p style="display:block;">&#8747; <input type="text" name="resep[seed][dd_1]"> dd <input type="text" name="resep[seed][dd_2]"> </p>
								  		</li>
								  	</ul>

								  	<div class="form-group">
								    	<label class="col-sm-2 control-label">Iter</label>
								    	<div class="col-sm-2">
								    		<select class="form-control" name="iter">
								    			<option value="1">n.i</option> 
								    			<option value="2">1x</option> 
								    			<option value="3">2x</option> 
								    			<option value="4">3x</option> 
								    			<option value="5">4x</option> 
								    		</select>
								    	</div>
								  	</div>

								  	<div class="form-group">
								    		<div class="col-sm-2">
								    			<input type="checkbox" name="label_etiket" value="1"> Label / Etiket<br>
								    		</div>
								    		<div class="col-sm-2 pull-right">  
								    			<input type="submit" value="Ok" id="sumbitRr" class="btn btn-primary">
								    		</div>
								  		</div>
								</form>
				            </div><!-- /.tab-pane -->
				            <div class="tab-pane" id="tab_2">
				                <form class="form-horizontal" id="formRn" metod="post" action="<?= Yii::$app->urlManager->baseUrl?>/diagnosa/add-resep-racikan">
								  	<div class="col-sm-10">
								  		<div class="form-group">
								    		<label class="col-sm-2 control-label">No Resep</label>
								    		<div class="col-sm-10">
								      			<p class="form-control-static"><?= $resepRacikan->no_resep ?></p>
								      			<input type="number" class="hide" name="resepRacikanId" value="<?= $resepRacikan->id ?>">
								    		</div>
								  		</div>
								  		<div class="form-group">
								    		<label for="inputPassword" class="col-sm-2 control-label">Dokter</label>
								    		<div class="col-sm-10">
								       			<p class="form-control-static"><?= $user->username ?></p>
								    		</div>
								  		</div>
								  	</div>
								  	<div class="col-sm-2">
								  		<div class="form-group">
								    		<div class="col-sm-10">
								    			<select class="form-control" name="status">
								    				<option value="1">CITO!</option> 
								    				<option value="2">Statim</option> 
								    				<option value="3">Urgent</option> 
								    				<option value="4">P.I.M</option> 
								    			</select>
								    		</div>
								  		</div>
								  	</div>
								  	<ul class="col-sm-12 list-unstyled list-rn">
								  		<li style="">
								  			R/ 
											<ul class="list-obat list-unstyled">
												<li>
													<p style="">
														<?= Select2::widget([
														    'name' => 'resep[seed][list-obat][delimeter][id_obat]', 
														    'data' => $data,
														    'hideSearch' => true,
														    'options' => [
														        'placeholder' => 'nama obat',
														        'class' => 'select2-select'
														    ],
														]) ?> 
													<input type="text" name="resep[seed][list-obat][delimeter][isi]" placeholder="kek. isi">
													<span class="fa fa-plus fa-2x btnTambahObat"></span> 
													<span class="fa fa-minus fa-2x btnRemoveObat hide"></span>
													
													</p>
													
												</li>
														
											</ul>
											<p style="">
													m.f. 
														 <select class="form=control" name="resep[seed][sediaan]">
														 	<option value="1">Pulveres</option>
														 	<option value="2">Pulvis</option>
														 	<option value="3">Caps</option>
														 	<option value="4">Ungt</option>
														 	<option value="5">Cream</option>
														 </select>
													dtd. No. <input type="text" name="resep[seed][jumlah]" placeholder="jumlah"> 
													</p>

								  			<p style="display:block;">&#8747; <input type="text" name="resep[seed][dd_1]"> dd <input type="text" name="resep[seed][dd_2]"> <span class="fa fa-plus fa-2x btnTambah"></span> 
								  			<span class="fa fa-minus fa-2x btnRemove hide"></span> </p>
								  		</li>
								  	</ul>

								  	<div class="form-group">
								    	<label class="col-sm-2 control-label">Iter</label>
								    	<div class="col-sm-2">
								    		<select class="form-control" name="iter">
								    			<option value="1">n.i</option> 
								    			<option value="2">1x</option> 
								    			<option value="3">2x</option> 
								    			<option value="4">3x</option> 
								    			<option value="5">4x</option> 
								    		</select>
								    	</div>
								  	</div>

								  	<div class="form-group">
								    	<div class="col-sm-2" style="text-align: right;">
											<input type="checkbox" value="1" name="label_etiket"> 							    		
										</div>
										<div class="col-sm-2 "> Label / Etiket<br> </div>
								    	<div class="col-sm-2 pull-right">  
								    		<input type="submit" value="Ok" id="sumbitRn" class="btn btn-primary">
								    	</div>
								  	</div>
								</form>
				            </div><!-- /.tab-pane -->
				        </div><!-- /.tab-content -->
				    </div>
                </div>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_1">
                
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>
</div>


<style type="text/css">

	.select2-container.form-control {
		display: inline-table !important;
		width: 10% !important;
	}

	.select2-chosen {
		width: 100% !important;
	}

	.btnRemove:first-child {
		display: none !important;
		background-color: red;
	}


</style>

<script type="text/javascript">

	$.fn.serializeObject = function() {
	    var o = {};
	    var a = this.serializeArray();
	    $.each(a, function() {
	        if (o[this.name] !== undefined) {
	            if (!o[this.name].push) {
	                o[this.name] = [o[this.name]];
	            }
	            o[this.name].push(this.value || '');
	        } else {
	            o[this.name] = this.value || '';
	        }
	    });
	    return o;
	};

	function randomString() {
		var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    var result = '';
	    for (var i = 10; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
	    return result;
	}
	
	$(document).ready(function() {

		$('.list-rr').delegate('.btnTambah', 'click', function() {
			var newItem = $(this).parents('ul').find('li:first').clone();
			newItem.find('.select2-container.form-control.input-md').remove();
			newItem.find('.btnRemove').removeClass('hide');
			newItem.find('.select2-select').select2();
			//change all seed in name of input
			var newSeed = randomString();

			newItem.find('input, select').each(function() {
				var currName = $(this).attr('name');

				if(currName != undefined) {
					var newName = currName.replace("seed", newSeed);
					$(this).attr('name', newName);
				}

			});


			$('.list-rr').append(newItem);
			$('.list-rr li:last').find('.select2-select').select2();

		});

		$('.list-rn').delegate('.btnTambah', 'click', function() {
			var newItem = $(this).parents('ul').find('li:first').clone();
			newItem.find('.select2-container.form-control.input-md').remove();
			newItem.find('.btnRemove').removeClass('hide');
			newItem.find('.select2-select').select2();
			//change all seed in name of input
			var newSeed = randomString();

			newItem.find('input, select').each(function() {
				var currName = $(this).attr('name');

				if(currName != undefined) {
					var newName = currName.replace("seed", newSeed);
					$(this).attr('name', newName);
				}

			});

			//if already have many list then remove them all
			newItem.find('ul.list-obat li').not(':first').remove();

			$('.list-rn').append(newItem);
			$('.list-rn li:last').find('.select2-select').select2();

		});

		$('.list-rn').delegate('.btnTambahObat', 'click', function() {
			var newItem = $(this).parents('ul.list-obat').find('li:first').clone();
			newItem.find('.select2-container.form-control.input-md').remove();
			newItem.find('.btnRemoveObat').removeClass('hide');
			newItem.find('.select2-select').select2();
			//change all seed in name of input
			var newSeed = randomString();

			newItem.find('input, select').each(function() {
				var currName = $(this).attr('name');

				if(currName != undefined) {
					var newName = currName.replace("delimeter", newSeed);
					$(this).attr('name', newName);
				}

			});


			$(this).parents('ul.list-obat').append(newItem);
			$('.list-rn li:last').find('.select2-select').select2();
		});

		$('.list-rn').delegate('.btnRemoveObat', 'click', function() {
			$(this).parent('li').remove();
		});

		$('.list-rr, .list-rn').delegate('.btnRemove', 'click', function() {
			$(this).parents('li').remove();
		});

		$("#sumbitRr").click(function() {
			console.log($('#formRr').serializeObject());
		});

		$("#sumbitRn").click(function() {
			console.log($('#formRn').serializeObject());
		})

	});

</script>
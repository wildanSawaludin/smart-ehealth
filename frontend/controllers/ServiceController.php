<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Registrasi;
use backend\models\Icdx;
use backend\models\RegistrasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Pasien;
use yii\web\Response;
use kartik\widgets\ActiveForm;
use yii\helpers\Json;
use yii\db\Query;

class ServiceController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
	
	public function actionRegistrasi(){
		$response["pendaftaran"] = array();
		$pendaftaran = array();
		$model = new Registrasi();
		if ($_POST) {
			$tanggal_kunjungan = date_create($_POST['tanggal_kunjungan'].' 00:00:00');
			$noantrian = Registrasi::find()->select('count(id)')
			->where('date_format(tanggal_kunjungan,"%Y-%m-%d") = "'.$tanggal_kunjungan->format('Y-m-d').'" ')->scalar();
            $model->pasienId = $_POST['pasienId'];
            $model->no_antrian = $noantrian+1;
            $model->tanggal_kunjungan = $_POST['tanggal_kunjungan'];
            $model->tanggal_registrasi = date('Y-m-d');
            $model->status_pelayanan = $_POST['status_pelayanan'];
            $model->status_asuransi = $_POST['status_asuransi'];
			if($model->save()){
				$model->no_reg= (string)sprintf('%08d', $model->id);
				if($model->save()){
					$modelpasien = Pasien::find()->where('id = :norm', [':norm' => $model->pasienId])->one();
					$interval = date_diff(date_create(), date_create($modelpasien->tgl_lahir.' 00:00:00'));
					$dateKun=date_create($model->tanggal_kunjungan);
					$pendaftaran["pasienId"] = $modelpasien->id;
					$pendaftaran["saving"] = 'saving ok';
					$pendaftaran["no_antrian"] = $model->no_antrian;
					$pendaftaran["no_rm"] = $modelpasien->id;
					$pendaftaran["no_registrasi"] = $model->no_reg;
					$pendaftaran["nama"] = $modelpasien->nama;
					$pendaftaran["tgl_lahir"] = $modelpasien->tgl_lahir;
					$pendaftaran["tanggal_kunjungan"] = date_format($dateKun,"d-m-Y");
					$pendaftaran["jenkel"] = $modelpasien->jenkel;
					$pendaftaran["alamat"] = $modelpasien->alamat;
					$pendaftaran["status_pelayanan"] = $model->status_pelayanan;
					$pendaftaran["status_asuransi"] = $model->status_asuransi;
					$pendaftaran["usia"] = $interval->format("%Y Tahun, %M Bulan, %d Hari");
					$pendaftaran["message"] = "Pendaftaran anda berhasil";	
					$response["success"] = 1;
				}
				
			}else{
				$response["success"] = 0;
				$pendaftaran["message"] = "Data Gagal Terkirim";	
			}
        }else{
			$pendaftaran["message"] = "Tidak Ada Data yang Dikirim";	
			$response["success"] = 0;
		}		
		array_push($response["pendaftaran"],$pendaftaran);
		echo json_encode($response);
	}
	
	public function actionCoba(){
		$date = date_create('2015-3-30 00:00:00');
		echo $date->format('Y-m-d');
	}
	
	public function actionGetPasien(){
		$response["pasien"] = array();
		$data = array();
		if($_POST){
			$norm = $_POST['norm'];
			$model = Pasien::find()->where('id = :norm', [':norm' => $norm])->one();
			if(count($model)>0){
				$interval = date_diff(date_create(), date_create($model->tgl_lahir.' 00:00:00'));
				$data["pasienId"] = $model->id;
				$data["no_rm"] = $model->id;
				$data["nama"] = $model->nama;
				$data["tgl_lahir"] = $model->tgl_lahir;
				$data["jenkel"] = $model->jenkel;
				$data["alamat"] = $model->alamat;
				$data["usia"] = $interval->format("%Y Tahun, %M Bulan, %d Hari");
				$response["success"] = 1;
			}else{
				$data["message"] = "No pendaftaran : ".$norm." tidak ada silahkan masukan no pendaftaran lain !";
				$response["success"] = 0;
			}
			
		}else{
			$data["message"] = "Tidak Ada Data yang Dikirim !";
			$response["success"] = 0;
		}
		array_push($response["pasien"], $data);
		echo json_encode($response);
	}

}

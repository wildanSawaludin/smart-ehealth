<?php

namespace frontend\controllers;

use Yii;
use backend\models\Registrasi;
use backend\models\Pasien;
use dektrium\user\models\LoginForm;
use dektrium\user\models\User;
use backend\models\FasilitasKesehatan;
use backend\models\AppsAuth;
use backend\models\Kecamatan;

class ServiceController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionAuthLogin()
    {
        $response["login"] = array();
        $data = array();
        if ($_POST){
            $model = Yii::createObject(LoginForm::className());
            $model->login = $_POST['no_rm'];
            $model->password = $_POST['password'];
            if ($model->login()){
                $user = User::find()->where('username = :username',[':username' => $_POST['no_rm']])->one();
                $pasien = Pasien::find()->where('user_id = :userid',[':userid' => $user->id])->one();
                $appsAuth = new AppsAuth;
                $appsAuth->user_Id = $user->id;
                $appsAuth->pasien_id = $pasien->id;
                $appsAuth->code = md5(uniqid(rand(),true));
                $appsAuth->created_date = date('Y-m-d H:i:s');
                $appsAuth->expired_date = date('Y-m-d',time()+86400);
                if ($appsAuth->save()){
                    $data["pasienId"] = $appsAuth->user_Id;
                    $data["userId"] = $appsAuth->pasien_id;
                    $data["code"] = $appsAuth->code;
                    $data["message"] = "login success";
                    $response["success"] = 1;
                }else{
                    $response["success"] = 0;
                    $data["message"] = "login failed";
                }
            }else{
                $response["success"] = 0;
                $data["message"] = "login failed";
            }
        }else{
            $response["success"] = 0;
            $data["message"] = "login failed";
        }
        array_push($response["login"],$data);
        echo json_encode($response);
    }

    public function actionGetKecamatan()
    {
        $response["kecamatan"] = array();
        $data = array();
        $model = Kecamatan::find()->where('kabkota_id = 7371')->all();
        foreach ($model as $val => $r){
            array_push($response["kecamatan"],array(
                "id" => $r['id'],
                "nama" => $r['nama'],
                "kabkota_id" => $r['kabkota_id']
            ));
        }
        $response["message"] = "succes get data kecamatan";
        $response["success"] = 1;
        echo json_encode($response);
    }

    public function actionGetFaskes()
    {
        $response["faskes"] = array();
        $data = array();
        $model = FasilitasKesehatan::find()->where('kecamatan_id = '.$_GET['kecId'].'')->all();
        foreach ($model as $val => $r){
            array_push($response["faskes"],array(
                "id" => $r['id'],
                "nama" => $r['nama'],
                "alamat" => $r['alamat'],
                "kecamatan_id" => $r['kecamatan_id']
            ));
        }
        $response["message"] = "succes get data faskes";
        $response["success"] = 1;
        echo json_encode($response);
    }

    public function actionGetInfo()
    {
        $response["faskes"] = array();
        $data = array();
        $model = FasilitasKesehatan::find()->all();
        foreach ($model as $val => $r){
            $kec = Kecamatan::find()->where('id = :id',[':id' => $r['kecamatan_id']])->one();
            array_push($response["faskes"],array(
                "id" => $r['id'],
                "nama" => $r['nama'],
                "alamat" => $r['alamat'].'.',
                "kecamatan" => 'Kecamatan : '.$kec->nama
            ));
        }
        $response["message"] = "succes get data faskes";
        $response["success"] = 1;
        echo json_encode($response);
    }

    public function actionSearchInfo()
    {
        $response["faskes"] = array();
        $data = array();
        $query = FasilitasKesehatan::find()
                ->joinWith(['kecamatan']);

        $items = $query
                ->select([
                    'fasilitas_kesehatan.id',
                    'fasilitas_kesehatan.nama',
                    'fasilitas_kesehatan.alamat',
                    'kecamatan.nama as kecnama'])
                ->andFilterWhere(['like','fasilitas_kesehatan.nama',$_POST['src']])
                ->orFilterWhere(['like','kecamatan.nama',$_POST['src']])
                ->orFilterWhere(['like','fasilitas_kesehatan.alamat',$_POST['src']])
                ->all();

        foreach ($items as $val => $r){
            array_push($response["faskes"],array(
                "id" => $r['id'],
                "nama" => $r['nama'],
                "alamat" => $r['alamat'].'.',
                "kecamatan" => 'Kecamatan : '.$r['kecnama']
            ));
        }
        $response["message"] = "succes get data faskes";
        $response["success"] = 1;
        echo json_encode($response);
    }

    public function actionRegistrasi()
    {
        $response["pendaftaran"] = array();
        $pendaftaran = array();
        $model = new Registrasi();
        if ($_POST){
            $dtg = $_POST['tanggal_kunjungan'];
            list($day,$month,$year) = explode('-',$dtg);
            $date_f = $year."-".$month."-".$day;
            $tanggal_kunjungan = date_create(str_replace(' ','',$date_f).' 00:00:00');
            $noantrian = Registrasi::find()->select('count(id)')
                            ->where('date_format(tanggal_kunjungan,"%Y-%m-%d") = "'.$tanggal_kunjungan->format('Y-m-d').'" and faskes_id = '.$_POST['fasilitas_kesehatan_id'].'')->scalar();

            $model->pasien_id = $_POST['pasienId'];
            $model->no_antrian = $noantrian+1;
            $model->tanggal_kunjungan = str_replace(' ','',$date_f);
            $model->faskes_id = $_POST['fasilitas_kesehatan_id'];
            $model->tanggal_registrasi = date('Y-m-d');
            $model->status_registrasi = 'Antrian';
            $model->asal_registrasi = 'Apps';
            if ($model->save()){
                $model->no_reg = (string) sprintf('%08d',$model->id);
                if ($model->save()){
                    $modelpasien = Pasien::find()->where('id = :norm',[':norm' => $model->pasien_id])->one();
                    $interval = date_diff(date_create(),date_create($modelpasien->tgl_lahir.' 00:00:00'));
                    $dateKun = date_create($model->tanggal_kunjungan);
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

    public function actionGetPasien()
    {
        $response["pasien"] = array();
        $data = array();
        if ($_POST){
            $pasienId = $_POST['pasienId'];
            $model = Pasien::find()->where('id = :pasienId',[':pasienId' => $pasienId])->one();
            if (count($model)>0){
                $interval = date_diff(date_create(),date_create($model->tgl_lahir.' 00:00:00'));
                $data["pasienId"] = $model->id;
                $data["no_rm"] = $model->id;
                $data["nama"] = $model->nama;
                $data["tgl_lahir"] = $model->tempat_lahir.", ".$model->tgl_lahir;
                $data["jenkel"] = $model->jenkel;
                $data["alamat"] = $model->alamat;
                $data["usia"] = $interval->format("%Y Tahun");
                $response["success"] = 1;
            }else{
                $data["message"] = "No pendaftaran : ".$norm." tidak ada silahkan masukan no pendaftaran lain !";
                $response["success"] = 0;
            }
        }else{
            $data["message"] = "Tidak Ada Data yang Dikirim !";
            $response["success"] = 0;
        }
        array_push($response["pasien"],$data);
        echo json_encode($response);
    }

}

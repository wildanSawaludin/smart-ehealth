<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 12/04/15
 * Time: 18:17
 */

namespace backend\controllers;


use backend\models\RacikanObat;
use backend\models\ResepNonracikan;
use backend\models\ResepNonracikanDetail;
use backend\models\ResepRacikan;
use backend\models\ResepRacikanDetail;
use Yii;
use yii\db\Connection;
use yii\db\Query;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SaranAnjuranController extends Controller{
    public function actionIndex($id)
    {
        $this->layout = false;
        if($this->findModel($id)){
            $resepNonracikanIsi = $this->findModel($id);
            $resepNonracikanDetailIsi = ResepNonracikanDetail::findAll(['resep_nonracikan_id' => $resepNonracikanIsi->id]);
            $resepRacikan = $this->findModelRacikan($id);
            $resepRacikanDetail = ResepRacikanDetail::findAll(['resep_racikan_id' => $resepRacikan->id]);
            $racikanObat = RacikanObat::findAll(['resep_racikan_id' => $resepRacikan->id]);
            $html = $this->render('saranAnjuranUpdate',[
                'resepNonracikanIsi' => $resepNonracikanIsi,
                'resepNonracikanDetailIsi' => $resepNonracikanDetailIsi,
                'resepRacikan' => $resepRacikan,
                'resepRacikanDetail' => $resepRacikanDetail,
                'racikanObat' => $racikanObat
            ]);
        }else{
            $resepNonracikan = new ResepNonracikan();
            $resepRacikan = new ResepRacikan();
            $html = $this->render('saranAnjuran',[
                'resepNonracikan' => $resepNonracikan,
                'resepRacikan' => $resepRacikan,

            ]);
        }

        return Json::encode($html);
    }


    public function actionSaveObatNonracikan($id)
    {
        if(Yii::$app->request->post('param')){
            $model = new ResepNonracikan();
            $model->user_id = Yii::$app->user->identity->id;
            $model->registrasi_id = $id;
            $model->save();

        }
    }

    public function actionSaveObatRacikan($id)
    {
        if(Yii::$app->request->post('param')){
            $model = new ResepRacikan();
            $model->user_id = Yii::$app->user->identity->id;
            $model->registrasi_id = $id;
            $model->save();

        }
    }

    public function actionSaveResepNonracikanDetail()
    {
        $modelUpdate = ResepNonracikan::findOne($_POST['id_resep_nonracikan']);
        //$modelResepNonracikanDetail->attributes = Yii::$app->request->post('ResepNonracikanDetail');
        $modelUpdate->attributes = Yii::$app->request->post('ResepNonracikan');
        $modelUpdate->status = $modelUpdate->status;
        $modelUpdate->iter = $modelUpdate->iter;
        $modelUpdate->label_etiket = $modelUpdate->label_etiket;
        $modelUpdate->save();

        $nama_obat = Yii::$app->request->post('nama_obat');
        $kek_isi = Yii::$app->request->post('kek_isi');
        $sediaan = Yii::$app->request->post('sediaan');
        $jumlah = Yii::$app->request->post('jumlah');
        $aturan_pakai_sehari = Yii::$app->request->post('aturan_pakai_sehari');
        $aturan_pakai_jumlah = Yii::$app->request->post('aturan_pakai_jumlah');

        for($i=0;$i<count($nama_obat); $i++) {
            $modelResepNonracikanDetail = new ResepNonracikanDetail();
            $modelResepNonracikanDetail->resep_nonracikan_id = Yii::$app->request->post('id_resep_nonracikan');
            $modelResepNonracikanDetail->nama_obat = $nama_obat[$i];
            $modelResepNonracikanDetail->kek_isi = $kek_isi[$i];
            $modelResepNonracikanDetail->sediaan = $sediaan[$i];
            $modelResepNonracikanDetail->jumlah = $jumlah[$i];
            $modelResepNonracikanDetail->aturan_pakai_sehari = $aturan_pakai_sehari[$i];
            $modelResepNonracikanDetail->aturan_pakai_jumlah = $aturan_pakai_jumlah[$i];
            $modelResepNonracikanDetail->save();
        }
    }

    public function actionSaveResepRacikanDetail()
    {
        $modelUpdate = ResepRacikan::findOne($_POST['id_resep_racikan']);
        //$modelResepNonracikanDetail->attributes = Yii::$app->request->post('ResepNonracikanDetail');
        $modelUpdate->attributes = Yii::$app->request->post('ResepRacikan');
        $modelUpdate->status = $modelUpdate->status;
        $modelUpdate->iter = $modelUpdate->iter;
        $modelUpdate->label_etiket = $modelUpdate->label_etiket;
        $modelUpdate->save();

        $m_f = Yii::$app->request->post('mf_racikan');
        $jumlah = Yii::$app->request->post('dtd_no_racikan');
        $aturan_pakai_sehari = Yii::$app->request->post('aturan_pakai_sehari_racikan');
        $aturan_pakai_jumlah = Yii::$app->request->post('aturan_pakai_jumlah_racikan');

        for($i=0;$i<count($m_f); $i++) {
            $modelResepRacikanDetail = new ResepRacikanDetail();
            $modelResepRacikanDetail->resep_racikan_id = Yii::$app->request->post('id_resep_racikan');
            $modelResepRacikanDetail->m_f = $m_f[$i];
            $modelResepRacikanDetail->jumlah = $jumlah[$i];
            $modelResepRacikanDetail->aturan_pakai_sehari = $aturan_pakai_sehari[$i];
            $modelResepRacikanDetail->aturan_pakai_jumlah = $aturan_pakai_jumlah[$i];
            $modelResepRacikanDetail->save();

            //echo $modelResepRacikanDetail->id;
            $nama_obat = Yii::$app->request->post('nama_obat_racikan_'.$i);
            $kek_isi = Yii::$app->request->post('kek_isi_racikan_'.$i);
            var_dump($nama_obat);

            for($a=0;$a<count($nama_obat);$a++){
                $racikanObat = new RacikanObat();
                $racikanObat->resep_racikan_detail_id = $modelResepRacikanDetail->id;
                $racikanObat->nama_obat = $nama_obat[$a];
                $racikanObat->kek_isi = $kek_isi[$a];
                $racikanObat->save();
            }
        }
    }

    protected function findModel($id)
    {
        if (($model = ResepNonracikan::findOne(['registrasi_id' => $id])) !== null) {
            return $model;
        }
    }

    protected function findModelRacikan($id)
    {
        if (($model = ResepRacikan::findOne(['registrasi_id' => $id])) !== null) {
            return $model;
        }
    }
}
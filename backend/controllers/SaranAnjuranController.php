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
use backend\models\SaranAnjuran;
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

    public function actionPopupLaboratorium()
    {
        return $this->renderAjax('_laboratorium');
    }

    public function actionLaboratorium($id)
    {
        $this->layout = false;
        $model = $this->findModelSaranAnjuran($id);
        $html = $this->render('_kelompokPemeriksaan',[
            'model' => $model
        ]);

        return json_encode($html);
    }

    public function actionTujuanPemeriksaan($id)
    {
        $this->layout = false;
        $model = $this->findModelSaranAnjuran($id);
        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post('SaranAnjuran');

            $model->registrasi_id = $id;
            $model->tp_anemia_pil = $post['tp_anemia_pil'];
            $model->tp_checkup_pil = $post['tp_checkup_pil'];
            $model->tp_dnppenyakit_pil = $post['tp_dnppenyakit_pil'];
            $model->tp_hepatitisb_pil = $post['tp_hepatitisb_pil'];
            $model->tp_hipertensi_pil = $post['tp_hipertensi_pil'];
            $model->tp_reproduksi_pil = $post['tp_reproduksi_pil'];
            $model->tp_risiko_pil = $post['tp_resiko_pil'];
            $model->tp_tumor_pil = $post['tp_tumor_pil'];
            $model->tp_uji_pil = $post['tp_uji_pil'];
            $model->save();
        }else {
            $html = $this->render('_tujuanPemeriksaan', [
                'model' => $model
            ]);
        }

        return json_encode($html);
    }

    public function actionMasalahKlinis($id)
    {
        $this->layout = false;
        $model = $this->findModelSaranAnjuran($id);
        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post('SaranAnjuran');

            $model->registrasi_id = $id;
            $model->mk_cesereb_pil = $post['mk_cesereb_pil'];
            $model->mk_kolesistitis_pil = $post['mk_kolesistitis_pil'];
            $model->mk_osteoporosis_pil = $post['mk_osteoporosis_pil'];
            $model->mk_sirosis_pil = $post['mk_sirosis_pil'];
            $model->mk_galjan_pil = $post['mk_galjan_pil'];
            $model->mk_throbven_pil = $post['mk_throbven_pil'];
            $model->mk_emfisema_pil = $post['mk_emfisema_pil'];
            $model->mk_kanpar_pil = $post['mk_kanpar_pil'];
            $model->mk_skleromul_pil = $post['mk_skleromul_pil'];
            $model->mk_ami_pil = $post['mk_ami_pil'];
            $model->mk_osteoporosis_pil = $post['mk_osteoporosis_pil'];
            $model->mk_pankreatitis_pil = $post['mk_pankreatitis_pil'];
            $model->mk_ulpep_pil = $post['mk_ulpep_pil'];
            $model->mk_pneumonia_pil = $post['mk_pneumonia_pil'];
            $model->mk_galgin_pil = $post['mk_galgin_pil'];
            $model->mk_arthreu_pil = $post['mk_arthreu_pil'];
            $model->mk_sle_pil = $post['mk_sle_pil'];
            $model->save();
        }else {
            $html = $this->render('_masalahKlinis', [
                'model' => $model
            ]);
        }

        return json_encode($html);
    }

    public function actionPopupHematologi()
    {
        return $this->renderAjax('_hematologi');
    }

    public function actionHematologiLengkap($id)
    {
        $this->layout = false;
        $model = $this->findModelSaranAnjuran($id);
        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post('SaranAnjuran');
            $hematologi_lengkap = implode(',',$post['kp_hematologi_lengkap']);

            $model->registrasi_id = $id;
            $model->kp_hematologi_lengkap = $hematologi_lengkap;
            $model->save();
        }else {
            $kp_hematologi_lengkap = explode(',', $model->kp_hematologi_lengkap);
            $html = $this->render('_hematologiLengkap', [
                'model' => $model,
                'kp_hematologi_lengkap' => $kp_hematologi_lengkap
            ]);
            return json_encode($html);
        }
    }

    public function actionPopupUrinalisa($id)
    {
        $model = $this->findModelSaranAnjuran($id);
        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post('SaranAnjuran');
            $urinalisa = implode(',',$post['kp_urinalisa']);

            $model->registrasi_id = $id;
            $model->kp_urinalisa = $urinalisa;
            $model->save();
        }else {
            $kp_urinalisa = explode(',', $model->kp_urinalisa);
            return $this->renderAjax('_urinalisa', [
                'model' => $model,
                'kp_urinalisa' => $kp_urinalisa
            ]);
        }
    }

    public function actionPopupAlergi($id)
    {
        $model = $this->findModelSaranAnjuran($id);
        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post('SaranAnjuran');

            $model->registrasi_id = $id;
            $model->alergi_eosinofil_pil = $post['alergi_eosinofil_pil'];
            $model->alergi_total_pil = $post['alergi_total_pil'];
            $model->alergi_atopy_pil = $post['alergi_atopy_pil'];
            $model->alergi_spesifik_pil = $post['alergi_spesifik_pil'];
            $model->save();
        }else {
            return $this->renderAjax('_alergi', [
                'model' => $model
            ]);
        }
    }

    public function actionPopupRadiologi($id)
    {
        $model = $this->findModelSaranAnjuran($id);
        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post('SaranAnjuran');

            $radiologi_lain_lain = implode(',',$post['radiologi_lain_lain']);

            $model->registrasi_id = $id;
            $model->radiologi_ctscan_pil = $post['radiologi_ctscan_pil'];
            $model->radiologi_usg_pil = $post['radiologi_usg_pil'];
            $model->radiologi_mri_pil = $post['radiologi_mri_pil'];
            $model->radiologi_xray_pil = $post['radiologi_xray_pil'];
            $model->radiologi_lain_pil = $post['radiologi_lain_pil'];
            $model->radiologi_lain_lain = $radiologi_lain_lain;
            $model->save();
        }else {
            $radiologi_lain = explode(',', $model->radiologi_lain_lain);
            return $this->renderAjax('_radiologi', [
                'model' => $model,
                'radiologi_lain' => $radiologi_lain
            ]);
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

    protected function findModelSaranAnjuran($id)
    {
        if (($model = SaranAnjuran::findOne(['registrasi_id' => $id])) !== null) {
            return $model;
        }else{
            $model = new SaranAnjuran;
            return $model;
        }
    }
}
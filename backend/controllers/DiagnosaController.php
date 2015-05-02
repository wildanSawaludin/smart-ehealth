<?php

namespace backend\controllers;

use backend\models\Anamnesa;
use backend\models\AnamnesaSearch;
use backend\models\Diagnosa;
use backend\models\Icdx;
use backend\models\IcdxSearch;
use backend\models\Registrasi;
use backend\models\ResepNonracikan;
use backend\models\ResepNonracikanDetail;
use backend\models\ResepRacikan;
use backend\models\ResepRacikanDetail;
use backend\models\PemeriksaanFisik;
use backend\models\NamaObat;
use backend\models\RacikanObat;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DiagnosaController extends Controller
{
    public $layout = 'middle';
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate($id, $diagnosa = 'Awal')
    {
       
        //$model = $this->findModel($id);
        $model = Registrasi::findOne($id);
        $modelDiagnosa = Diagnosa::findAll(['jenis_diagnosa' => $diagnosa]);
        
        /*$modelResepNonRacikan = ResepNonracikan::findOne(['registrasi_id' => $id]);
        $modelResepNonracikanDetail = new ResepNonracikanDetail();
        $modelResepNonracikanDetailIsi = ResepNonracikanDetail::findAll(['resep_nonracikan_id' => $modelResepNonRacikan->id]);*/
        $dataProvider = new ActiveDataProvider([
            'query' => Icdx::find(),
        ]);
        $searchModel = new IcdxSearch();
        
        $this->layout = 'main';
        //$GLOBALS['collapse'] = true;
        $modelAnamnesa = Anamnesa::findOne($id);
        $registrasi = Registrasi::findOne($modelAnamnesa->registrasi_id);

        return $this->render('update', [
           'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelDiagnosa' => $modelDiagnosa,
            'pasien' => $registrasi->pasien,
            /*'modelResepNonRacikan' => $modelResepNonRacikan,
            'modelResepNonracikanDetail' => $modelResepNonracikanDetail,
            'modelResepNonracikanDetailIsi' => $modelResepNonracikanDetailIsi*/
        ]);
    }

    public function actionTabDiagnosa($id,$diagnosa, $diagnosaTab)
    {
        $this->layout = false;
        $model = $this->findModel($id);
        $modelDiagnosa = Diagnosa::findAll(['jenis_diagnosa' => $diagnosa]);
        $html = $this->render($diagnosaTab, [
            'model' => $model,
            'modelDiagnosa' => $modelDiagnosa
        ]);
        return Json::encode($html);
    }

    public function actionPopDiagnosa($diagnosa)
    {
        /*$dataProvider = new ActiveDataProvider([
            'query' => Icdx::find(),
        ]);
        $dataProvider->pagination->pageSize=10;*/
        $searchModel = new IcdxSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->renderAjax('_popDiagnosa',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'diagnosa'=>$diagnosa
        ]);
    }

    public function actionPopInfo($id)
    {
        $model = Icdx::findOne($id);

        return $this->renderAjax('_popInfo',[
            'model' => $model
        ]);
    }

    public function actionSave($id,$param)
    {
        if(Yii::$app->request->post()){

            $kode = $_POST['icdx_id'];

            for($i=0;$i<count($kode);$i++){
                $model = new Diagnosa();
                $model->registrasi_id = $id;
                $model->jenis_diagnosa = $param;
                $model->icdx_id = $kode[$i];
                $model->save();
            }
            return $this->redirect('update?id='.$id);
        }

    }

    public function actionTabObatNonRacikan($id)
    {
        $this->layout = false;

        $modelResepNonRacikan = ResepNonracikan::findOne(['registrasi_id' => $id]);
        $modelResepNonracikanDetail = new ResepNonracikanDetail();
        $modelResepNonracikanDetailIsi = ResepNonracikanDetail::findAll(['resep_nonracikan_id' => $modelResepNonRacikan->id]);
        $html = $this->render('_obatNonRacikan',[
            'modelResepNonRacikan' => $modelResepNonRacikan,
            'modelResepNonracikanDetail' => $modelResepNonracikanDetail,
            'modelResepNonracikanDetailIsi' => $modelResepNonracikanDetailIsi
        ]);

        return Json::encode($html);
    }

    public function actionSaveObatNonracikan($id)
    {
        $model = new ResepNonracikan();

        if(Yii::$app->request->post('nama_obat')){
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
        }else{
            $model->user_id = Yii::$app->user->identity->id;
            $model->registrasi_id = $id;
            $model->save();
        }


    }

    public function actionShowResepObatForm($id) {

        $this->layout = 'main';
        $modelAnamnesa = Anamnesa::findOne($id);
        $registrasi = Registrasi::findOne($modelAnamnesa->registrasi_id);

        $newResepRacikan = new ResepRacikan();
        $newResepRacikan->user_id = Yii::$app->user->identity->id;
        $newResepRacikan->registrasi_id = $registrasi->id;
        $newResepRacikan->save();
        //$newResepRacikan = ResepRacikan::findOne($newResepRacikan->id);

        $newResepNonRacikan = new ResepNonracikan();
        $newResepNonRacikan->user_id = Yii::$app->user->identity->id;
        $newResepNonRacikan->registrasi_id = $registrasi->id;
        $newResepNonRacikan->save();

        return $this->render('resep', [
            'registrasi' => $registrasi,
            'user' => Yii::$app->user->identity,
            'pasien' => $registrasi->pasien,
            'resepRacikan' => $newResepRacikan,
            'resepNonRacikan' => $newResepNonRacikan
        ]);

    }

    protected function findModel($id)
    {
        if (($model = Diagnosa::findOne(['registrasi_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionAddResepNonRacikan() {
        try {
            $input = isset($_GET) ? $_GET : array();

            //update resep non racikan table
            $resepNonRacikan = ResepNonracikan::findOne($input['resepNonRacikanId']);

            $resepNonRacikan->iter = $input['iter'];
            $resepNonRacikan->status = $input['status'];
            if(isset($input['label_etiket'])) {
                $resepNonRacikan->label_etiket = $input['label_etiket'];
            }
            $resepNonRacikan->update();
            $modelRegistrasi = Registrasi::findOne($resepNonRacikan->registrasi_id);
            $modelRegistrasi->status_registrasi = 'Selesai';
            $modelRegistrasi->save();
            
            foreach ($input['resep'] as $key => $value) {
                $newResepNonracikanDetail = new ResepNonracikanDetail();
                $newResepNonracikanDetail->resep_nonracikan_id = $resepNonRacikan->id;
                $newResepNonracikanDetail->nama_obat = NamaObat::findOne($value['id_obat'])->lazim;
                $newResepNonracikanDetail->kek_isi = $value['isi'];
                $newResepNonracikanDetail->sediaan = $value['sediaan'];
                $newResepNonracikanDetail->jumlah = $value['jumlah'];
                $newResepNonracikanDetail->aturan_pakai_sehari = $value['dd_1'];
                $newResepNonracikanDetail->aturan_pakai_jumlah = $value['dd_2'];
                $newResepNonracikanDetail->save();
            }

            return $this->redirect(['registrasi/index']);
            
        }
        catch(\Exception $e) {
            return $this->redirect(['registrasi/index']);
        }
    }


    public function actionAddResepRacikan() {
        try {
            $input = isset($_GET) ? $_GET : array();

            //update resep racikan table
            $resepRacikan = ResepRacikan::findOne($input['resepRacikanId']);
            $resepRacikan->iter = $input['iter'];
            $resepRacikan->status = $input['status'];
            if(isset($input['label_etiket'])) {
                $resepRacikan->label_etiket = $input['label_etiket'];
            }
            $resepRacikan->update();
            
            $modelRegistrasi = Registrasi::findOne($resepRacikan->registrasi_id);
            $modelRegistrasi->status_registrasi = 'Selesai';
            $modelRegistrasi->save();

            foreach ($input['resep'] as $key => $value) {
                $resepRacikanDetail = new ResepRacikanDetail();
                $resepRacikanDetail->resep_racikan_id = $resepRacikan->id;
                $resepRacikanDetail->m_f = $value['sediaan'];
                $resepRacikanDetail->jumlah = $value['jumlah'];
                $resepRacikanDetail->aturan_pakai_sehari = $value['dd_1'];
                $resepRacikanDetail->aturan_pakai_jumlah = $value['dd_2'];
                $resepRacikanDetail->save();

                foreach ($value['list-obat'] as $key => $valueObat) {
                    $racikanObat = new RacikanObat();
                    $racikanObat->resep_racikan_detail_id = $resepRacikanDetail->id;
                    $racikanObat->nama_obat = NamaObat::findOne($valueObat['id_obat'])->lazim;
                    $racikanObat->kek_isi = $valueObat['isi'];
                    $racikanObat->resep_racikan_id = $resepRacikan->id;
                    $racikanObat->save();
                }

            }

            return $this->redirect(['registrasi/index']);
        }
        catch(\Exception $e) {
            return $this->redirect(['registrasi/index']);
        }
    }
}

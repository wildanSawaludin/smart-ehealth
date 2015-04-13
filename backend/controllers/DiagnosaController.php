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
use backend\models\PemeriksaanFisik;
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
        
        $pemeriksaan_fisik = PemeriksaanFisik::findOne(['registrasi_id' => $model->id]);
        /*$modelResepNonRacikan = ResepNonracikan::findOne(['registrasi_id' => $id]);
        $modelResepNonracikanDetail = new ResepNonracikanDetail();
        $modelResepNonracikanDetailIsi = ResepNonracikanDetail::findAll(['resep_nonracikan_id' => $modelResepNonRacikan->id]);*/
        $dataProvider = new ActiveDataProvider([
            'query' => Icdx::find(),
        ]);
        $searchModel = new IcdxSearch();
        
        $this->layout = 'main';
        $GLOBALS['collapse'] = true;
        $modelAnamnesa = Anamnesa::findOne($id);
        $registrasi = Registrasi::findOne($modelAnamnesa->registrasi_id);

        return $this->render('update', [
           'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelDiagnosa' => $modelDiagnosa,
            'pasien' => $registrasi->pasien,
            'pemeriksaan_fisik' => $pemeriksaan_fisik->id
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
        $dataProvider = new ActiveDataProvider([
            'query' => Icdx::find(),
        ]);
        $dataProvider->pagination->pageSize=10;
        $searchModel = new IcdxSearch();

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
                $model->registrasi_id = '1';
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

    protected function findModel($id)
    {
        if (($model = Diagnosa::findOne(['registrasi_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

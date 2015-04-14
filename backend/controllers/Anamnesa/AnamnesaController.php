<?php

namespace backend\controllers\Anamnesa;

use Yii;
use yii\filters\AccessControl;
use backend\models\Anamnesa;
use backend\models\AnamnesaSearch;
use backend\models\Lookup;
use backend\models\Registrasi;
use backend\models\PemeriksaanFisik;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\db\Query;
use yii\web\Response;


/**
 * AnamnesaController implements the CRUD actions for Anamnesa model.
 */
class AnamnesaController extends Controller
{
    public $layout = 'middle';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Anamnesa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnamnesaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anamnesa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Anamnesa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Anamnesa();
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                
            ]);
        }
    }

    /**
     * Updates an existing Anamnesa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //$id = $_POST['id'];
        $model = $this->findModel($id);

        

        $faktor_resiko_riwayat = explode(',', $model->faktor_resiko_riwayat);
        $faktor_resiko_kebiasaan = explode(',', $model->faktor_resiko_kebiasaan);
        $psikososial_tingber = explode(',', $model->psikososial_tingber);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
       } else {

            if(Yii::$app->request->isAjax) {
                $html = $this->renderPartial('update', [
                    'model' => $model,      
                    'faktor_resiko_riwayat' => $faktor_resiko_riwayat,
                    'faktor_resiko_kebiasaan' => $faktor_resiko_kebiasaan,
                    'psikososial_tingber' => $psikososial_tingber

                ]);

                return Json::encode($html);
            }
            else {
                return $this->render('update', [
                    'model' => $model,      
                    'faktor_resiko_riwayat' => $faktor_resiko_riwayat,
                    'faktor_resiko_kebiasaan' => $faktor_resiko_kebiasaan,
                    'psikososial_tingber' => $psikososial_tingber

                ]);    
            }
       }
          
    }

    /**
     * Deletes an existing Anamnesa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionPopupKeluhan($id) {
       $model = $this->findModel($id);
       if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
//        if ($_POST) {
//            $model->load(Yii::$app->request->post());
//            if ($model->save()) {
//                return $this->redirect(['index', 'pasienId' => $model->id]);
//            }
//            //return $this->redirect(['view', 'id' => $model->id]);
//        }
        return $this->renderAjax('popup/_keluhanDetail', [
                    'model' => $model,
        ]);
    }
    
    
     public function actionPopupRincilokasi($id,$param,$keluhan) {
        // $id = $_GET[0]['id'];
        $model = $this->findModel($id);
      
       $dataLokasi = str_replace("_"," ",$_GET['param']);
      
        return $this->renderAjax('popup/_keluhanRincilokasi', [
                    'model' => $model,
                    'dataLokasi' => $dataLokasi,
        ]);
    }
    
    
     public function actionPopupLokasi() {
       
        $id = $_GET[0]['id'];
       $model = $this->findModel($id);
       Yii::$app->response->format = Response::FORMAT_JSON;
      // if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
    
     //  if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
         
       //    $model->save();
        //    return $this->redirect(['update', 'id' => $model->id]);
          // return ActiveForm::validate($model);
        //}else{ //echo "2";
           return $this->renderAjax('popup/_keluhanLokasi', [
                    'model' => $model,
        ]); 
        //}
       // 
//        if ($_POST) {
//            $model->load(Yii::$app->request->post());
//            if ($model->save()) {
//                return $this->redirect(['index', 'pasienId' => $model->id]);
//            }
//            //return $this->redirect(['view', 'id' => $model->id]);
//        }
        
    }
   // public $datakeluhan2 ;
    public function actionLokasiDetail($datakeluhan2,$id) {
       // $id = $_GET[0]['id'];
        $model = $this->findModel($id);
       //   $model = new Anamnesa;
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
          $datakeluhan="";
          if (Yii::$app->request->post()) {
             $data = Yii::$app->request->post();
          //   var_dump($data);exit();
            $datakeluhan = $data['keluhan_'];
          //  echo "testtttttttttttt2".$datakeluhan;
}
       //   echo "testtttttttttttt1".$datakeluhan;exit();
        // $datakeluhan2 = $_POST['keluhan'];
           // Yii::$app->response->format = Response::FORMAT_JSON;
        $datalokasi = $this->renderAjax('popup/_lokasiDetail',['model'=> $model, 'datakeluhan'=>$datakeluhan,'datakeluhan2'=>$datakeluhan2]);
        return Json::encode($datalokasi);
    }
    
    public function actionSaveLokasi($id) {
        $model = $this->findModel($id);
       //   $model = new Anamnesa;
        $return =0;
        $model->keluhan_lokasi_umum ="";
        $model->keluhan_sub_lokasi = "";
         //  $model->keluhan = Lookup::findOne(['name'=>  $_POST['Anamnesa']['keluhan_rincian'] ])->type;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
$model->save();

            $return=1; 
        }
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
        
         
        return Json::encode($return);
    }
    
    public function actionSaveLokasiumum($id) {
        $model = $this->findModel($id);
        $model->keluhan_rincian ="";
        $model->keluhan_lokasi = "";
        $return =0;
       //    $model->keluhan = Lookup::findOne(['name'=>  $_POST['Anamnesa']['keluhan_rincian'] ])->type;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
$model->save();

            $return=1; 
        }
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
        
         
        return Json::encode($return);
    }
    
     public function actionSaveKeluhan($id) {
        $model = $this->findModel($id);
        $model->keluhan_rincian ="";
        $model->keluhan_lokasi = "";
        $return =0;
       //    $model->keluhan = Lookup::findOne(['name'=>  $_POST['Anamnesa']['keluhan_rincian'] ])->type;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
$model->save();

            $return=1; 
        }
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
        
         
        return Json::encode($return);
    }
    
      public function actionAnamnesaTerpimpin($id)
    {
          $model = $this->findModel($id);
        //  $model = new Anamnesa;
           Yii::$app->response->format = Response::FORMAT_JSON;
    //    if ($model->load(Yii::$app->request->post()) && $model->save()) {
     //       return $this->redirect(['view', 'id' => $model->id]);
     //   } else {
            return $this->renderAjax('popup/anamnesaterpimpin', [
                'model' => $model,
            ]);
      //  }
    }
    
     public function actionSifatKelangsungan($id)
    {
          $model = $this->findModel($id);
        //  $model = new Anamnesa;
        //   Yii::$app->response->format = Response::FORMAT_JSON;
    //    if ($model->load(Yii::$app->request->post()) && $model->save()) {
     //       return $this->redirect(['view', 'id' => $model->id]);
     //   } else {
            return $this->renderAjax('popup/_popupSifatkelangsungan', [
                'model' => $model,
            ]);
      //  }
    }
    
    public function actionPopupMenjalar($id) {
       $model = $this->findModel($id);
       if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
//        if ($_POST) {
//            $model->load(Yii::$app->request->post());
//            if ($model->save()) {
//                return $this->redirect(['index', 'pasienId' => $model->id]);
//            }
//            //return $this->redirect(['view', 'id' => $model->id]);
//        }
        return $this->renderAjax('popup/_popupmenjalar', [
                    'model' => $model,
        ]);
    }
    
    
     public function actionPopupRincilokasijalar($id,$param) {
        // $id = $_GET[0]['id'];
        $model = $this->findModel($id);
      
       $dataLokasi = str_replace("_"," ",$_GET['param']);
      
        return $this->renderAjax('popup/_menjalarRincilokasi', [
                    'model' => $model,
                    'dataLokasi' => $dataLokasi,
        ]);
    }
    
    
     public function actionPopupKemunculan($id,$param) {
        // $id = $_GET[0]['id'];
        $model = $this->findModel($id);
      
       $dataLokasi = str_replace("_"," ",$_GET['param']);
      
        return $this->renderAjax('popup/_popupKemunculan', [
                    'model' => $model,
                    'dataLokasi' => $dataLokasi,
        ]);
    }
    
       public function actionSaveKeluhankarakter($id) {
        $model = $this->findModel($id);
       //   $model = new Anamnesa;
        $return =0;
     //   $model->keluhan_lokasi_umum ="";
    //    $model->keluhan_sub_lokasi = "";
         //  $model->keluhan = Lookup::findOne(['name'=>  $_POST['Anamnesa']['keluhan_rincian'] ])->type;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
$model->save();

            $return=1; 
        }
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
        
         
        return Json::encode($return);
    }
    
      public function actionKeluhanTambahan($id)
   //  public function actionFormtambahankeluhan($id)
    {
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->findModel($id);
    
        $modelTambahan = $this->findModelTambahan($id);
        $countTambahan = Anamnesa::find()->where('parent_id = :id and parent_id != id', ['id'=>$id])->count();
     
        $keluhan =[];
     
            if($countTambahan > 0)
        {
                foreach($modelTambahan as $row)
                {
                    $keluhan[] = $row->keluhan;
                   

                  }
          }
      //  }
         
       
          return $this->renderAjax('tambahan/_formkeluhantambahan', [
                'model' => $model, 
                'modelTambahan' => $keluhan, 

            ]);
      
    }

    
      public function actionSaveKeluhantambahan($id) {
        $model = new Anamnesa;
       //   $model = new Anamnesa;
        $model->parent_id = $id;
        $model->keluhan = $_POST['data'];
     //   $model->keluhan_lokasi_umum ="";
    //    $model->keluhan_sub_lokasi = "";
         //  $model->keluhan = Lookup::findOne(['name'=>  $_POST['Anamnesa']['keluhan_rincian'] ])->type;
        if ($model->validate()) {
            $model->save();

            
        }
        
        $return = $model->id;
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
        
         
        return Json::encode($return);
    }
    
     public function actionDeleteKeluhantambahan($id) {
      
       $model = Anamnesa::findOne(['parent_id'=>$id,'keluhan'=>$_POST['data']]);
       $model->delete();  
       $return = "1";
    //$datakeluhan =  $app->getRequest()->getQueryParam('keluhan');
        
         
        return Json::encode($return);
    }
    
    /**
     * Finds the Anamnesa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anamnesa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findRegistrasi($id)
    {
        if (($model = Anamnesa::findOne(['registrasi_id'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModel($id)
    {
        if (($model = Anamnesa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
     protected function findModelTambahan($id)
    {
        if ($model = Anamnesa::find()->where('parent_id = :id and parent_id != id', ['id'=>$id])->all()) {
            return $model;
        } else {
            $model = new Anamnesa;
            return $model;
        }
    }
    
    /**
     * The main view to load all anamnesa view using ajax.
     * @param integer $id
     * @return mixed
     */
    public function actionMain($id)
    {
        $this->layout = 'main';
        $modelRegistrasi = $this->findRegistrasi($id);
        $model = $this->findModel($modelRegistrasi->id);

        $registrasi = Registrasi::findOne($model->registrasi_id);
        $pemeriksaan_fisik = PemeriksaanFisik::findOne(['registrasi_id' => $registrasi->id]);
        $faktor_resiko_riwayat = explode(',', $model->faktor_resiko_riwayat);
        $faktor_resiko_kebiasaan = explode(',', $model->faktor_resiko_kebiasaan);
        $psikososial_tingber = explode(',', $model->psikososial_tingber);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
       } else {

            $GLOBALS['collapse'] = true;
            return $this->render('main', [
                    'model' => $model,      
                    'faktor_resiko_riwayat' => $faktor_resiko_riwayat,
                    'faktor_resiko_kebiasaan' => $faktor_resiko_kebiasaan,
                    'psikososial_tingber' => $psikososial_tingber,
                    'pasien' => $registrasi->pasien,
                  //  'resgistrasi' =
                    'pemeriksaan_fisik' => $pemeriksaan_fisik->id
                ]);    
       }
    }    

    /**
     * The main view to load all anamnesa view using ajax.
     * @param integer $id
     * @return mixed
     */
    public function actionPemeriksaanFisik($id)
    {
        $this->layout = 'main';

        $model = $this->findModel($id);

        $registrasi = Registrasi::findOne($model->registrasi_id);

        $faktor_resiko_riwayat = explode(',', $model->faktor_resiko_riwayat);
        $faktor_resiko_kebiasaan = explode(',', $model->faktor_resiko_kebiasaan);
        $psikososial_tingber = explode(',', $model->psikososial_tingber);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
       } else {

            $GLOBALS['collapse'] = true;
            return $this->render('edit', [
                    'model' => $model,      
                    'faktor_resiko_riwayat' => $faktor_resiko_riwayat,
                    'faktor_resiko_kebiasaan' => $faktor_resiko_kebiasaan,
                    'psikososial_tingber' => $psikososial_tingber,
                    'pasien' => $registrasi->pasien
                ]);    
       }
    }        
}

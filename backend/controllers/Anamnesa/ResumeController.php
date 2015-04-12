<?php

namespace backend\controllers\Anamnesa;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\db\Query;
use yii\web\Response;
use backend\models\Anamnesa;
use backend\models\PemeriksaanFisik;
use backend\models\Registrasi;

class ResumeController extends Controller{

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
    
    
 public function actionIndex(){
   //   $modelRegistrasi = $this->findModelRegistrasi(14);// Yii::$app->getRequest()->getQueryParam('id_reg'));
     $var = '14';
      $modelAnamnesa = $this->findModelAnamanesa ($var);//Yii::$app->getRequest()->getQueryParam('id_anamnesa'));
      $modelPemeriksaanFisik = $this->findModelPemerFisik ('1');//Yii::$app->getRequest()->getQueryParam('id_pemerfisik'));
        return $this->renderAjax('index', [
             //   'modelRegistrasi' => $modelRegistrasi,
                'modelAnamnesa' => $modelAnamnesa,
                'modelPemeriksaanFisik' => $modelPemeriksaanFisik,
                
            ]);
 }
 
     protected function findModelRegistrasi($id)
    {
        if (($model = PemeriksaanFisik::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
        protected function findModelAnamanesa($id)
    {
        if (($model = Anamnesa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
        protected function findModelPemerFisik($id)
    {
        if (($model = PemeriksaanFisik::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
 
}
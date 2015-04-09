<?php

namespace backend\controllers;

use backend\models\Anamnesa;
use backend\models\AnamnesaSearch;
use backend\models\Diagnosa;
use backend\models\Icdx;
use backend\models\IcdxSearch;
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
        $model = $this->findModel($id);
        $modelDiagnosa = Diagnosa::findAll(['jenis_diagnosa' => $diagnosa]);
        $dataProvider = new ActiveDataProvider([
            'query' => Icdx::find(),
        ]);
        $searchModel = new IcdxSearch();
        return $this->render('update', [
           'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelDiagnosa' => $modelDiagnosa
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

    protected function findModel($id)
    {
        if (($model = Diagnosa::findOne(['registrasi_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

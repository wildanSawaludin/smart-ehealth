<?php

namespace backend\controllers\Anamnesa;

use Yii;
use yii\web\Response;
use backend\models\PemeriksaanFisik;
use yii\db\Query;
use yii\helpers\Json;

class PemeriksaanFisikController extends AnamnesaController{

 public function actionCreate(){
     $model = new PemeriksaanFisik();
       
     //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
            return $this->render('create', [
                'model' => $model,
               
                
            ]);
        //}
     
 }
}
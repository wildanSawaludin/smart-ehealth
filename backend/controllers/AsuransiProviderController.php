<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\AsuransiProvider;
use backend\models\AsuransiProviderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Pasien;
use yii\web\Response;
use kartik\widgets\ActiveForm;
use yii\helpers\Json;
use yii\db\Query;

/**
 * AsuransiProviderController implements the CRUD actions for AsuransiProvider model.
 */
class AsuransiProviderController extends Controller
{
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
     * Lists all AsuransiProvider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AsuransiProviderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new AsuransiProvider();
        if (Yii::$app->request->post()) {

            $model->load(Yii::$app->request->post());
//            $model->registrasi_date = date('Y-m-d');
            if ($model->tgl_mulai_ks){
                $model->tgl_mulai_ks = Yii::$app->get('helper')->dateFormatingStrip($model->tgl_mulai_ks);}
            if ($model->tgl_selesai_ks){
                $model->tgl_selesai_ks = Yii::$app->get('helper')->dateFormatingStrip($model->tgl_selesai_ks);}
            $model->save();
            //if($model->save())return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single AsuransiProvider model.
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
     * Creates a new AsuransiProvider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AsuransiProvider();
        
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            
            if ($model->tgl_mulai_ks){
                $model->tgl_mulai_ks = Yii::$app->get('helper')->dateFormatingStrip($model->tgl_mulai_ks);}
            if ($model->tgl_selesai_ks){
                $model->tgl_selesai_ks = Yii::$app->get('helper')->dateFormatingStrip($model->tgl_selesai_ks);}

            if ($model->save()) {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AsuransiProvider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AsuransiProvider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AsuransiProvider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AsuransiProvider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AsuransiProvider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionPasienList($search = null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select('id, nama AS text')
                    ->from('pasien')
                    ->where('nama LIKE "%' . $search . '%"')
                    ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Pasien::find($id)->nama];
        } else {
            $out['results'] = ['id' => 0, 'text' => 'Pasien tidak ditemukan'];
        }
        echo Json::encode($out);
    }
}

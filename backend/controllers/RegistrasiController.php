<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Registrasi;
use backend\models\Icdx;
use backend\models\RegistrasiSearch;
use backend\models\Anamnesa;
use backend\models\AnamnesaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Pasien;
use yii\web\Response;
use kartik\widgets\ActiveForm;
use yii\helpers\Json;
use yii\db\Query;

/**
 * RegistrasiController implements the CRUD actions for Registrasi model.
 */
class RegistrasiController extends Controller {

    public function behaviors() {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['pasien-list', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['index', 'create', 'update', 'delete', 'mdaddpasien'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Registrasi models.
     * @return mixed
     */
    public function actionIndex($pId = null) {
        $searchModel = new RegistrasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Registrasi();
        if (Yii::$app->request->post()) {

            $model->load(Yii::$app->request->post());
            $model->tanggal_registrasi = date('Y-m-d');
            if ($model->asuransi_tgl_lahir)
                $model->asuransi_tgl_lahir = Yii::$app->get('helper')->dateFormatingStrip($model->asuransi_tgl_lahir);
            $model->save();
            $model->no_reg= (string)sprintf('%08d', $model->id);
            $model->save();
            //if($model->save())return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pId' => $pId,
                    'model' => $model,
        ]);
    }

    /**
     * Displays a single Registrasi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {

        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Registrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Registrasi();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            var_dump($model->pasienId);
            exit;
            $model->tanggal_registrasi = date('Y-m-d H:i:s');
            if ($model->asuransi_tgl_lahir)
                $model->asuransi_tgl_lahir = Yii::$app->get('helper')->dateFormatingStrip($model->asuransi_tgl_lahir);

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
     * Updates an existing Registrasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing Registrasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionMdaddpasien() {
        $model = new Pasien;
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($_POST) {
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                return $this->redirect(['index', 'pasienId' => $model->id]);
            }
            //return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->renderAjax('popup/_addPasien', [
                    'model' => $model,
        ]);
    }
    
    public function actionResume($id)
    {
        $model = $this->findModel($id);
        $model->status_registrasi = 'Anamnesa';
        $model->save();
        
        $modelResume = new Anamnesa;
        $modelResume->registrasi_id = $id;
        $modelResume->save();
        
        if($modelResume->save()){
            return $this->redirect(['Anamnesa/anamnesa/update', 'id' => $modelResume->id]);
        }
//        var_dump($modelResume);
//                exit();
        
            
    }

    /**
     * Finds the Registrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Registrasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Registrasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPasienList($search = null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select(['id', 'concat(nama,"||",no_rm) as text'])
                    ->from('pasien')
                    ->where('concat(nama,"||",no_rm) LIKE "%' . $search . '%"')
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
    
    public function actionIcdxList($search = null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select(['id', 'concat(kode,"||",inggris) as text'])
                    ->from('icdx')
                    ->where('concat(kode,"||",inggris) LIKE "%' . $search . '%"')
                    ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Icdx::find($id)->nama];
        } else {
            $out['results'] = ['id' => 0, 'text' => 'Icdx tidak ditemukan'];
        }
        echo Json::encode($out);
    }

}

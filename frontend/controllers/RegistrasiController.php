<?php

namespace frontend\controllers;

use Yii;
use backend\models\Registrasi;
use backend\models\RegistrasiSearch;
use backend\models\Pasien;
use backend\models\FasilitasKesehatan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistrasiController implements the CRUD actions for Registrasi model.
 */
class RegistrasiController extends Controller
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
     * Lists all Registrasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegistrasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelPasien = Pasien::find()->where(['user_id' => Yii::$app->user->id])->one();
        $model = new Registrasi();
        if (Yii::$app->request->post()) {

            $model->load(Yii::$app->request->post());
            $model->pasien_id = $modelPasien->id;
            $model->tanggal_registrasi = date('Y-m-d H:i:s');
            $model->status_registrasi = 'Antrian';
            $model->asal_registrasi = 'Web';
//            $model->tanggal_kunjungan = date('Y-m-d');
            $model->no_antrian = $model->getNoAntrian(date('Y-m-d'), $model->faskes_id);
            $model->save();
            $model->no_reg= str_pad($model->id, 8, '0', STR_PAD_LEFT);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
//        var_dump($model);
//                exit();
        return $this->render('index', [
            'model' => $model,
            'modelPasien' => $modelPasien,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Registrasi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $modelPasien = Pasien::find()->where(['user_id' => Yii::$app->user->id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelPasien' => $modelPasien
        ]);
    }

    /**
     * Creates a new Registrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Registrasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
     * Deletes an existing Registrasi model.
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
     * Finds the Registrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Registrasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Registrasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionUpdatePasien($id)
    {
        $model = Pasien::findOne($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } 
            return $this->render('_updatePasien', [
                'model' => $model,
            ]);
        
    }

    public function actionLists($id)
    {
        $countFaskes = FasilitasKesehatan::find()
                ->where(['kecamatan_id' => $id])
                ->count();

        $faskes = FasilitasKesehatan::find()
                ->where(['kecamatan_id' => $id])
                ->orderBy('id DESC')
                ->all();

        if ($countFaskes > 0) {
            foreach ($faskes as $fasks) {
                echo "<option value='" . $fasks->id . "'>" . $fasks->nama . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }

}

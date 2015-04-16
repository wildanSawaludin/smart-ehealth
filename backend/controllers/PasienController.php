<?php

namespace backend\controllers;

use Yii;
use backend\models\Pasien;
use backend\models\PasienSearch;
use dektrium\user\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PasienController implements the CRUD actions for Pasien model.
 */
class PasienController extends Controller
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
     * Lists all Pasien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pasien model.
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
     * Creates a new Pasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pasien();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pasien model.
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
     * Deletes an existing Pasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionActivation($id)
    {
        $user = Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
        ]);
        
        $user->username = str_pad($id, 6, "0", STR_PAD_LEFT);
        $user->email = 'username'.$id.'@example.com';
        $user->password = 'segeradiubah';
        $user->create();
        
        $model = $this->findModel($id);
        $model->user_id = $user->id;
        $model->save();
        
        $access = Yii::$app->authManager;
        $item = $access->getRole('Pasien');
        $access->assign($item,$user->id);
        
        return $this->redirect(['index']);

    }
    
    public function actionDeactivation($id)
    {
        $model = $this->findModel($id);
        $modelUser = User::find($model->user_id);
        var_dump($modelUser);
                exit();
        
//        $access = Yii::$app->authManager;
//        $item = $access->getRole('Pasien');
//        $access->revoke($item,$modelUser->id);
//        $model->user_id = NULL;
//        $model->save();
        
        
        return $this->redirect(['index']);

    }

    /**
     * Finds the Pasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pasien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

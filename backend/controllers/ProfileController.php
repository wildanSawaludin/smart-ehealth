<?php

namespace backend\controllers;

use Yii;
use backend\models\Pasien;
use backend\models\PasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProfileController extends Controller {

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

    	var_dump(34);
    	exit();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'pId' => $pId,
                    'model' => $model,
        ]);
    }
    
}

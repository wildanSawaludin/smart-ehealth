<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use Faker;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'generate'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionGenerate($row = 1000, $iterate = 10) {
        $start = microtime(true);
        $faker = Faker\Factory::create('id_ID');
        $datas = [];
        for ($j = 1; $j <= $iterate; $j++) {
            for ($i = 1; $i <= $row; $i++) {
                $jkl = $faker->randomElement(['Laki-laki','Perempuan']);
                $datas[$i] = [
                    $faker->numberBetween($min = 10000, $max = 90000),
                    ($jkl == 'Laki-laki' ? $faker->name('Male') : $faker->name('Female')), 
                    $faker->city, 
                    $faker->dateTimeThisCentury->format('Y-m-d'), 
                    $jkl, 
                    $faker->randomElement(['A', 'B', 'AB', 'O']), 
                    $faker->randomElement(['Islam','Kristen Protestan','Kristen Katholik','Budha','Hindu','Konghucu']), 
                    $faker->randomElement(['PNS','Swasta','Wiraswasta','Pelajar/Mahasiswa','TNI','POLRI']), 
                    'Indonesia', 
                    $faker->address,
                    $faker->phoneNumber,
                    ];
            }
            \Yii::$app->db->createCommand()->batchInsert('pasien', [
                'no_rm', 
                'nama', 
                'tempat_lahir', 
                'tgl_lahir', 
                'jenkel',
                'goldar',
                'agama',
                'pekerjaan',
                'warga_negara',
                'alamat',
                'notelp'
                ], $datas)->execute();
        }

        $time_elapsed_us = microtime(true) - $start;
        echo ($row * $iterate) . ' = ' . $time_elapsed_us . ' <br>';
    }

}

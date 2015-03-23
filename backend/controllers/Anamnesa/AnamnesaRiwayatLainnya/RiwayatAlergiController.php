<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 22/03/15
 * Time: 17:46
 */

namespace backend\controllers\Anamnesa\AnamnesaRiwayatLainnya;


use backend\controllers\Anamnesa\AnamnesaController;
use backend\models\Anamnesa;
use Yii;

class RiwayatAlergiController extends AnamnesaController{
    public function actionPopupRiwayatAlergi($id)
    {
        $model = Anamnesa::findOne($id);
        echo Yii::$app->view->renderFile('@app/views/Anamnesa/anamnesa-riwayat/riwayat-alergi/riwayatAlergi.php',[
            'model' => $model
        ]);

    }

    public function actionPopupRiwayatAlergiObat($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('riwayat-alergi/alergi-obat', [
            'model' => $model
        ]);
    }

    public function actionPopupRiwayatAlergiMakanan($id)
    {
        $model = Anamnesa::findOne($id);
        echo Yii::$app->view->renderFile('@app/views/Anamnesa/anamnesa-riwayat/riwayat-alergi/alergiMakanan.php',[
            'model' => $model
        ]);
    }

    public function actionPopupRiwayatAlergiSabun($id)
    {
        $model = Anamnesa::findOne($id);
        echo Yii::$app->view->renderFile('@app/views/Anamnesa/anamnesa-riwayat/riwayat-alergi/alergiSabun.php',[
            'model' => $model
        ]);
    }

    public function actionUpdateAlergi($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $nama_jenis = $_POST['nama_jenis'];
            $model->alergi_obat_pil = 1;
            $model->alergi_obat_jenis = $nama_jenis;
            $model->save();
        }
    }

    public function actionUpdateAlergiMakanan($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $nama_jenis = $_POST['nama_jenis'];
            $model->alergi_makanan_pil = 1;
            $model->alergi_makanan = $nama_jenis;
            $model->save();
        }
    }

    public function actionUpdateAlergiSabun($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $nama_jenis = $_POST['nama_jenis'];
            $model->alergi_sabun_pil = 1;
            $model->alergi_sabun = $nama_jenis;
            $model->save();
        }
    }

    public function actionUpdateAlergiUdara($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $nama_jenis = $_POST['nama_jenis'];
            $model->alergi_udara_pil = 1;
            $model->alergi_udara = $nama_jenis;
            $model->save();
        }
    }

    public function actionUpdateAlergiDebu($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $nama_jenis = $_POST['nama_jenis'];
            $model->alergi_debu_pil = 1;
            $model->alergi_debu = $nama_jenis;
            $model->save();
        }
    }

    public function actionUpdateAlergiLainnya($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $nama_jenis = $_POST['nama_jenis'];
            $model->alergi_lainnya_pil = 1;
            $model->alergi_lainnya = $nama_jenis;
            $model->save();
        }
    }
}
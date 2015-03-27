<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 23/03/15
 * Time: 20:38
 */

namespace backend\controllers\Anamnesa\AnamnesaRiwayatLainnya;


use backend\controllers\Anamnesa\AnamnesaController;
use Yii;
use backend\models\Anamnesa;

class RiwayatImunisasiController extends AnamnesaController{
    public function actionPopupRiwayatImunisasi($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('//Anamnesa/anamnesa-riwayat/riwayat-imunisasi/riwayatImunisasi', [
            'model' => $model,
        ]);

    }

    public function actionUpdateImunisasi($id)
    {
        $model = $this->findModel($id);
        if(isset($_POST)){
            $nama_jenis = $_POST['nama_jenis'];
            $model->riwayat_imunisasi_pil = $_POST['imunisasi_pil'];
            $model->riwayat_imunisasi = $nama_jenis;
            $model->save();
        }
    }
}
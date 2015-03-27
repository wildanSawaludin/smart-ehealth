<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 23/03/15
 * Time: 11:28
 */

namespace backend\controllers\Anamnesa\AnamnesaRiwayatLainnya;


use backend\controllers\Anamnesa\AnamnesaController;
use Yii;
use backend\models\Anamnesa;

class RiwayatTransfusiController extends AnamnesaController{
    public function actionPopupRiwayatTransfusi($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('//Anamnesa/anamnesa-riwayat/riwayat-transfusi/riwayatTransfusi', [
           'model' => $model,
        ]);

    }

    public function actionUpdateTransfusi($id)
    {
        $model = $this->findModel($id);
        if(isset($_POST)){
            $model->riwayat_transfusi_pil = $_POST['transfusi_pil'];
            $model->transfusi_wb_pil = $_POST['Anamnesa']['transfusi_wb_pil'];
            $model->transfusi_wb_waktu = date('Y-m-d', strtotime($_POST['Anamnesa']['transfusi_wb_waktu']));
            $model->transfusi_wb_jumlah = $_POST['Anamnesa']['transfusi_wb_jumlah'];
            $model->transfusi_wb_ukuran = $_POST['Anamnesa']['transfusi_wb_ukuran'];
            $model->transfusi_trombosit_pil = $_POST['Anamnesa']['transfusi_trombosit_pil'];
            $model->transfusi_trombosit_waktu = date('Y-m-d', strtotime($_POST['Anamnesa']['transfusi_trombosit_waktu']));
            $model->transfusi_trombosit_jumlah = $_POST['Anamnesa']['transfusi_trombosit_jumlah'];
            $model->transfusi_trombosit_ukuran = $_POST['Anamnesa']['transfusi_trombosit_ukuran'];
            $model->transfusi_eritrosit_pil = $_POST['Anamnesa']['transfusi_eritrosit_pil'];
            $model->transfusi_eritrosit_waktu = date('Y-m-d', strtotime($_POST['Anamnesa']['transfusi_eritrosit_waktu']));
            $model->transfusi_eritrosit_jumlah = $_POST['Anamnesa']['transfusi_eritrosit_jumlah'];
            $model->transfusi_eritrosit_ukuran = $_POST['Anamnesa']['transfusi_eritrosit_ukuran'];
            $model->save();
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 25/03/15
 * Time: 20:09
 */

namespace backend\controllers\Anamnesa;


use backend\models\Anamnesa;
use backend\models\KebiasaanObat;

class AnamnesaKebiasaanController extends AnamnesaController{

    public function actionPopupKebiasaan($id)
    {
        $model = Anamnesa::findOne($id);
        $modelKebiasaanObat = KebiasaanObat::findAll(['anamnesa_id' => $id]);
        return $this->renderAjax('kebiasaanObat', [
            'model' => $model,
            'modelKebiasaanObat' => $modelKebiasaanObat
        ]);
    }

    public function actionPopupRokok($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('kebiasaanRokok', [
           'model' => $model,
        ]);
    }

    public function actionUpdateKebiasaanPengobatan($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $model->kebiasaan_obat_pil = $_POST['kebiasaan_obat_pil'];
            $model->save();

            $deleteKebiasaanObat = KebiasaanObat::deleteAll(['anamnesa_id' => $id]);

            $awal_pemakaian_nil = $_POST['awal_pemakaian_nil'];
            $awal_pemakaian_waktu = $_POST['awal_pemakaian_waktu'];
            $lama_pemakaian_nil = $_POST['lama_pemakaian_nil'];
            $lama_pemakaian_waktu = $_POST['lama_pemakaian_waktu'];
            $nama_obat = $_POST['nama_obat'];
            $waktu_pemakaian = $_POST['waktu_pemakaian'];

            for($i=0;$i<count($nama_obat);$i++){
                $modelKebiasaanObat = new KebiasaanObat();
                $modelKebiasaanObat->anamnesa_id = $id;
                $modelKebiasaanObat->nama_obat = $nama_obat[$i];
                $modelKebiasaanObat->awal_pemakaian_nil = $awal_pemakaian_nil[$i];
                $modelKebiasaanObat->awal_pemakaian_waktu = $awal_pemakaian_waktu[$i];
                $modelKebiasaanObat->lama_pemakaian_nil = $lama_pemakaian_nil[$i];
                $modelKebiasaanObat->lama_pemakaian_waktu = $lama_pemakaian_waktu[$i];
                $modelKebiasaanObat->waktu_pemakaian = $waktu_pemakaian[$i];
                $modelKebiasaanObat->save();
            }
        }
    }

    public function actionUpdateKebiasaanRokok($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['kebiasaan_rokok_awal'])){
            $model->kebiasaan_rokok_awal = $_POST['kebiasaan_rokok_awal'];
            $model->kebiasaan_rokok_berhenti = $_POST['kebiasaan_rokok_berhenti'];
            $model->save();
        }

        if(isset($_POST['kebiasaan_rokok_jmlh'])){
            $model->kebiasaan_rokok_jmlh = $_POST['kebiasaan_rokok_jmlh'];
            $model->kebiasaan_rokok_satuan = $_POST['kebiasaan_rokok_satuan'];
            $model->kebiasaan_rokok_nil = $_POST['anamnesa-kebiasaan_rokok_nil'];
            $model->kebiasaan_rokok_jenis = $_POST['anamnesa-kebiasaan_rokok_jenis'];
            $model->save();
        }
    }
}
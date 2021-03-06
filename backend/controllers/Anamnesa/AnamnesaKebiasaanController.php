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
use Yii;

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

    public function actionPopupAlkohol($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('kebiasaanAlkohol', [
            'model' => $model,
        ]);
    }

    public function actionPopupPerawatanDiri($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('kebiasaanPerawatanDiri', [
            'model' => $model,
        ]);
    }

    public function actionPopupNutrisi($id)
    {
        $model = Anamnesa::findOne($id);
        $pembatasan_asupan = explode(',', $model->makan_pembatasan_asupan);
        $makan_pokok = explode(',', $model->makan_menu_pokok);
        $lauk = explode(',', $model->makan_menu_lauk);
        $sayuran = explode(',', $model->makan_menu_sayur);
        $buah = explode(',', $model->makan_menu_buah);

        return $this->renderAjax('kebiasaanNutrisi', [
           'model' => $model,
            'pembatasan_asupan' => $pembatasan_asupan,
            'makan_pokok' => $makan_pokok,
            'lauk' => $lauk,
            'sayuran' => $sayuran,
            'buah' => $buah
        ]);
    }

    public function actionPopupOlahraga($id)
    {
        $model = Anamnesa::findOne($id);
        $olahraga_jenis = explode(',', $model->olahraga_jenis);
        return $this->renderAjax('kebiasaanOlahraga', [
           'model' => $model,
            'olahraga_jenis' => $olahraga_jenis
        ]);
    }

    public function actionPopupKegiatan($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('kebiasaanKegiatan', [
            'model' => $model
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

    public function actionUpdateKebiasaanAlkohol($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['kebiasaan_alkohol_pil_uncheck'])){
            $model->kebiasaan_alkohol_pil = $_POST['kebiasaan_alkohol_pil_uncheck'];
            $model->save();
        }

        if(isset($_POST['kebiasaan_alkohol_awal'])){
            $model->kebiasaan_alkohol_awal = $_POST['kebiasaan_alkohol_awal'];
            $model->kebiasaan_alkohol_berhenti = $_POST['kebiasaan_alkohol_berhenti'];
            $model->save();
        }

        if(isset($_POST['kebiasaan_alkohol_pil'])){
            $model->kebiasaan_alkohol_pil = $_POST['kebiasaan_alkohol_pil'];
            $model->kebiasaan_alkohol_nil = $_POST['anamnesa-kebiasaan_alkohol_nil'];
            $model->kebiasaan_alkohol_lama = $_POST['anamnesa-kebiasaan_alkohol_lama'];
            $model->kebiasaan_alkohol_jenis = $_POST['anamnesa-kebiasaan_alkohol_jenis'];
            $model->save();
        }
    }

    public function actionUpdateKebiasaanPerawatan($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['kebiasaan_perawatan_pil_uncheck'])){
            $model->kebiasaan_perawatan_pil = $_POST['kebiasaan_perawatan_pil_uncheck'];
            $model->save();
        }

        if (Yii::$app->request->post('Anamnesa')) {

            $post = Yii::$app->request->post('Anamnesa');

            $model->kebiasaan_perawatan_pil = '1';
            $model->perawatan_mandi_pil = $post['perawatan_mandi_pil'];
            $model->perawatan_mandi_jmlh = $post['perawatan_mandi_jmlh'];
            $model->perawatan_mandi_lama = $post['perawatan_mandi_lama'];
            $model->perawatan_mandi_oleh = $post['perawatan_mandi_oleh'];
            $model->perawatan_rambut_pil = $post['perawatan_rambut_pil'];
            $model->perawatan_rambut_jmlh = $post['perawatan_rambut_jmlh'];
            $model->perawatan_rambut_lama = $post['perawatan_rambut_lama'];
            $model->perawatan_rambut_oleh = $post['perawatan_rambut_oleh'];
            $model->perawatan_kuku_pil = $post['perawatan_kuku_pil'];
            $model->perawatan_kuku_jmlh = $post['perawatan_kuku_jmlh'];
            $model->perawatan_kuku_lama = $post['perawatan_kuku_lama'];
            $model->perawatan_kuku_oleh = $post['perawatan_kuku_oleh'];
            $model->perawatan_tidur_pil = $post['perawatan_tidur_pil'];
            $model->perawatan_tidur_jmlh = $post['perawatan_tidur_jmlh'];
            $model->perawatan_tidur_lama = $post['perawatan_tidur_lama'];
            $model->perawatan_tidur_oleh = $post['perawatan_tidur_oleh'];

            $model->save();

        }
    }

    public function actionUpdateKebiasaanNutrisi($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['kebiasaan_nutrisi_pil_uncheck'])){
            $model->kebiasaan_nutrisi_pil = $_POST['kebiasaan_nutrisi_pil_uncheck'];
            $model->save();
        }

        if(Yii::$app->request->post('Anamnesa')){
            $post = Yii::$app->request->post('Anamnesa');

            $pembatasan_asupan = ($post['makan_pembatasan_asupan'] != null ) ? implode(',', $post['makan_pembatasan_asupan']) : 'null';

            $model->kebiasaan_nutrisi_pil = '1';
            $model->nutrisi_selera_pil = $post['nutrisi_selera_pil'];
            $model->nutrisi_selera_makan = $post['nutrisi_selera_makan'];
            $model->makan_frekuensi_pil = $post['makan_frekuensi_pil'];
            $model->makan_frekuensi = $post['makan_frekuensi'];
            $model->makan_pembatasan_pil = $post['makan_pembatasan_pil'];
            $model->makan_pembatasan_asupan = $pembatasan_asupan;
            $model->makan_menu_pil = $post['makan_menu_pil'];
            $model->minum_jenis_pil = $post['minum_jenis_pil'];
            $model->minum_jenis = $post['minum_jenis'];
            $model->minum_frekuensi_pil = $post['minum_frekuensi_pil'];
            $model->minum_frekuensi = $post['minum_frekuensi'];
            $model->minum_cara_pil = $post['minum_cara_pil'];
            $model->minum_cara_pemenuhan = $post['minum_cara_pemenuhan'];
            $model->save();
        }
    }

    public function actionUpdateKebiasaanNutrisiMakan($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->request->post('Anamnesa')){
            $post = Yii::$app->request->post('Anamnesa');
            $makanan_pokok = ($post['makan_menu_pokok'] != null ) ? implode(',', $post['makan_menu_pokok']) : 'null';
            $lauk = ($post['makan_menu_lauk'] != null ) ? implode(',', $post['makan_menu_lauk']) : 'null';
            $sayuran = ($post['makan_menu_sayur'] != null ) ? implode(',', $post['makan_menu_sayur']) : 'null';
            $buah = ($post['makan_menu_buah'] != null ) ? implode(',', $post['makan_menu_buah']) : 'null';

            $model->makan_menu_pokok = $makanan_pokok;
            $model->makan_menu_lauk = $lauk;
            $model->makan_menu_sayur = $sayuran;
            $model->makan_menu_buah = $buah;
            $model->makan_pokok_lainnya_pil = $post['makan_pokok_lainnya_pil'];
            $model->makan_pokok_lainnya = $post['makan_pokok_lainnya'];
            $model->makan_lauk_lainnya_pil = $post['makan_lauk_lainnya_pil'];
            $model->makan_lauk_lainnya = $post['makan_lauk_lainnya'];
            $model->makan_sayuran_lainnya_pil = $post['makan_sayuran_lainnya_pil'];
            $model->makan_sayuran_lainnya = $post['makan_sayuran_lainnya'];
            $model->makan_buah_lainnya_pil = $post['makan_buah_lainnya_pil'];
            $model->makan_buah_lainnya = $post['makan_buah_lainnya'];
            $model->save();
        }
    }

    public function actionUpdateKebiasaanOlahraga($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['kebiasaan_olahraga_pil_uncheck'])){
            $model->kebiasaan_olahraga_pil = $_POST['kebiasaan_olahraga_pil_uncheck'];
            $model->save();
        }

        if(Yii::$app->request->post('Anamnesa')){
            $post = Yii::$app->request->post('Anamnesa');
            $olahraga_jenis = ($post['olahraga_jenis'] != null ) ? implode(',', $post['olahraga_jenis']) : 'null';

            $model->kebiasaan_olahraga_pil = '1';
            $model->olahraga_jenis = $olahraga_jenis;
            $model->olahraga_frekuensi_kali = $post['olahraga_frekuensi_kali'];
            $model->olahraga_frekuensi_lama = $post['olahraga_frekuensi_lama'];
            $model->save();
        }
    }

    public function actionUpdateKebiasaanKegiatan($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['kebiasaan_kegiatan_pil_uncheck'])){
            $model->kebiasaan_kegiatan_pil = $_POST['kebiasaan_kegiatan_pil_uncheck'];
            $model->save();
        }

        if(Yii::$app->request->post('Anamnesa')){
            $post = Yii::$app->request->post('Anamnesa');

            $model->kebiasaan_kegiatan_pil = '1';
            $model->kegiatan_jenis = $post['kegiatan_jenis'];
            $model->kegiatan_frekuensi_kali = $post['kegiatan_frekuensi_kali'];
            $model->kegiatan_frekuensi_lama = $post['kegiatan_frekuensi_lama'];
            $model->save();
        }
    }
}
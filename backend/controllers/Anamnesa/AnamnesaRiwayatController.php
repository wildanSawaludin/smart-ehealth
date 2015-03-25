<?php

namespace backend\controllers\Anamnesa;
/**
 * Description of AnamnesaRiwayatController
 *
 * @author Rio
 */
use Yii;
use yii\web\Response;
use backend\controllers\Anamnesa\AnamnesaController;
use backend\models\Icdx;
use backend\models\Anamnesa;
use backend\models\RiwayatPengobatan;
use yii\db\Query;
use yii\helpers\Json;

class AnamnesaRiwayatController extends AnamnesaController {


    public function actionUpdatePenyakit($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $model->riwayat_penyakit_pil = $_POST['riwayat_penyakit_pil'];
            $model->riwayatsakit_icdx_id = $_POST['riwayatsakit_icdx_id'];
            $model->riwayat_penyakit_nil = $_POST['riwayat_penyakit_nil'];
            $model->riwayat_penyakit_lama = $_POST['riwayat_penyakit_lama'];
            $model->save();
        }
    }

    public function actionUpdateKeluarga($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST)){
            $model->riwayat_keluarga_pil = $_POST['riwayat_keluarga_pil'];
            $model->riwayatkel_icdx_id = $_POST['riwayatkel_icdx_id'];
            $model->save();
        }
    }
    
    public function actionUpdatePerawatan($id)
    {
        $model = $this->findModel($id);
        if(isset($_POST['riwayat_perawatan_pil'])){
            $tanggal = date('Y-m-d', strtotime($_POST['anamnesa-riwayat_perawatan_waktu']));
            $model->riwayat_perawatan_pil = $_POST['riwayat_perawatan_pil'];
            $model->riwayat_perawatan_waktu = $tanggal;
            $model->riwayat_perawatan_tempat = $_POST['riwayat_perawatan_tempat'];
            $model->riwayat_perawatan_nil = $_POST['anamnesa-riwayat_perawatan_nil'];
            $model->riwayat_perawatan_lama = $_POST['anamnesa-riwayat_perawatan_lama'];
            $model->save();
        }
    }

    public function actionUpdatePengobatan($id)
    {
        $model = $this->findModel($id);


        //print_r($_POST['RiwayatPengobatan']['nama_obat']);
        //echo count($_POST);
        if (isset($_POST)) {
            $nama_obat = $_POST['RiwayatPengobatan']['nama_obat'];
            $frekuensi = $_POST['RiwayatPengobatan']['frekuensi'];
            $lama_pengobatan = $_POST['RiwayatPengobatan']['lama_pengobatan'];
            $lama_pengobatan_waktu = $_POST['RiwayatPengobatan']['lama_pengobatan_waktu'];

            $deletePengobatan = RiwayatPengobatan::deleteAll(['anamnesa_id' => $id]);

            $model->riwayat_pengobatan_pil = '1';
            $model->save();

            for($i = 0; $i < count($nama_obat); $i++){
                $m_riwayatPengobatan = new RiwayatPengobatan();
                $m_riwayatPengobatan->anamnesa_id = $id;
                $m_riwayatPengobatan->nama_obat = $nama_obat[$i];
                $m_riwayatPengobatan->frekuensi = $frekuensi[$i];
                $m_riwayatPengobatan->lama_pengobatan = $lama_pengobatan[$i];
                $m_riwayatPengobatan->lama_pengobatan_waktu = $lama_pengobatan_waktu[$i];
                $m_riwayatPengobatan->save();
            }

        }
    }



    public function actionPopupRiwayat($id)
    {
        $model = new Icdx();
        $modelAnamnesa = Anamnesa::findOne($id);
        return $this->renderAjax('_riwayatDetail', [
            'model' => $model,
            'modelAnamnesa' => $modelAnamnesa,
        ]);
    }

    public function actionPopupRiwayatPerawatan($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('riwayatPerawatan', [
            'model' => $model,
        ]);
    }

    public function actionPopupRiwayatPengobatan($id)
    {
        $model = Anamnesa::findOne($id);
        $modelPengobatan = RiwayatPengobatan::findAll(['anamnesa_id' => $id]);
        return $this->renderAjax('riwayatPengobatan',[
           'model' => $model,
           'modelPengobatan' => $modelPengobatan,
        ]);
    }

    public function actionPopupRiwayatKeluarga($id)
    {
        $model = Anamnesa::findOne($id);
        return $this->renderAjax('riwayatKeluarga',[
           'model' => $model
        ]);
    }



    public function actionIcdxList($search = null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select(['id', 'concat(kode,"||",inggris) as text'])
                ->from('icdx')
                ->where('concat(kode,"||",inggris,"||",indonesia) LIKE "%' . $search . '%"')
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

    public function actionTypeAheadKode($q = null)
    {
        $query = new Query;
        $query->select(['id','kode','inggris'])
            ->from('icdx')
            ->where('kode LIKE "%' . $q . '%"')
            ->orderBy('kode');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out = [];
        foreach ($data as $d) {
            $out[] = ['value' => $d['kode'], 'nama' => $d['inggris'], 'id' => $d['id']];
        }
        echo Json::encode($out);
    }
    
    public function actionTypeAheadName($q = null)
    {
        $query = new Query;
        $query->select(['id','kode','inggris'])
            ->from('icdx')
            ->where('concat(inggris,"||",indonesia) LIKE "%' . $q . '%"')
            ->orderBy('kode');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out = [];
        foreach ($data as $d) {
            $out[] = ['value' => $d['inggris'], 'kode' => $d['kode'], 'id' => $d['id']];
        }
        echo Json::encode($out);
    }
}
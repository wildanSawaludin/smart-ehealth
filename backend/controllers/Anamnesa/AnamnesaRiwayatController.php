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
use yii\db\Query;
use yii\helpers\Json;

class AnamnesaRiwayatController extends AnamnesaController {


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['param'])){
            $model->riwayat_penyakit_pil = $_POST['param'];
            $model->save();
        }
    }

    public function actionPopupRiwayat()
    {
        $model = new Icdx();
        return $this->renderAjax('_riwayatDetail', [
            'model' => $model,
        ]);
    }

    public function actionPopupRiwayatPerawatan()
    {
        $model = new Anamnesa();
        return $this->renderAjax('riwayatPerawatan', [
            'model' => $model,
        ]);
    }

    public function actionIcdxList($search = null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select(['id', 'concat(kode,"||",inggris) as text'])
                ->from('icdx')
                ->where('concat(kode,"||",inggris) LIKE "%' . $search . '%"')
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

    public function actionTypeAhead($q = null)
    {
        $query = new Query;
        $query->select(['id', 'concat(kode,"||",inggris) as text'])
            ->from('icdx')
            ->where('concat(kode,"||",inggris) LIKE "%' . $q . '%"')
            ->orderBy('kode');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out = [];
        foreach ($data as $d) {
            $out[] = ['value' => $d['kode']];
        }
        echo Json::encode($out);
    }
}
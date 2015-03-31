<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 30/03/15
 * Time: 17:01
 */

namespace backend\controllers\Anamnesa;


use Yii;

class FaktorResikoController extends AnamnesaController{
    public function actionUpdateFaktorResiko($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->post('Anamnesa')){
            $post = Yii::$app->request->post('Anamnesa');
            $faktor_resiko_1 = ($post['faktor_resiko_riwayat_1'] != null ) ? implode(',', $post['faktor_resiko_riwayat_1']) : 'null';
            $faktor_resiko_2 = ($post['faktor_resiko_riwayat_2'] != null ) ? implode(',', $post['faktor_resiko_riwayat_2']) : 'null';
            $faktor_kebiasaan_1 = ($post['faktor_resiko_kebiasaan_1'] != null ) ? implode(',', $post['faktor_resiko_kebiasaan_1']) : 'null';
            $faktor_kebiasaan_2 = ($post['faktor_resiko_kebiasaan_2'] != null ) ? implode(',', $post['faktor_resiko_kebiasaan_2']) : 'null';

            $model->faktor_resiko_riwayat = $faktor_resiko_1.','.$faktor_resiko_2;
            $model->faktor_resiko_kebiasaan = $faktor_kebiasaan_1.','.$faktor_kebiasaan_2;
            $model->save();
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 30/03/15
 * Time: 21:05
 */

namespace backend\controllers\Anamnesa;


use Yii;

class StatusPsikososialController extends AnamnesaController{
    public function actionUpdatePsikososial($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->post('Anamnesa')){
            $post = Yii::$app->request->post('Anamnesa');

            $psikososial_tingber_1 = ($post['psikososial_tingber_1'] != null ) ? implode(',', $post['psikososial_tingber_1']) : 'null';
            $psikososial_tingber_2 = ($post['psikososial_tingber_2'] != null ) ? implode(',', $post['psikososial_tingber_2']) : 'null';

            $model->psikososial_hubkel_pil = $post['psikososial_hubkel_pil'];
            $model->psikososial_hubkel = $post['psikososial_hubkel'];
            $model->psikososial_temting_pil = $post['psikososial_temting_pil'];
            $model->psikososial_temting = $post['psikososial_temting'];
            $model->psikososial_tingber_pil = $post['psikososial_tingber_pil'];
            $model->psikososial_tingber = $psikososial_tingber_1.','.$psikososial_tingber_2;
            $model->save();
        }
    }
}
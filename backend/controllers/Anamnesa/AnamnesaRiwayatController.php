<?php

namespace backend\controllers\Anamnesa;
/**
 * Description of AnamnesaRiwayatController
 *
 * @author Rio
 */
use backend\controllers\Anamnesa;

class AnamnesaRiwayatController extends Anamnesa {
    
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if(isset(filter_input(INPUT_POST, 'param'))){
            $model->riwayat_penyakit_pil = filter_input(INPUT_POST, 'param');
            $model->save();
        }
    }
}

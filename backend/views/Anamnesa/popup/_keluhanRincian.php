<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
//use kartik\tabs\TabsX;
use backend\models\Lookup;

?>

  <?php $form = ActiveForm::begin([
                    'id' => 'keluhanDetail-form',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'type' => ActiveForm::TYPE_HORIZONTAL,
                    'formConfig' => [
                        'deviceSize' => ActiveForm::SIZE_SMALL,
                        'labelSpan' => 1,
                        'showLabels'=>false
                        
                    ]
                    ]); 
        ?>
            
            <div class="tab-content">
                 <div class="tab-pane fade in active" id="rinci">    
                            <?php 
                            $keluh = str_replace("_"," ",$_GET['param']);
                            $rinci = Lookup::items($keluh,'keluhan_rincian');
//                            var_dump($rinci[1],$rinci[2],$rinci[3]);
//                            exit();
                            ?>
                                 
                            <?= $form->field($model, 'faktor_resiko_kebiasaan')->radioList($rinci); ?>
                 </div>       
            </div>
        <?php ActiveForm::end(); ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>


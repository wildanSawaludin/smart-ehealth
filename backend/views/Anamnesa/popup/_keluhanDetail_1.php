<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\tabs\TabsX;
use backend\models\Lookup;



?>
<div class="modal-content" style="width: 750px;margin-left: 400px;margin-top: 100px">
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
<!--	<h4><?php // echo $model->getAttributeLabel($_GET['title']); ?></h4>-->
</div>

<div class="modal-body">
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
</div>
<div class="modal-footer">
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>

</div>


    <?php
    $items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Rincian',
        'content'=>$form,
        'active'=>true
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
        'content'=>'test3',
        'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/anamnesa/rincian',['id'=>'2']])]
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Dropdown',
        'items'=>[
             [
                 'label'=>'<i class="glyphicon glyphicon-chevron-right"></i> Option 1',
                 'encode'=>false,
                 'content'=>'test4',
             ],
             [
                 'label'=>'<i class="glyphicon glyphicon-chevron-right"></i> Option 2',
                 'encode'=>false,
                 'content'=>'content4',
             ],
        ],
    ],
];
    
    echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false
]);
    ?>
    
     
    </div>            


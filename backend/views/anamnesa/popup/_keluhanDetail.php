<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;



?>
<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h4><?php echo $model->getAttributeLabel($_GET['title']); ?></h4>
</div>

<div class="modal-body">
    <div class="anamnesa-form">

        <?php $form = ActiveForm::begin([
                    'id' => 'kelumDetail-form', 
                    'type' => ActiveForm::TYPE_HORIZONTAL,
                    'formConfig' => ['labelSpan' => 1, 'spanSize' => ActiveForm::SIZE_SMALL,'showLabels'=>false]
                    ]); 
        ?>
            <ul class="nav nav-tabs" id="tabs-cnt" style="padding-top:0px;margin-bottom: 10px">
                <li class="active"><a href="#rinci" data-toggle="tab">Rincian </a></li>
                <li ><a href="#lks" data-toggle="tab">Lokasi</a></li>
                <li ><a href="#anter" data-toggle="tab">Anamnesa Terpimpin</a></li>

            </ul>
            <div class="tab-content">
                 <div class="tab-pane fade in active" id="rinci">    

                            <?= $form->field($model, 'faktor_resiko_kebiasaan')->checkboxList(Lookup::items('Sakit')); ?>
                 </div>       
            </div>

    </div>
</div>
<div class="modal-footer">
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
    </div>

</div>

            


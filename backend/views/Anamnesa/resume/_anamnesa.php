<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
            <div class="content-wrapper" style="min-height: 858px;">
                <div class="col-sm-4" style="margin-top:43px;">
                

                    <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-5 control-label">Keluhan Utama</label>
                        <div class="col-sm-1">
                          <p class="form-control-static"></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label">Anamnesas Terpimpin</label>
                        <div class="col-sm-1">
                          <p class="form-control-static"></p>
                        </div>
                      </div>
                    </form>
                </div>
                <div id="anamnesa-keluhan" class="col-sm-8">
                  
                </div>
            </div>

<?php

$this->registerJs("$(document).ready(function () {

   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : 'id=".$modelAnamnesa->id."&".\yii::$app->request->csrfParam."=". \yii::$app->request->csrfToken."' ,
        url  : '".\yii\helpers\Url::to(['/Anamnesa/anamnesa/update','id'=>$modelAnamnesa->id])."',
            success  : function(response) {
              $('#anamnesa-keluhan').html(response);
    }
    });

    });");
?>





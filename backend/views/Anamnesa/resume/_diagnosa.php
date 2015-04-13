<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
            <div class="content-wrapper" style="min-height: 858px;">
                <div class="col-sm-4" style="margin-top:43px;">
                

                    <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-5 control-label">Diagnosa Utama</label>
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
                <div id="anamnesa-diagnosa" class="col-sm-10">
                  
                </div>
            </div>

<?php

$this->registerJs("$(document).ready(function () {

   $.ajax({
        type     :'POST',
        cache    : false,
        dataType : 'json',
        data    : 'id=".$modelDiagnosa->id."&".\yii::$app->request->csrfParam."=". \yii::$app->request->csrfToken."' ,
        url  : '".\yii\helpers\Url::to(['/diagnosa/update?id=1'])."',
            success  : function(response) {
              $('#anamnesa-diagnosa').html(response);
    }
    });

    });");
?>





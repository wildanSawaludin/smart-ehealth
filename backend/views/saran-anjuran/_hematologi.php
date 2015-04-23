<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 25/03/15
 * Time: 20:19
 */

use kartik\tabs\TabsX;
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\bootstrap\Modal;
use yii\helpers\Url;

?>

<div class="modal-content" style="width: 750px;margin-left: 260px;margin-top: 100px">
    <div class="modal-header">
        Laboratorium
        <a class="close" data-dismiss="modal">&times;</a>
    </div>
    <?php
    $items = [
        [
            'label'=>'Lengkap',
            'id' => 'tab-lengkap',
            'content' => '',
            'linkOptions'=>['data-enable-cache'=>false,'data-url'=>Url::to(['/saran-anjuran/hematologi-lengkap?id='.$_GET['id']])],
        ],
        [
            'label'=>'Anemia',
            'id' => 'tab-anemia',
            'content' => 'Anemia'
        ],
        [
            'label'=>'Faal Hemostasis',
            'id' => 'tab-faal-hemostasis',
            'content' => 'Faal Hemostasis',
        ],
        [
            'label'=>'Hematologi Lain',
            'id' => 'tab-hematologi-lain',
            'content' => 'Hematologi Lain'
        ]
    ];

    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_ABOVE,
        'sideways'=>true,
        'encodeLabels'=>false,
        'id'=>'tabs-hematoologi-form',
        'pluginOptions' =>  ['enableCache'=>false],
    ]);
    ?>
    <div class="modal-body">

    </div>
</div>
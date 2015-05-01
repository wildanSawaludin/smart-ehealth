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
                'label'=>'Kelompok pemeriksaan',
                'id' => 'tab-kelompok-pemeriksaan',
                'content' => '',
                'linkOptions'=>['data-enable-cache'=>false,'data-url'=>Url::to(['/saran-anjuran/laboratorium?id='.$_GET['id']])],
            ],
            [
                'label'=>'Tujuan Pemeriksaan',
                'id' => 'tab-tujuan-pemeriksaan',
                'content' => '',
                'linkOptions'=>['data-enable-cache'=>false,'data-url'=>Url::to(['/saran-anjuran/tujuan-pemeriksaan?id='.$_GET['id']])],
            ],
            [
                'label'=>'Masalah Klinis',
                'id' => 'tab-masalah-klinis',
                'content' => '',
                'linkOptions'=>['data-enable-cache'=>false,'data-url'=>Url::to(['/saran-anjuran/masalah-klinis?id='.$_GET['id']])],
            ]
        ];

        echo TabsX::widget([
            'items'=>$items,
            'position'=>TabsX::POS_ABOVE,
            'sideways'=>true,
            'encodeLabels'=>false,
            'id'=>'tabs-laboratorium-form',
            'pluginOptions' =>  ['enableCache'=>false],
        ]);
    ?>
    <div class="modal-body">

    </div>
</div>
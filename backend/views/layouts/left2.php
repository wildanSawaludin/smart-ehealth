<?php

use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
use common\components;
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
                    <a href="<?= $directoryAsset ?>/#">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <?php
            $callback = function($menu) {
                                    $data = eval($menu['data']);
                        
                                    return [
                                        'label' => '<i class="fa fa-circle-o"></i> '.$menu['name'],
                                        'url' => $menu['route'],
                        //                'options' => $data
                        //                'items' => $menu['children']
                                    ];
                                };


            $callback2 = function($menu) {
                                    $data = eval($menu['data']);
                        
                                    return
                                        [
                                            'label'=> $menu['name'],
                                            'icon'=>'<i class="fa fa-user"></i>',
                                            'url'=> $menu['route'],
                                        ];
                                };

            $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, 1, $callback);
            $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, 1, $callback2);
        ?>

        <!--
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#" class="navbar-link">
                    <i class="fa fa-dashboard"></i>
                    <span class="text-info">RBAC</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <?php
                    
                    echo Nav::widget(
                        [
                            'encodeLabels' => false,
                            'options' => ['class' => 'treeview-menu'],
                            'items' => $items,
                        ]
                    );
                    ?>
            </li>                    
        </ul>
        -->
        <?= \common\components\MenuWidget::widget([
                'options'=>['class'=>'sidebar-menu'],
                'labelTemplate' => '<a href="#">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                'submenuTemplate'=>"\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                'activateParents'=>true,
                'items'=>[
                    [
                        'label'=>'Gii',
                        'icon'=>'<i class="fa fa-cogs"></i>',
                        'url'=>['/gii'],
                        
                    ],
                    [
                        'label'=>'User',
                        'icon'=>'<i class="fa fa-user"></i>',
                        'url'=>['/user/index'],
                        
                    ],
                ]
                + $items
            ]) ?>
    </section>
</aside>
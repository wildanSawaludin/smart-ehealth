<?php

use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
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
                    <a href="">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>
        <!--
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
        -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#" class="navbar-link">
                    <i class="fa fa-user-plus"></i>
                    <span class="text-info">Registrasi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
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

                    $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, 2, $callback);
                    
                    echo Nav::widget(
                        [
                            'encodeLabels' => false,
                            'options' => ['class' => 'treeview-menu'],
                            'items' => $items,
                        ]
                    );
                    ?>
            </li>
            
            <li class="treeview">
                <a href="#" class="navbar-link">
                    <i class="fa fa-child"></i>
                    <span class="text-info">Pasien</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
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

                    $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, 1, $callback);
                    
                    echo Nav::widget(
                        [
                            'encodeLabels' => false,
                            'options' => ['class' => 'treeview-menu'],
                            'items' => $items,
                        ]
                    );
                    ?>
            </li>

            <li class="treeview">
                <a href="#" class="navbar-link">
                    <i class="fa fa-users"></i>
                    <span class="text-info">User Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
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

                    $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, 1, $callback);
                    
                    echo Nav::widget(
                        [
                            'encodeLabels' => false,
                            'options' => ['class' => 'treeview-menu'],
                            'items' => [
                                [
                                    'label' => '<i class="fa fa-circle-o"></i>  Tambah User',
                                    'url' => 'user/admin/create'
                                ],
                                [
                                    'label' => '<i class="fa fa-circle-o"></i>  Setting User',
                                    'url' => 'user/admin/index'
                                ]
                            ],
                        ]
                    );
                    ?>
            </li>

            <li class="treeview">
                <a href="#" class="navbar-link">
                    <i class="fa fa-dashboard"></i>
                    <span class="text-info">RBAC</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
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

                    $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, 1, $callback);
                    
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
    </section>
</aside>
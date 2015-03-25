<?php

use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
?>
<aside class="left-side sidebar-offcanvas">

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
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>

        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#" class="navbar-link">
                    <i class="fa fa-dashboard"></i> <span class="text-info">RBAC</span>
                </a>
            </li>
        </ul>

        <?php
        $callback = function($menu) {
            $data = eval($menu['data']);
            return [
                'label' => '<span class="fa fa-angle-right"></span>' . $menu['name'],
                'url' => $menu['route'],
//                'options' => $data
//                'items' => $menu['children']
            ];
        };

        $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, 1, $callback);
        
        echo Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => $items,
            ]
        );
        ?>

    </section>

</aside>

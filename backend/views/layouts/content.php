<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
?>

<div class="content-wrapper" style="min-height: 858px;">
    <section class="content-header">
        
        <?php
        
            $flag = isset($GLOBALS['page_title']);
            $page_title = $flag ? $GLOBALS['page_title'] : '<h1></h1>';
            echo $page_title;

        ?>

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>

</div>

<footer class="main-footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'wrapper-black',
        ['content' => $content]
    );
} else {
    dmstr\web\AdminLteAsset::register($this);
    backend\assets\AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower/admin-lte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" sizes="57x57" href="<?= Yii::getAlias('@web') ?>/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= Yii::getAlias('@web') ?>/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= Yii::getAlias('@web') ?>/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= Yii::getAlias('@web') ?>/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= Yii::getAlias('@web') ?>/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= Yii::getAlias('@web') ?>/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= Yii::getAlias('@web') ?>/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= Yii::getAlias('@web') ?>/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= Yii::getAlias('@web') ?>/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= Yii::getAlias('@web') ?>/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= Yii::getAlias('@web') ?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= Yii::getAlias('@web') ?>/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::getAlias('@web') ?>/favicon-16x16.png">
        <link rel="manifest" href="<?= Yii::getAlias('@web') ?>/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= Yii::getAlias('@web') ?>/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue">
        <div class="wrapper">

            <?php $this->beginBody() ?>
            
                   

           

            <?= $this->render(
                    'content.php',
                    ['content' => $content, 'directoryAsset' => $directoryAsset]
                )
            ?>

          

        

            <?php $this->endBody() ?>
        </div>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>

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
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue sidebar-collapse">
        <div class="wrapper">

            <?php $this->beginBody() ?>
            
            <?= $this->render(
                    'header.php',
                    ['directoryAsset' => $directoryAsset]
                ) 
            ?>

            <?= $this->render(
                    'left.php',
                    ['directoryAsset' => $directoryAsset]
                )
            ?>

            <div class="content-wrapper" style="min-height: 858px;">
                <div class="col-sm-4" style="margin-top:43px;">
                    <ul class="nav nav-tabs nav-justified">
                      <li role="presentation" class="active"><a href="#">Anamnesa</a></li>
                      <li role="presentation"><a href="#">Pemeriksaan Fisik</a></li>
                      <li role="presentation"><a href="#">Preview</a></li>
                    </ul>

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
                <div class="col-sm-8">
                    <?= $this->render(
                            'content.php',
                            ['content' => $content, 'directoryAsset' => $directoryAsset]
                        )
                    ?>
                </div>
            </div>

            <footer class="main-footer">
                <div class="container">
                    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                    <p class="pull-right"><?= Yii::powered() ?></p>
                </div>
            </footer>

            <?php $this->endBody() ?>
        </div>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>

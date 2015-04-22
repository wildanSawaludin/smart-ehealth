<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'registrasi/index',
    'components' => [
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//        ],
        'request' => [
            'class' => 'common\components\Request',
            'web' => '/frontend/web'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '
//                    @webroot/themes/material-default'
//                ],
//                'baseUrl' => '@web/themes/material-default'
//            ],
//        ],
    ],
    'modules' => [/*
        'user' => [
            'as frontend' => 'dektrium\user\filters\FrontendFilter',
        ],*/
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'rbac/*', // add or remove allowed actions to this list
            'site/*',
            'user/*',
            'site/error',
            'debug/*',
        ]
    ],
    'params' => $params,
];
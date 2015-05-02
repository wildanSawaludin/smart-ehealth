<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=103.27.206.187;dbname=smart_ehealth_db',
            'username' => 'developer',
           'password' => 'dev123',
      //    'dsn' => 'mysql:host=127.0.0.1;dbname=smart_ehealth_db',
      //    'username' => 'root',
      //    'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'dottorota.dev@gmail.com',
                'password' => 'developer123',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'helper' => [
            'class' => 'backend\components\Helper',
            'enableCsrfValidation' => true,
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to
        // use your own export download action or custom translation
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
        ]
    ]
];

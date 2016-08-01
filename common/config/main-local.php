<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=simplexi.mysql.ukraine.com.ua;dbname=simplexi_fractal',
            'username' => 'simplexi_fractal',
            'password' => 'pkvd72up',
            'charset' => 'utf8',
            'tablePrefix' => 'simp_',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];

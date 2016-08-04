<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'runtimePath' => __DIR__ . '/../../runtime',
    'aliases' => [
        '@web-root' => '@app/../web',
        '@css' => '@web-root/src/css',
        '@js' => '@web-root/src/js',
        '@web-src' => '@web-root/src',
        '@web-libs' => '@web-root/src/libs',
        '@web-widgets' => '@web-root/src/widgets',       
        
        '@web-root-url' => '/web',
        '@css-url' => '@web-root-url/src/css',
        '@js-url' => '@web-root-url/src/js',
        '@web-src-url' => '@web-root-url/src',
        '@web-libs-url' => '@web-root-url/src/libs',
        '@web-widgets-url' => '@web-root-url/src/widgets',
    ],
    'modules' => [
        'comment' => [
            'class' => 'app\modules\comment\CommentModule',
        ],
        'markdown' => [
            // the module class
            'class' => 'kartik\markdown\Module',
            
            
            // whether to use PHP SmartyPantsTypographer to process Markdown output
            'smartyPants' => TRUE,
        ]
        /* other modules */
    ],
    'components' => [
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'uVDLMeZAeNzfDJuVmz8VclhdtBqBfQRF',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => TRUE,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => TRUE,
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
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => TRUE,
            'showScriptName' => FALSE,
            'rules' => [
                'category/<categoryAlias:[\w_\/-]+>' => 'category',
            ],
        ],
    
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;

<?php

$params = require(__DIR__ . '/params.php');
$config = [
    'id' => 'basic',
    'basePath' => __DIR__ . '/../src-back',
    'bootstrap' => ['log'],
    'runtimePath' => __DIR__ . '/../runtime',
    'vendorPath' => __DIR__ . "/../vendor",
    'aliases' => [
        '@web-root' => '@app/../src-web',
        '@css' => '@web-root/css',
        '@js' => '@web-root/js',
        '@web-libs' => '@web-root/libs',
        '@web-widgets' => '@web-root/widgets',
        
        '@web-root-url' => '/src-web',
        '@web-root-url/123' => '/src-web/123',
        '@css-url' => '@web-root-url/css',
        '@js-url' => '@web-root-url/js',
        '@web-libs-url' => '@web-root-url/libs',
        '@web-widgets-url' => '@web-root-url/widgets',
    ],
    'modules' => [
        'comment' => [
            'class' => 'app\modules\comment\CommentModule',
        ],
        'attributes' => [
            'class' => 'app\modules\attributes\AttributesModule',
        ],
        'todo' => [
            'class' => 'app\modules\todo\Module',
        ],
        'articles' => [
            'class' => 'app\modules\articles\ArticlesModule',
        
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

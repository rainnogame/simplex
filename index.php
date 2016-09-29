<?php

// comment out the following two lines when deployed to production

defined('YII_DEBUG') or define('YII_DEBUG', TRUE);
defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_ENV_DB') or define('YII_ENV_DB', 'local');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/src-back/Yii.php');

Yii::$classMap['app\Application'] = __DIR__ . '/src-back/Application.php';

$config = require(__DIR__ . '/config/web.php');


(new app\Application($config))->run();


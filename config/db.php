<?php
if (YII_ENV_DB == 'local') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=simplexi_simple;',
        'username' => 'simplexi_simple',
        'password' => 'Zahrebelnyi1993',
        'charset' => 'utf8',
        'tablePrefix' => 'simp_',
    ];
} else {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=simplexi.mysql.ukraine.com.ua;dbname=simplexi_simp;',
        'username' => 'simplexi_simple',
        'password' => 'Zahrebelnyi1993',
        'charset' => 'utf8',
        'tablePrefix' => 'simp_',
    ];
}


//return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=127.0.0.1;dbname=simplexi_simp',
//    'username' => 'root',
//    'password' => 'Zahrebelnyi1993',
//    'charset' => 'utf8',
//    'tablePrefix' => 'simp_',
//];

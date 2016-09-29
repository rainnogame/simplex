<?php


namespace app\assets;


use yii\web\AssetBundle;

class TodoAssets extends AssetBundle
{
    
    public $basePath = '@web-root/modules/todo';
    public $baseUrl = '@web-root-url/modules/todo';
    public $css = [
    ];
    public $jsOptions = ['type' => 'text/babel'];
    public $js = [
        'main.js',
    ];
}
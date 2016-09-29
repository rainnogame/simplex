<?php


namespace app\assets;


use yii\web\AssetBundle;
use yii\web\View;

class RequireJsAsset extends AssetBundle
{
    public $basePath = '@web-libs';
    public $baseUrl = '@web-libs-url';
    public $css = [
    ];
    public $jsOptions = ['position' => View::POS_HEAD,'data-main'=>'/src-web/modules/todo/app.js'];
    public $js = [
        'require.js',
    ];
}
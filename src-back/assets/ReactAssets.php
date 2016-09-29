<?php


namespace app\assets;


use yii\web\AssetBundle;
use yii\web\View;

class ReactAssets extends AssetBundle
{
    public $basePath = '@web-libs';
    public $baseUrl = '@web-libs-url';
    public $css = [
    ];
    public $jsOptions = ['position' => View::POS_HEAD];
    public $js = [
        'react-15.3.2/build/react.js',
        'react-15.3.2/build/react-dom.js',
        '//unpkg.com/babel-core@5.8.38/browser.min.js',
        'remarkable.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
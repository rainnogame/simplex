<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;


/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since  2.0
 */
class HomeAsset extends AssetBundle
{
    public $basePath = '@web-root';
    public $baseUrl = '@web-root-url';
    public $css = [
        'css/home.css',
    ];
    public $js = [
        'js/home.js',
    ];
}

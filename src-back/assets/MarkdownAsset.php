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
class MarkdownAsset extends AssetBundle
{
    public $basePath = '@web-libs/highlight';
    public $baseUrl = '@web-libs-url/highlight';
    public $css = [
        'default.min.css',
        'github-gist.min.css',
    ];
    public $js = [
        'highlight.pack.js',
        'main.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}

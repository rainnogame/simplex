<?
namespace app\assets;

use yii\web\AssetBundle;

class SiteMainAsset extends AssetBundle
{
    public $basePath = '@web-src';
    public $baseUrl = '@web-src-url';
    public $depends = [
        'dmstr\web\AdminLteAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\HomeAsset',
    ];
}
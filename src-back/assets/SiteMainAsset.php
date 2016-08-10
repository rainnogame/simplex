<?
namespace app\assets;

use yii\web\AssetBundle;

class SiteMainAsset extends AssetBundle
{
    public $basePath = '@web-root';
    public $baseUrl = '@web-root-url';
    public $depends = [
        'dmstr\web\AdminLteAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\HomeAsset',
    ];
}
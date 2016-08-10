<?
namespace app\modules\articles;

use yii\base\Module;

/**
 *
 */
class ArticlesModule extends Module
{
    public function init()
    {
        parent::init();
       
        \Yii::configure($this, require(__DIR__ . '/config.php'));

    }
}
<?
namespace app\modules\articles\widgets\articleList;

use yii\base\Widget;

class ArticlesList extends Widget
{
    const EXTENDED = 1;
    public $articles;
    public $type;
    
    public function run()
    {
        return $this->render('index', ['articles' => $this->articles, 'type' => $this->type]);
    }
    
    
}
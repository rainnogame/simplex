<?
namespace app\widgets\articleList;

use yii\base\Widget;

class ArticleList extends Widget
{
    public $articles;
    
    public function run()
    {
        return $this->render('_list', ['articles' => $this->articles]);
    }
    
    
}
<?
namespace app\modules\articles\widgets\singleArticle;

use yii\base\Widget;

/**
 *
 */
class SingleArticle extends Widget
{
    public $article;
    
    /**
     * Executes the widget.
     *
     * @return string the result of widget execution to be outputted.
     */
    public function run()
    {
        return $this->render('index', ['article' => $this->article]);
    }
    
    
}
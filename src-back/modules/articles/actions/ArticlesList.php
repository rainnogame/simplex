<?
namespace app\modules\articles\actions;

use app\modules\articles\models\ArticleCategoryRecord;
use app\modules\articles\models\ArticleRecord;
use Yii;
use yii\base\Action;


/**
 *
 */
class ArticlesList extends Action
{
    /**
     * @param        $categoryAlias
     *
     * @param string $article_id
     *
     * @return mixed
     * @internal param $id
     */
    public function run($categoryAlias, $article_id = '')
    {
        /** @var ArticleCategoryRecord $category */
        $category = ArticleCategoryRecord::getCategoryByAlias($categoryAlias);
        
        
        Yii::$app->view->params['currentCategory'] = $category;
        
        
        if ($article_id) {
            /** @var ArticleRecord $article */
            $article = ArticleRecord::getArticleById($article_id);
            
            
            return $this->controller->render('article', [
                'article' => $article,
            ]);
        }
        
        $articles = $category->articles;
        
        return $this->controller->render('index', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }
}
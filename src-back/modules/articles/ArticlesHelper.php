<?
namespace app\modules\articles;

use app\modules\articles\models\ArticleRecord;

/**
 *
 */
class ArticlesHelper
{
    
    /**
     * @param ArticleRecord[] $articles
     * @param                 $articleTypeAlias
     *
     * @return array
     *
     */
    public static function filterByType($articles, $articleTypeAlias)
    {
        return array_filter($articles, function ($article) use ($articleTypeAlias) {
            return $article->type->alias == $articleTypeAlias;
        });
    }
}
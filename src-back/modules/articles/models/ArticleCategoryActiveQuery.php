<?

namespace app\modules\articles\models;

use yii\db\ActiveQuery;

class ArticleCategoryActiveQuery extends ActiveQuery
{
    public function withArticlesCount()
    {
        return $this->joinWith('articles')->addSelect('COUNT(*) AS articlesCount')->groupBy('t.id');
    }
    
}
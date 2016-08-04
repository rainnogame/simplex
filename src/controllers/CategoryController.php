<?


namespace app\controllers;


use app\models\ArticleCategoryRecord;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex($categoryAlias)
    {
        \Yii::beginProfile('outer', 'beginning');

        $category = ArticleCategoryRecord::findByAlias($categoryAlias);
        $articles = $category->articles;

        \Yii::endProfile('outer', 'ending');
        return $this->render('index', [
            'articles' => $articles,
            'category' => $category,
        ]);
    }


}
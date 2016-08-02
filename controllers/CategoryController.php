<?


namespace app\controllers;


use app\models\ArticleCategoryRecord;
use app\models\ArticleRecord;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex($category)
    {

        \Yii::beginProfile('outer', 'beginning');

        $category = ArticleCategoryRecord::findByAlias($category);
        $articles = $category->articles;

        \Yii::endProfile('outer', 'ending');
        return $this->render('index', [
            'articles' => $articles
        ]);
    } 
    
   
}
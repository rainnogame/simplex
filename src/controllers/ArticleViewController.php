<?


namespace app\controllers;


use app\models\ArticleRecord;
use yii\web\Controller;

class ArticleViewController extends Controller
{
    public function actionIndex()
    {


        $articleId = \Yii::$app->request->get('article_id');
        \Yii::info('article id = ' . $articleId);
        $article = ArticleRecord::findOne($articleId);

        return $this->render('index', [
            'article' => $article
        ]);
    }


}
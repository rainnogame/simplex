<?
namespace app\modules\articles\actions;

use app\modules\articles\models\ArticleRecord;
use Yii;
use yii\base\Action;


/**
 *
 */
class UpdateArticle extends Action
{
    /**
     * @param $id
     *
     * @return mixed
     */
    public function run($id)
    {
        $model =ArticleRecord::getArticleById($id);
        Yii::$app->view->params['currentCategory'] = $model->category;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->controller->redirect(['/category' . $model->category->alias, 'article_id' => $model->id]);
        } else {
           
            return $this->controller->render('updateArticle', [
                'model' => $model,
            ]);
        }
    }
}
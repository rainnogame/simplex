<?
namespace app\modules\articles\actions;

use app\modules\articles\models\ArticleCategoryRecord;
use Yii;
use yii\base\Action;


/**
 *
 */
class UpdateCategory extends Action
{
    /**
     * @param $id
     *
     * @return mixed
     */
    public function run($id)
    {
        
        $model = ArticleCategoryRecord::getCategoryById($id);
        Yii::$app->view->params['currentCategory'] = $model;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->controller->redirect(['/category' . $model->alias]);
        } else {
            return $this->controller->render('updateCategory', [
                'model' => $model,
            ]);
        }
    }
}
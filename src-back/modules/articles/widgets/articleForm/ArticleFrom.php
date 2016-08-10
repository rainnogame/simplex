<?

namespace app\modules\articles\widgets\articleForm;

use yii\base\Widget;

/**
 *
 */
class ArticleFrom extends Widget
{
    
    const CREATE = 1;
    const FILTER = 2;
    public $model;
    public $type;
    
    public function run()
    {
        return $this->render('index', ['model' => $this->model, 'type' => $this->type]);
    }
}
<?

namespace app\modules\articles\widgets\categoryForm;

use yii\base\Widget;

/**
 *
 */
class CategoryForm extends Widget
{
    public $model;
    
    public function run()
    {
      
        return $this->render('index', ['model' => $this->model]);
    }
    
    
}
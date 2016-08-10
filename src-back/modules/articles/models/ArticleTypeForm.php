<?

namespace app\modules\articles\models;


use yii\base\Model;

class ArticleTypeForm extends Model
{

    public $type_id;

    public function rules()
    {
        return [
            [['type_id'], 'safe'],
        ];
    }
}
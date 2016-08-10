<?
namespace app\controllers;


use app\modules\articles\actions\ArticlesList;
use Yii;
use yii\web\Controller;

/**
 *
 */
class CategoryController extends Controller
{
    /**
     * Declares external actions for the controller.
     * This method is meant to be overwritten to declare external actions for the controller.
     * It should return an array, with array keys being action IDs, and array values the corresponding
     * action class names or action configuration arrays. For example,
     *
     * ```php
     * return [
     *     'action1' => 'app\components\Action1',
     *     'action2' => [
     *         'class' => 'app\components\Action2',
     *         'property1' => 'value1',
     *         'property2' => 'value2',
     *     ],
     * ];
     * ```
     *
     * [[\Yii::createObject()]] will be used later to create the requested action
     * using the configuration provided here.
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => ArticlesList::className(),
            ],
        ];
    }
    
 
    
    
}
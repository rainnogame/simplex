<?
namespace app\modules\comment\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {

        return $this->render('index', compact(''));
    }

}
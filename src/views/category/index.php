<?
use app\models\ArticleCategoryRecord;
use app\models\ArticleRecord;
use app\widgets\articleList\ArticleList;
use yii\helpers\Html;
use yii\web\View;

/** @var ArticleCategoryRecord $category */
/** @var View $this */
/** @var ArticleRecord $articles */
?>

<? $this->title = "{$category->name} [ {$category->alias} ]"; ?>
    <div>
        <?= Html::a('Создать статью', ['/article/create', 'category_id' => $category->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Создать категорию', ['/article-category/create', 'root_category_alias' => $category->alias], ['class' => 'btn btn-primary']) ?>
    </div>

<?= ArticleList::widget([
    'articles' => $articles,
]) ?>
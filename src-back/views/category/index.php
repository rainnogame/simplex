<?

use app\modules\articles\ArticlesHelper;
use app\modules\articles\widgets\articleList\ArticlesList;
use yii\helpers\Html;
use yii\web\View;

/** @var ArticleCategoryRecord $category */
/** @var View $this */
?>

<? $this->title = "{$category->name} [ {$category->alias} ]"; ?>
<div>
    <?= Html::a('Создать статью', ['/article/create', 'category_id' => $category->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Создать категорию', ['/article-category/create', 'parent_id' => $category->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Редактировать категорию', ['/articles/update-category', 'id' => $category->id], ['class' => 'btn btn-warning']) ?>
    <?= Html::a('Удалить категорию', ['/article-category/delete', 'id' => $category->id], ['class' => 'btn btn-danger']) ?>
</div>
<?
$articlesDefault = ArticlesHelper::filterByType($articles, 'article');
$articlesLinks = ArticlesHelper::filterByType($articles, 'link');

?>

<? if ($articlesDefault): ?>
    <div>Статьи</div>
    <?= ArticlesList::widget([
        'articles' => $articlesDefault,
    ]) ?>

<? endif; ?>
<? if ($articlesLinks): ?>
    <div>Ссылки</div>
    <?= ArticlesList::widget([
        'articles' => $articlesLinks,
    ]) ?>

<? endif; ?>

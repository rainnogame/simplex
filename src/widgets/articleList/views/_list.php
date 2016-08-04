<?
use app\models\ArticleRecord;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;


/** @var View $this */
$this->registerCssFile('@web-widgets-url/articleList/main.css');

?>
<ol class="rectangle-list">
    <? /** @var ArticleRecord $articles */ ?>
    <? foreach ($articles as $article) : ?>
        <li><?= Html::a($article->name, Url::toRoute(['/article-view', 'article_id' => $article->id])) ?></li>
    <? endforeach; ?>
</ol>

<?
/** @var ArticleRecord $articles */
use app\models\ArticleRecord;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<? foreach ($articles as $article) : ?>
    <?= Html::a($article->name, Url::toRoute(['/article-view', 'article_id' => $article->id])) ?>
    <br>
<? endforeach; ?>

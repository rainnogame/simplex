<?
use app\modules\articles\widgets\articleForm\ArticleFrom;
use app\modules\articles\widgets\articleList\ArticlesList;

?>
<?= ArticleFrom::widget([
    'model' => $articleSearch,
    'type' => ArticleFrom::FILTER,
]); ?>
<?= ArticlesList::widget([
    'articles' => $articles,
    'type' => ArticlesList::EXTENDED,
]) ?>
<?= $pager ?>

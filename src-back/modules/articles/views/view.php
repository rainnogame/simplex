<?
use kartik\markdown\Markdown;
use yii\helpers\Html;

?>
<?= Html::a('Обновить', ['/article/update', 'id' => $article->id], ['class' => 'btn btn-warning']) ?>
<?= Html::a('Удалить', ['/article/delete', 'id' => $article->id], ['class' => 'btn btn-danger']) ?>
<div class="article-content">
    <?= Markdown::convert($article->content) ?>
</div>
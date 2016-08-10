<?
use kartik\markdown\Markdown;

?>
<div class="article-content">
    <?= Markdown::convert($article->content) ?>
</div>
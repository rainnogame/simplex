<?

use app\modules\articles\models\ArticleRecord;
use app\modules\articles\widgets\articleList\ArticlesList;
use yii\helpers\Html;
use yii\web\View;


/** @var View $this */
$this->registerCssFile('@web-widgets-url/articleList/main.css');

?>
<div class="articles-content">
    <table class="table table-striped articles-list">
        <?
        /** @var ArticleRecord[] $articles */
        foreach ($articles as $article): ?>
            <tr>
                <? if ($type == ArticlesList::EXTENDED): ?>
                    <td
                        class="article-type"><?= "[{$article->type->name}]" ?></td>
                <? endif; ?>
                <td
                    class="article-link"><?= $this->render('articleTypes/' . $article->type->alias, ['article' => $article]) ?></td>
                <td class="actions">
                    <?= Html::a('Удалить', ['/article/delete', 'id' => $article->id], ['class' => 'btn btn-danger']) ?>
                    <?= Html::a('Изменить', ['/article/update', 'id' => $article->id], ['class' => 'btn btn-warning']) ?>
                
                </td>
            </tr>
        
        <? endforeach; ?>
    </table>
</div>
<?
/**
 *
 */

use app\modules\articles\models\ArticleRecord;
use yii\helpers\Html;

/** @var ArticleRecord $article */
?>

<?= Html::a($article->name, ['/category' . $article->category->alias, 'article_id' => $article->id]) ?>


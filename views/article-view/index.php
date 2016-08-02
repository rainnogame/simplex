<?
/** @var ArticleRecord $article */
use app\assets\MarkdownAsset;
use app\models\ArticleRecord;
use kartik\markdown\Markdown;
use yii\helpers\Html;

MarkdownAsset::register($this);

$this->title = $article->name;
?>
<?= Html::a('Update', ['/article/update', 'id' => $article->id], ['class' => 'btn btn-primary']) ?>
<br>
<?= Markdown::convert($article->content) ?>


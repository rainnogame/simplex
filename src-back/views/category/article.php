<?
/** @var ArticleRecord $article */
use app\assets\MarkdownAsset;
use app\modules\articles\widgets\singleArticle\SingleArticle;
use yii\helpers\Html;

//
//echo '<pre>';
//print_r(BaseYii::$aliases);
//echo '</pre>';
//die;
MarkdownAsset::register($this);

$this->title = $article->name;
?>
<?= Html::a('Update', ['/articles/update-article', 'id' => $article->id], ['class' => 'btn btn-primary']) ?>
<?= SingleArticle::widget([
    'article' => $article,
]) ?>

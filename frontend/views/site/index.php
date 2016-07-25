<?

/* @var \common\models\article\ArticleCategoryRecord $category */
?>

<? $this->title = $category ? $category->name : 'SIMPLEX' ?>
<?
if ($category) {
    $this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => ['index', 'categoryId' => $category->id]];
}

?>
<div class="site-index">
    <h1><?= $this->title ?></h1>

    <?
    /** @var \common\models\article\ArticleCategoryRecord[] $subcategories */
    /** @var \common\models\article\ArticleRecord[] $articles */
    ?>
    <? if ($subcategories): ?>
        <h3>Категории:</h3>
        <? foreach ($subcategories as $category): ?>
            <div>
                <?= \yii\helpers\Html::a($category->name, ['/site/index/', 'categoryId' => $category->id]); ?>
            </div>
        <? endforeach; ?>
    <? endif; ?>
    <? if ($articles): ?>
        <hr>
        <h3>Статьи:</h3>
        <? foreach ($articles as $article): ?>
            <div>
                <?= \yii\helpers\Html::a($article->name, ['/article/view/', 'id' => $article->id]); ?>
            </div>
        <? endforeach; ?>
    <? endif; ?>

</div>

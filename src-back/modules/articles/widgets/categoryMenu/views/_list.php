<?
$currentCategoryId = isset(Yii::$app->view->params['currentCategory']) ? Yii::$app->view->params['currentCategory']->id : NULL;

?>
<ul class="collapse in category-list <?= $root ? 'root-category-list' : '' ?>">
    <? if ($parentItem): ?>
        <li class='category-list-item'>
            <div class="item-button"><a href="/category<?= $parentItem['alias'] ?>">
                    ..[<?= $parentItem['name'] ?>] (<?= $parentItem['articlesCount'] ?>)</a></div>
        </li>
    <? endif; ?>
    
    <? if ($currentItem && $currentItem['alias'] != '/'): ?>
        <li class='category-list-item'>
            <div class="item-button"><a href="/category<?= $currentItem['alias'] ?>">
                    .[<?= $currentItem['name'] ?>] (<?= $currentItem['articlesCount'] ?>)</a></div>
        </li>
    <? endif; ?>
    <? if ($root): ?>
        <div class="item-button toggle-all toggle-hide">
            Свернуть/развернуть все
        </div>
    <? endif; ?>
    <? foreach ($items as $item): ?>
        <li class='category-list-item'>
            
            <div
                class="item-button <?= $currentCategoryId == $item['id'] ? 'active' : ''; ?> <?= $item['items'] ? 'has-items' : '' ?>">
                <a href="/category<?= $item['alias'] ?>">
                    <?= $item['name'] ?> (<?= $item['articlesCount'] ?>)</a>
            
            </div>
            <? if ($item['items']): ?>
                <div class="item-button item-button-collapse">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            
            <? endif; ?>
            
            <div class="clearfix"></div>
            
            <? if ($item['items']): ?>
                <?= $this->render('_list', ['items' => $item['items'], 'currentItem' => [], 'parentItem' => [], 'root' => FALSE,]) ?>
            <? endif; ?>
        </li>
    <? endforeach; ?>
</ul>
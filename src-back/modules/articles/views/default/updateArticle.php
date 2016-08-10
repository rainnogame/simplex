<?php

use app\modules\articles\models\ArticleRecord;
use app\modules\articles\widgets\articleForm\ArticleFrom;
use yii\helpers\Html;

/* @var $this yii\web\View */
/** @var ArticleRecord $model */

$this->title = 'Update Article Record: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Article Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
    <div class="article-record-update">
        
        <h1><?= Html::encode($this->title) ?></h1>
        <?= ArticleFrom::widget(['model' => $model]) ?>
    
    </div>
<?

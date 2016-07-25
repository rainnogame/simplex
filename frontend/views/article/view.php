<?php

use kartik\markdown\Markdown;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\article\ArticleRecord */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="article-content"><?= Markdown::convert($model->content); ?></div>

</div>

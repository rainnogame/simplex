<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\article\ArticleRecord */

$this->title = 'Update Article Record: ' . $model->slug;
$this->params['breadcrumbs'][] = ['label' => 'Article Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slug, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

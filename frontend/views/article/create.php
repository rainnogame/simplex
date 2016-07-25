<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\article\ArticleRecord */

$this->title = 'Create Article Record';
$this->params['breadcrumbs'][] = ['label' => 'Article Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

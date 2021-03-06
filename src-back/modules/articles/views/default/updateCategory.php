<?php

use app\modules\articles\widgets\categoryForm\CategoryForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleCategoryRecord */

$this->title = 'Update Article Category Record: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Article Category Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-category-record-update">
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?= CategoryForm::widget(['model' => $model])  ?>

</div>

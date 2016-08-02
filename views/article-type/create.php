<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArticleTypeRecord */

$this->title = 'Create Article Type Record';
$this->params['breadcrumbs'][] = ['label' => 'Article Type Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-type-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

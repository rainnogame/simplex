<?php

use app\models\ArticleCategoryRecord;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleCategoryRecord */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$model->getBaseCategory()

?>
<div class="article-category-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $categoryMap = ArticleCategoryRecord::generateCategoryMapForDropDownWithAliases(); ?>

    <?= $form->field($model->baseCategory ? $model->baseCategory : new ArticleCategoryRecord(), 'alias')->dropDownList($categoryMap, [
        'class' => 'form-control chose-base-category',
        'prompt' => '-- Нет --',
    ])->label('Родительская категория') ?>

    <?= $form->field($model, 'alias')->textInput([
        'maxlength' => true,
        'class' => 'form-control category-alias',
    ]) ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

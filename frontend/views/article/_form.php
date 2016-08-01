<?php

use common\models\article\ArticleCategoryRecord;
use common\models\article\ArticleTagRecord;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\markdown\MarkdownEditor;

/* @var $this yii\web\View */
/* @var $model common\models\article\ArticleRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categories_ids')->widget(Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map(ArticleCategoryRecord::find()->all(), 'id', 'name'),
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'Выберите категории для статьи...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>

    <?= $form->field($model, 'tags_ids')->widget(Select2::className(), [
        'name' => 'color_3',
        'value' => ['red', 'green'], // initial value
        'data' => \yii\helpers\ArrayHelper::map(ArticleTagRecord::find()->all(), 'id', 'name'),
        'maintainOrder' => true,
        'toggleAllSettings' => [
            'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
            'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
            'selectOptions' => ['class' => 'text-success'],
            'unselectOptions' => ['class' => 'text-danger'],
        ],
        'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10,
        ],
    ]) ?>

    <?= $form->field($model, 'content')->widget(MarkdownEditor::className(), [
        'model' => $model,
        'attribute' => 'content',
        'height' => '400px',
    ]) ?>



    <?php ActiveForm::end(); ?>

</div>

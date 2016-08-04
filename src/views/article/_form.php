<?php

use app\models\ArticleCategoryRecord;
use app\models\ArticleTypeRecord;
use kartik\file\FileInput;
use kartik\markdown\MarkdownEditor;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-record-form">
    
    
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => TRUE]]); ?>
    <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(ArticleTypeRecord::find()->all(), 'id', 'name'), [
    
    ]); ?>
    <?= Html::a('123', ['', 'article_type_id' => ''], ['style' => 'display: none', 'class' => 'pjax-select-link']) ?>
    <? if ($model->type->alias == 'article'): ?>
        <?= $form->field($model, 'content')->widget(MarkdownEditor::class) ?>
        
        <?
        echo FileInput::widget([
            'model' => new UploadedFile(),
            'name' => 'UploadFileForm[file]',
            'language' => 'ru',
            'options' => ['multiple' => TRUE],
            'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/article/file-upload']),],
        ]);
        ?>
    <? elseif ($model->type->alias == 'link'): ?>
        <?= $form->field($model, 'content')->textInput()->label('Значение ссылки') ?>
    <? endif; ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>
    
    <?
    $allCategories = ArrayHelper::map(ArticleCategoryRecord::find()->all(), 'id', 'name');
    
    $categoryMap = ArticleCategoryRecord::generateCategoryMapForDropDown();
    
    ?>
    <?=
    $form->field($model, 'category_id')->widget(Select2::className(), [
        'data' => $categoryMap,
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => FALSE,
        ],
    ]); ?>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>


</div>

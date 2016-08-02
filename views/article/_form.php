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


    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(ArticleTypeRecord::find()->all(), 'id', 'name'), [
        'onchange' => 'console.log(123)'
    ]); ?>

    <?= $form->field($model, 'content')->widget(MarkdownEditor::class) ?>

    <?
    echo FileInput::widget([
        'model' => new UploadedFile(),
        'name' => 'UploadFileForm[file]',
        'language' => 'ru',
        'options' => ['multiple' => true],
        'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/article/file-upload']),]
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?
    $allCategories = ArrayHelper::map(ArticleCategoryRecord::find()->all(), 'id', 'name');

    $categoryMap = ArticleCategoryRecord::generateCategoryMapForDropDown();

    ?>
    <?=
    $form->field($model, 'category_id')->widget(Select2::className(), [
        'data' => $categoryMap,
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>

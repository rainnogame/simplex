<?php

use app\models\ArticleCategoryRecord;
use app\models\ArticleTypeRecord;
use app\modules\attributes\models\ArticleAttributeRecord;
use kartik\range\RangeInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleRecord */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="article-record-form">
    
    <?php $form = ActiveForm::begin([
        'id' => 'create-article-from',
        'enableAjaxValidation' => FALSE,
        'action' => '/article/create',
    ]); ?>
    
    <?= $field = $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>
    
    <?
    /** @var ArticleAttributeRecord[] $allAttributes */
    $allAttributes = ArticleAttributeRecord::find()->all();
    
    ?>
    <? foreach ($allAttributes as $attribute): ?>
        <?= $form->field($model, 'attrValuesArray[' . $attribute->id . '][value]')->widget(RangeInput::className(), [
            'options' => ['placeholder' => $attribute->name . ' (0 - 10)...'],
            'html5Options' => ['min' => 0, 'max' => 10],
            'addon' => ['append' => ['content' => '<i class="glyphicon glyphicon-star"></i>']],
        ])->label($attribute->name); ?>
    <? endforeach; ?>
    
    <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(ArticleTypeRecord::find()->all(), 'id', 'name'), [
    ]); ?>
    <?= Html::a('', ['', 'article_type_id' => ''], ['style' => 'display: none', 'class' => 'pjax-select-link']) ?>
    <?= $this->render('articleFormTypes/' . $model->type->alias, ['model' => $model, 'form' => $form]) ?>
    
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


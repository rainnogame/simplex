<?php


use app\modules\articles\models\ArticleCategoryRecord;
use app\modules\articles\models\ArticleTypeRecord;
use app\modules\articles\widgets\articleForm\ArticleFrom;
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
<?
$allCategories = ArrayHelper::map(ArticleCategoryRecord::find()->all(), 'id', 'name');

$categoryMap = ArticleCategoryRecord::generateCategoryMapForDropDown();
?>
<? if ($type == ArticleFrom::CREATE): ?>


    <div class="article-record-form">

        <?php $form = ActiveForm::begin([
            'id' => 'create-article-from',

        ]); ?>
        <?


        ?>
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

<? endif; ?>
<? if ($type == ArticleFrom::FILTER): ?>
    <?php $form = ActiveForm::begin([
        'id' => 'create-article-from',
        'action' => '/site/index',
        'method' => 'get',
    ]); ?>
    <?= $field = $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>
    <?= $form->field($model, 'type_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(ArticleTypeRecord::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]); ?>
    <?=
    $form->field($model, 'categories')->widget(Select2::className(), [
        'data' => $categoryMap,
        'options' => ['placeholder' => 'Select a state ...', 'multiple' => TRUE],
        'pluginOptions' => [
            'allowClear' => TRUE,
            'tags' => TRUE,

        ],
    ]);


    ?>
    <div class="form-group">
        <?= Html::submitButton('Фильтровать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<? endif; ?>

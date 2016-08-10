<?

use app\models\ArticleCategoryRecord;


use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleCategoryRecord */
/* @var $form yii\widgets\ActiveForm */
?>
<?
$model->getBaseCategory()

?>
<div class="article-category-record-form">

    <?

    ?>
    <? $form = ActiveForm::begin([
        'action' => '/article-category/create',
    ]); ?>

    <? $categoryMap = ArticleCategoryRecord::generateCategoryMapForDropDown(); ?>
    <? /** @var string $rootCategoryAlias */ ?>


    <?= $form->field($model, 'parent_id')->widget(Select2::className(), [
        'data' => $categoryMap,
        'options' => ['placeholder' => '-- no --', 'class' => 'chose-base-category'],

        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ]);
    ?>

    <?=
    Html::input('text', NULL, $model->parent->alias, [
        'maxlength' => TRUE,
        'class' => 'form-control chose-base-category-display',
        'disabled' => TRUE,
    ]);
    ?>


    <?= $form->field($model, 'subAlias')->textInput([
        'maxlength' => TRUE,
        'class' => 'form-control category-alias',
    ]) ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <? ActiveForm::end(); ?>

</div>

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
    
    <? $form = ActiveForm::begin(); ?>
    
    <? $categoryMap = ArticleCategoryRecord::generateCategoryMapForDropDownWithAliases(); ?>
    <? /** @var string $rootCategoryAlias */ ?>
    <?= $form->field(
        $model->baseCategory ?
            $model->baseCategory :
            new ArticleCategoryRecord(['alias' => $rootCategoryAlias,]), 'alias'
    )->widget(Select2::className(), [
        'data' => $categoryMap,
        'options' => ['placeholder' => '-- no --', 'class' => 'chose-base-category'],
        
        'pluginOptions' => [
            'allowClear' => TRUE,
        ],
    ])->label('Родительская категория') ?>
    
    <?= $form->field($model, 'alias')->textInput([
        'maxlength' => TRUE,
        'class' => 'form-control category-alias',
    ]) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <? ActiveForm::end(); ?>

</div>

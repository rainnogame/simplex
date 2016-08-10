<?
use app\models\ArticleRecord;
use kartik\file\FileInput;
use kartik\markdown\MarkdownEditor;
use yii\helpers\Url;
use yii\web\UploadedFile;


/** @var ArticleRecord $model */
?>
<?= $form->field($model, 'content')->widget(MarkdownEditor::class) ?>
<a class="btn btn-primary" role="button" data-toggle="collapse" href=".image-uploader" aria-expanded="false"
   aria-controls="collapseExample">
    Добавить картинки
</a>

<div class="image-uploader collapse">
    <?
    echo FileInput::widget([
        'model' => new UploadedFile(),
        'name' => 'UploadFileForm[file]',
        'language' => 'ru',
        'options' => ['image-uploader', 'multiple' => TRUE],
        'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/article/file-upload']),],
    ]);
    ?>
</div>
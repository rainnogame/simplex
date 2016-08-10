<?php
use app\controllers\ArticlesController;

use app\modules\articles\models\ArticleCategoryRecord;
use app\modules\articles\models\ArticleRecord;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
    
    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
    
    <nav class="navbar navbar-static-top" role="navigation">
        
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        <div class="navbar-custom-menu">
            
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" data-toggle="modal" data-target="#create-category">
                        <i class="fa fa-folder-o"></i>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#create-article">
                        <i class="fa fa-file-text"></i>
                    </a>
                </li>
            
            
            </ul>
        </div>
    </nav>
</header>
<!-- Modal -->
<div id="create-article" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Добавить новую статью</h4>
            </div>
            <div class="modal-body">
<!--                --><?//
//                $currentCategoryItem = isset(Yii::$app->view->params['currentCategory']) ? Yii::$app->view->params['currentCategory'] : [];
//                if ($currentCategoryItem) {
//                    $categoryId = $currentCategoryItem['id'];
//                } else {
//                    $categoryId = ArticleCategoryRecord::ROOT_CATEGORY_ID;
//                }
//
//
//                $model = new ArticleRecord();
//                $model->type_id = ArticleController::DEFAULT_ARTICLE_TYPE_ID;
//                $model->category_id = $categoryId;
//                ?>
                <!--                --><? //= $this->render('/article/_form', ['model' => $model]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    
    </div>

</div>
<!-- Modal -->
<div id="create-category" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Добавить новую Категорию</h4>
            </div>
            <div class="modal-body">
<!--                --><?//
//                $currentCategoryItem = isset(Yii::$app->view->params['currentCategory']) ? Yii::$app->view->params['currentCategory'] : [];
//                if ($currentCategoryItem) {
//                    $categoryId = $currentCategoryItem['id'];
//                } else {
//                    $categoryId = ArticleCategoryRecord::ROOT_CATEGORY_ID;
//                }
//
//                $model = new ArticleCategoryRecord();
//                $model->parent_id = $categoryId;
//                ?>
                <!--                --><? //= $this->render('/article-category/_form', ['model' => $model]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    
    </div>

</div>
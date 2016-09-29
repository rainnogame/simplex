<?

use app\modules\articles\models\ArticleCategoryRecord;
use app\modules\articles\widgets\categoryMenu\CategoryMenu;
use app\modules\articles\widgets\categoryMenu\CategoryMenuHelper;


?>
<aside class="main-sidebar">
    
    <section class="sidebar">
        
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=
                
                
                $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        
        
        <div class="sidebar-header" data-target="#main-menu">Меню сайта</div>
        <div id="main-menu" class="side-menu collapse">
            <?= dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Задачи', 'icon' => 'fa fa-pencil', 'url' => ['/task/tasks']],
                        ['label' => 'Добавить статью', 'icon' => 'fa fa-file-code-o', 'url' => ['/article/create']],
                        ['label' => 'Добавить категорию', 'icon' => 'fa fa-dashboard', 'url' => ['/article-category/create']],
                    ],
                ]
            ) ?>
        </div>
        
        <div class="sidebar-header" data-target="#main-category-all-menu">Все категории</div>
        
        <div id="main-category-all-menu" class="side-menu collapse in">
            <?
            $categories = ArticleCategoryRecord::getAllCategories();
            $categoryTree = CategoryMenuHelper::createCategoryTree($categories);
            
            ?>
            <?= CategoryMenu::widget([
                    'items' => $categoryTree,
                    'currentItem' => [],
                    'parentItem' => [],
                ]
            ); ?>
        
        </div>
    </section>

</aside>

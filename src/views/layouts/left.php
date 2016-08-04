<?

use app\models\ArticleCategoryRecord;
use app\widgets\CategoryMenu;

?>
<aside class="main-sidebar">
    
    <section class="sidebar">
        
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
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
        
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Меню сайта', 'options' => ['class' => 'header']],
                    ['label' => 'Панель дебага', 'icon' => 'fa fa-file-code-o', 'url' => ['/debug/default/view']],
                    ['label' => 'Gii генератор', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Добавить статью', 'icon' => 'fa fa-file-code-o', 'url' => ['/article/create']],
                    ['label' => 'Добавить категорию', 'icon' => 'fa fa-dashboard', 'url' => ['/article-category/create']],
                    ['label' => 'Категории', 'options' => ['class' => 'header']],
                ],
            ]
        ) ?>
        
        <?= CategoryMenu::widget([
                'categoryTree' => ArticleCategoryRecord::getCategoryTree(),
            ]
        
        ); ?>
    
    </section>

</aside>

<?php
use app\models\ArticleCategoryRecord;

?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
                    <a href="<?= $directoryAsset ?>/#">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                        class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>

        <?
        $pathInfo = Yii::$app->request->pathInfo;
        $currentPath = substr($pathInfo, strpos($pathInfo, '/'), strlen($pathInfo) - strpos($pathInfo, '/'));

        ?>

        <ul class="sidebar-menu">
            <? foreach (ArticleCategoryRecord::findRootCategories() as $rootCategory): ?>
                <?
                $subCategories = ArticleCategoryRecord::findRootCategories($rootCategory->alias);
                ?>
                <li class="<?= $subCategories ? 'treeview' : '' ?> <?= $currentPath == $rootCategory->alias || strpos($currentPath, $rootCategory->alias) !== false ? 'active' : '' ?>">
                    <a href="<?= '/category' . $rootCategory->alias ?>">

                        <i class="fa fa-bar-chart-o"></i>
                        <span><?= $rootCategory->name ?></span>
                        <? if ($subCategories): ?>
                            <i class="fa fa-angle-left pull-right"></i>
                        <? endif; ?>

                    </a>

                    <? if ($subCategories): ?>
                        <ul class="treeview-menu"
                            style="<?= strpos($currentPath, $rootCategory->alias) !== false ? 'display: block' : '' ?>">
                            <? foreach ($subCategories as $subCategory): ?>
                                <?
                                $subCategories2 = ArticleCategoryRecord::findRootCategories($subCategory->alias);
                                ?>
                                <li class="<?= $subCategories2 ? 'treeview' : '' ?> <?= $currentPath == $subCategory->alias || strpos($currentPath, $subCategory->alias) !== false ? 'active' : '' ?>">
                                    <a href="<?= '/category' . $subCategory->alias ?>">

                                        <i class="fa fa-bar-chart-o"></i>
                                        <span><?= $subCategory->name ?></span>
                                        <? if ($subCategories2): ?>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        <? endif; ?>
                                    </a>
                                    <? if ($subCategories2): ?>
                                        <ul class="treeview-menu"
                                            style="<?= strpos($currentPath, $subCategory->alias) !== false ? 'display: block' : '' ?>">
                                            <? foreach ($subCategories2 as $subCategory2): ?>
                                                <li class="<?= $currentPath == $subCategory2->alias || strpos($currentPath, $subCategory2->alias) !== false ? 'active ' : '' ?>">
                                                    <a href="<?= '/category' . $subCategory2->alias ?>">

                                                        <i class="fa fa-bar-chart-o"></i>
                                                        <span><?= $subCategory2->name ?></span>
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </a>

                                                </li>
                                            <? endforeach; ?>
                                        </ul>

                                    <? endif; ?>
                                </li>
                            <? endforeach; ?>
                        </ul>

                    <? endif; ?>
                </li>
            <? endforeach; ?>
        </ul>
        <ul class="sidebar-menu">
            <li>
                <a href="<?= '/article/create' ?>">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Создать статью</span>
                </a>
            </li>
            <li>
                <a href="<?= '/article-category/create' ?>">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Создать категорию</span>
                </a>
            </li>
            <li>
                <a href="<?= '/debug/default/view?Log%5Blevel%5D=4&Log%5Bcategory%5D=application&Log%5Bmessage%5D=&panel=log&tag=57a000e1e07d2' ?>">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Логи</span>
                </a>
            </li>
            <li>
                <a href="<?= '/debug/default/view?panel=profiling&tag=57a00c984b14a' ?>">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Профилирование</span>
                </a>
            </li>
            <li>
                <a href="<?= '/assets/cc3c6607/admin-lte/index.html' ?>">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Разные ресурсы</span>
                </a>
            </li>


        </ul>


    </section>

</aside>

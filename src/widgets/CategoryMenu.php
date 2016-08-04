<?
namespace app\widgets;

use yii\base\Widget;

class CategoryMenu extends Widget
{

    /*
     Array (
            [0] => Array (
                    [name] => PHP
                    [alias] => /php
                    [articlesCount] => 5
                    [items] => Array (
                            [0] => Array (
                                    [name] => Yii
                                    [alias] => /php/yii
                                    [articlesCount] => 12
                                    [items] => Array
                                        (
                                            [0] => Array
                                                (
                                                   [name] => Полезные советы
                                                    [alias] => /php/yii/advices
                                                )

                                            [1] => Array
                                                (
                                                   [name] => Рендеринг
                                                    [alias] => /php/yii/render
                                                )
                                            ...

            [1] => Array (
                    ...
     */

    /** @var  array $categoryTree category tree in array form */
    public $categoryTree;

    public function run()
    {

        return $this->generateMenuByCategoriesTree($this->categoryTree);

    }

    function generateMenuByCategoriesTree($categoriesTree)
    {
        $html = '';

        $html .= '<ul class="category-list">';

        foreach ($categoriesTree as $treeItem) {
            $html .= "<li class='category-list-item'>";
            $html .= "<a href='" . '/category' . $treeItem['alias'] . "'>{$treeItem['name']} ({$treeItem['articlesCount']})</a>";
            if (isset($treeItem['items'])) {
                $html .= $this->generateMenuByCategoriesTree($treeItem['items']);
            }
            $html .= '</li>';
        }

        $html .= '</ul>';
        return $html;

    }
}
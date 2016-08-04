<?
namespace app\helpers;

class MenuHelper
{
    public static function generateMenuByCategoriesTree($categoriesTree)
    {
        $categoriesMenu = [];

        foreach ($categoriesTree as $treeItem) {

            $menuItem = ['label' => $treeItem['name'], 'icon' => 'fa fa-circle-o', 'url' => ['/category' . $treeItem['alias']],];
            if (isset($treeItem['items'])) {
                $menuItem['items'] = self::generateMenuByCategoriesTree($treeItem['items']);
            }

            $categoriesMenu[] = $menuItem;
        }

        return $categoriesMenu;


    }
}
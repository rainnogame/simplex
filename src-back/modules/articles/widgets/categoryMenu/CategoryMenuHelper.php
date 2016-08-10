<?

namespace app\modules\articles\widgets\categoryMenu;


use app\modules\articles\models\ArticleCategoryRecord;

/**
 *
 */
class CategoryMenuHelper
{
    /**
     * @param ArticleCategoryRecord[] $categories
     * @param int                     $rootId
     *
     * @return array
     */
    public static function createCategoryTree(array &$categories, $rootId = ArticleCategoryRecord::ROOT_CATEGORY_ID)
    {
        
        $result = [];
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $rootId) {
                $categoryItem = $category->toArray();
                unset($categories[$key]);
                $categoryItem['items'] = self::createCategoryTree($categories, $category->id);
                $result[] = $categoryItem;
            }
        }
        return $result;
    }
}
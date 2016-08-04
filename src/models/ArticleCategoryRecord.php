<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "simp_article_category".
 *
 * @property integer $id
 * @property string  $alias
 * @property string  $name
 * @property mixed   articles
 * @property int     articlesCount
 */
class ArticleCategoryRecord extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simp_article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['alias', 'name'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'name' => 'Name',
        ];
    }

    public static function generateCategoryMapForDropDown()
    {
        $categoryMap = [];

        $rootCategories = static::findSubcategories();
        foreach ($rootCategories as $category) {
            $categoryMap[$category->name] = ArrayHelper::map(static::findSubcategories($category->alias, true), 'id', 'name');
        }
        return $categoryMap;
    }

    /**
     * @param string $rootAlias
     * @param bool   $includeSub
     *
     * @return ArticleCategoryRecord[]
     */
    public static function findSubcategories($rootAlias = '', $includeSub = false)
    {
        if ($includeSub) {
            return static::find()->where(['LIKE', 'alias', $rootAlias . '%', false])->all();
        } else {
            return static::find()->where(['REGEXP', 'alias', '^' . $rootAlias . '/[0-9A-z-]*$'])->all();
        }

    }

    /**
     * @param $categoryAlias
     *
     * @return ArticleCategoryRecord
     */
    public static function findByAlias($categoryAlias)
    {
        if ($categoryAlias[0] !== '/') {
            $categoryAlias = '/' . $categoryAlias;
        }
        return static::findOne(['alias' => $categoryAlias]);
    }

    public static function generateCategoryMapForDropDownWithAliases()
    {
        $categoryMap = [];

        $rootCategories = static::findSubcategories();
        foreach ($rootCategories as $category) {
            $categoryMap[$category->name] = ArrayHelper::map(static::findSubcategories($category->alias, true), 'alias', 'name');
        }
        return $categoryMap;
    }

    public static function getCategoryTree($baseCategoryAlias = '')
    {
        $categoriesTree = [];

        $categories = self::findSubcategories($baseCategoryAlias);
        foreach ($categories as $category) {
            $subcategories = self::getCategoryTree($category->alias);

            $newCategoryTreeItem = [];
            $newCategoryTreeItem['name'] = $category->name;
            $newCategoryTreeItem['alias'] = $category->alias;
            $newCategoryTreeItem['articlesCount'] = $category->articlesCount;
            if ($subcategories) {
                $newCategoryTreeItem['items'] = $subcategories;
            }
            $categoriesTree[] = $newCategoryTreeItem;
        }
        return $categoriesTree;
    }

    public function getArticlesCount()
    {
        return ArticleRecord::find()->where(['category_id' => $this->id])->count();
    }

    public function getArticles()
    {
        return $this->hasMany(ArticleRecord::className(), ['category_id' => 'id']);
    }

    public function getBaseCategory()
    {
        $baseCategoryAlias = substr($this->alias, 0, self::strrpos_string($this->alias, '/'));
        return static::findOne(['alias' => $baseCategoryAlias]);
    }

    public static function strrpos_string($haystack, $needle, $offset = 0)
    {
        if (trim($haystack) != "" && trim($needle) != "" && $offset <= strlen($haystack)) {
            $last_pos = $offset;
            $found = false;
            while (($curr_pos = strpos($haystack, $needle, $last_pos)) !== false) {
                $found = true;
                $last_pos = $curr_pos + 1;
            }
            if ($found) {
                return $last_pos - 1;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

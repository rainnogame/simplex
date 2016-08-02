<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "simp_article_category".
 *
 * @property integer $id
 * @property string $alias
 * @property string $name
 * @property mixed articles
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

    public static function generateCategoryMapForDropDown()
    {
        $categoryMap = [];

        $rootCategories = static::findRootCategories();
        foreach ($rootCategories as $category) {
            $categoryMap[$category->name] = ArrayHelper::map(static::findRootCategories($category->alias, true), 'id', 'name');
        }
        return $categoryMap;
    }


    /**
     * @param string $rootAlias
     * @param bool $includeSub
     * @return ArticleCategoryRecord[]
     */
    public static function findRootCategories($rootAlias = '', $includeSub = false)
    {
        if ($includeSub) {
            return static::find()->where(['LIKE', 'alias', $rootAlias . '%', false])->all();
        } else {
            return static::find()->where(['REGEXP', 'alias', '^' . $rootAlias . '/[0-9A-z-]*$'])->all();
        }

    }

    /**
     * @param $categoryAlias
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

        $rootCategories = static::findRootCategories();
        foreach ($rootCategories as $category) {
            $categoryMap[$category->name] = ArrayHelper::map(static::findRootCategories($category->alias, true), 'alias', 'name');
        }
        return $categoryMap;
    }

    public function getArticles()
    {
        return $this->hasMany(ArticleRecord::className(), ['category_id' => 'id']);
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
}

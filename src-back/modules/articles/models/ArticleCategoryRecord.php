<?php

namespace app\modules\articles\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "simp_article_category".
 *
 * @property integer               $id
 * @property string                $alias
 * @property string                $name
 * @property mixed                 articles
 * @property int                   articlesCount
 * @property ArticleCategoryRecord parent
 * @property mixed                 parent_id
 */
class ArticleCategoryRecord extends ActiveRecord
{
    
    const ROOT_CATEGORY_ID = 1;
    
    public static function generateCategoryMapForDropDown()
    {
        $categoryMap = [];
        
        $rootCategories = static::findSubcategories();
        foreach ($rootCategories as $category) {
            $categoryMap[$category->name] = ArrayHelper::map(static::findSubcategories($category->alias, TRUE), 'id', 'name');
        }
        
        return $categoryMap;
    }
    
    /**
     * @param string $rootAlias
     * @param bool   $includeSub
     *
     * @param bool   $asArray
     *
     * @return ArticleCategoryRecord[]
     */
    public static function findSubcategories($rootAlias = '/', $includeSub = FALSE, $asArray = FALSE)
    {
        if ($includeSub) {
            if ($rootAlias == '/') {
                $query = static::find()->where(['REGEXP', 'alias', '^/[/0-9A-z-]+$']);
            } else {
                $query = static::find()->where(['LIKE', 'alias', $rootAlias . '%', FALSE]);
            }
        } else {
            if ($rootAlias == '/') {
                $query = static::find()->where(['REGEXP', 'alias', '^/[0-9A-z-]+$']);
                
            } else {
                $query = static::find()->where(['REGEXP', 'alias', '^' . $rootAlias . '/[0-9A-z-]+$']);
            }
        }
        if ($asArray) {
            return $query->asArray()->all();
        } else {
            return $query->all();
        }
        
        
    }
    
    /**
     * @return ArticleCategoryActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public static function find()
    {
        return Yii::createObject(ArticleCategoryActiveQuery::className(), [get_called_class()]);
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simp_article_category';
    }
    
    
    /**
     * @param $categoryAlias
     *
     * @return ActiveQuery
     */
    public static function findByAliasQuery($categoryAlias)
    {
        if ($categoryAlias[0] !== '/') {
            $categoryAlias = '/' . $categoryAlias;
        }
        return static::find()->where(['alias' => $categoryAlias]);
    }
    
    public static function generateCategoryMapForDropDownWithAliases()
    {
        $categoryMap = [];
        
        $rootCategories = static::findSubcategories();
        foreach ($rootCategories as $category) {
            $categoryMap[$category->name] = ArrayHelper::map(static::findSubcategories($category->alias, TRUE), 'alias', 'name');
        }
        return $categoryMap;
    }
    
    public static function getCategoryTree($baseCategoryAlias = '/')
    {
        
        $rootCategory = ArticleCategoryRecord::findByAlias($baseCategoryAlias);
        
        
        $categories = self::findSubcategories($baseCategoryAlias, TRUE, FALSE);
        
        $categoriesTree = self::rebaseCategoryTree($categories, $rootCategory->id);
        
        
        return $categoriesTree;
    }
    
    
    public static function strrpos_string($haystack, $needle, $offset = 0)
    {
        if (trim($haystack) != "" && trim($needle) != "" && $offset <= strlen($haystack)) {
            $last_pos = $offset;
            $found = FALSE;
            while (($curr_pos = strpos($haystack, $needle, $last_pos)) !== FALSE) {
                $found = TRUE;
                $last_pos = $curr_pos + 1;
            }
            if ($found) {
                return $last_pos - 1;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    /**
     * @param $categoryAlias
     *
     * @return null|static
     */
    public static function getCategoryByAlias($categoryAlias)
    {
        if ($categoryAlias == '') {
            $categoryAlias = '/';
        }
        if ($categoryAlias[0] !== '/') {
            $categoryAlias = '/' . $categoryAlias;
        }
        return ArticleCategoryRecord::findOne(['alias' => $categoryAlias]);
    }
    
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllCategories()
    {
        return ArticleCategoryRecord::find()->all();
    }
    
    /**
     * @param $id
     *
     * @return ArticleCategoryRecord
     */
    public static function getCategoryById($id)
    {
        return ArticleCategoryRecord::findOne($id);
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['articlesCount'], 'integer'],
            [['alias', 'name', 'subAlias'], 'string', 'max' => 120],
        ];
    }
    
    public function behaviors()
    {
        return [
        
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
    
    public function toArray(array $fields = [], array $expand = [], $recursive = TRUE)
    {
        return array_merge(parent::toArray($fields, $expand, $recursive), ['articlesCount' => $this->articlesCount]);
    }
    
    public function beforeDelete()
    {
        /** @var ArticleRecord[] $articles */
        $articles = $this->articles;
        foreach ($articles as $article) {
            $article->delete();
        }
        
        $subcategories = $this->getSubcategories();
        foreach ($subcategories as $subcategory) {
            $subcategory->delete();
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
    
    /**
     * @param bool $recursively
     *
     * @param bool $asArray
     *
     * @return static[]
     */
    public function getSubcategories($recursively = FALSE, $asArray = FALSE)
    {
        $categories = [];
        
        $subcategories = static::findAll(['parent_id' => $this->id]);
        
        foreach ($subcategories as $subcategory) {
            if ($asArray) {
                $categories[] = $subcategory->toArray();
            } else {
                $categories[] = $subcategory;
            }
            
            if ($recursively) {
                $categories = array_merge($categories, $subcategory->getSubcategories(TRUE));
            }
        }
        
        return $categories;
    }
    
    public function getSubAlias()
    {
        $aliasParts = explode('/', $this->alias);
        return $aliasParts[count($aliasParts) - 1];
    }
    
    public function setSubAlias($value)
    {
        $this->alias = $this->parent->alias . '/' . $value;
    }
    
    /**
     * @return ArticleCategoryRecord
     */
    public function getParent()
    {
        return $this->hasOne(ArticleCategoryRecord::className(), ['id' => 'parent_id']);
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
}

<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "simp_article_category".
 *
 * @property integer $id
 * @property string  $alias
 * @property string  $name
 * @property mixed   articles
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
     * @param bool   $includeSub
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

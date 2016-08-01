<?php

namespace common\models\article;

use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use common\ext\models\SimplexActiveRecord;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "simp_article_category".
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property mixed articles
 * @property mixed subcategories
 */
class ArticleCategoryRecord extends SimplexActiveRecord
{
    public $articlesIds;

//    public static function findRootCategories()
//    {
//        return static::findAll(['parent_id' => null]);
//    }


    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'articlesIds', // Editable attribute name
                        'table' => '{{%article_to_category}}', // Name of the junction table
                        'ownAttribute' => 'article_category_id', // Name of the column in junction table that represents current model
                        'relatedModel' => ArticleRecord::className(), // Related model class
                        'relatedAttribute' => 'article_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ]
        ];
    }

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
            [['slug', 'name'], 'required'],
            [['alias'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 255],
            [['alias'], 'unique'],
            [['articles'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'Name',
        ];
    }

//    /**
//     * @return mixed
//     */
//    public function getSubcategories()
//    {
//        return $this->hasMany(ArticleCategoryRecord::className(), ['parent_id' => 'id']);
//    }


    public function getArticles()
    {
        return $this->hasMany(ArticleRecord::className(), ['id' => 'article_id'])->viaTable('{{%article_to_category}}', ['article_category_id' => 'id']);
    }
}

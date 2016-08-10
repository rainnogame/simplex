<?php

namespace app\modules\articles\models;

use app\modules\attributes\models\ArticleAttributeRecord;
use app\modules\attributes\models\ArticleAttributeValuesRecord;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "simp_article".
 *
 * @property integer               $id
 * @property string                $alias
 * @property string                $name
 * @property string                $content
 * @property integer               $category_id
 * @property integer               $type_id
 * @property ArticleTypeRecord     $type
 * @property ArticleCategoryRecord category
 */
class ArticleRecord extends \yii\db\ActiveRecord
{
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simp_article';
    }
    
    /**
     * @param $article_id
     *
     * @return ArticleRecord
     */
    public static function getArticleById($article_id)
    {
        return ArticleRecord::findOne($article_id);
    }
    
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllArticles()
    {
        return ArticleRecord::find()->all();
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'alias',
            ],
        ];
    }
    
    public function getCategory()
    {
        return $this->hasOne(ArticleCategoryRecord::className(), ['id' => 'category_id']);
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'category_id', 'type_id'], 'required'],
            [['content'], 'string'],
            [['category_id', 'type_id'], 'integer'],
            [['alias', 'name'], 'string', 'max' => 200],
            [['attrValuesArray'], 'safe'],
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
            'content' => 'Content',
            'category_id' => 'Category ID',
            'type_id' => 'Type ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ArticleTypeRecord::className(), ['id' => 'type_id']);
    }
    
    public function getAttrValuesArray()
    {
        /** @var ArticleAttributeValuesRecord[] $attributeValues */
        $attributeValues = $this->hasMany(ArticleAttributeValuesRecord::className(), ['content_id' => 'id'])->all();
        
        $result = [];
        foreach ($attributeValues as $attributeValue) {
            $result[$attributeValue->attribute_id] = $attributeValue->toArray();
        }
        return $result;
    }
    
    public function setAttrValuesArray($value)
    {
        $this->attrValuesArray = $value;
    }
    
    public function getAttrValues($attrId = '')
    {
        return $this->hasMany(ArticleAttributeValuesRecord::className(), ['content_id' => 'id'])->where(['attribute_id' => $attrId]);
    }
    
    public function getSimpleAttributeValue($attributeName)
    {
        $attributeId = ArticleAttributeRecord::findOne(['alias' => $attributeName])->id;
        $attributeValue = ArticleAttributeValuesRecord::findOne(['attribute_id' => $attributeId, 'content_id' => $this->id]);
        return $attributeValue ? $attributeValue->value : '';
    }
    
    public function beforeSave($insert)
    {
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        $attributesValues = $this->attrValuesArray;
        
        foreach ($attributesValues as $key => $valueItem) {
            $value = $valueItem['value'];
            if ($value) {
                /** @var ArticleAttributeValuesRecord $attrValueRecord */
                $attrValueRecord = ArticleAttributeValuesRecord::findOne(['attribute_id' => $key, 'content_id' => $this->id]);
                if ($attrValueRecord) {
                    $attrValueRecord->value = $value;
                } else {
                    $attrValueRecord = new ArticleAttributeValuesRecord();
                    $attrValueRecord->attribute_id = $key;
                    $attrValueRecord->content_id = $this->id;
                    
                    $attrValueRecord->value = $value;
                }
                if (!$attrValueRecord->save()) {
                    echo '<pre>';
                    print_r($attrValueRecord->errors);
                    echo '</pre>';
                }
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
    
}
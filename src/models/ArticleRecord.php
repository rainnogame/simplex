<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "simp_article".
 *
 * @property integer           $id
 * @property string            $alias
 * @property string            $name
 * @property string            $content
 * @property integer           $category_id
 * @property integer           $type_id
 * @property ArticleTypeRecord $type
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
    
    public function getType()
    {
        return $this->hasOne(ArticleTypeRecord::className(), ['id' => 'type_id']);
    }
}

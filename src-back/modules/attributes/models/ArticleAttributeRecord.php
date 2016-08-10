<?php

namespace app\modules\attributes\models;

use Yii;

/**
 * This is the model class for table "simp_article_attribute".
 *
 * @property integer $id
 * @property string  $alias
 * @property string  $name
 * @property integer $type_id
 */
class ArticleAttributeRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simp_article_attribute';
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'type_id'], 'required'],
            [['type_id'], 'integer'],
            [['alias', 'name'], 'string', 'max' => 40],
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
            'type_id' => 'Type ID',
        ];
    }
}

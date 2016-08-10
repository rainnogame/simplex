<?php

namespace app\modules\attributes\models;

use Yii;

/**
 * This is the model class for table "simp_article_attribute_values".
 *
 * @property integer $id
 * @property integer $attribute_id
 * @property string $value

 * @property integer $content_id
 */
class ArticleAttributeValuesRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simp_article_attribute_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attribute_id', 'value', 'content_id'], 'required'],
            [['attribute_id',  'content_id'], 'integer'],
            [['value'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attribute_id' => 'Attribute ID',
            'value' => 'Value',

            'content_id' => 'Content ID',
        ];
    }
}

<?php

namespace app\modules\attributes\models;

use Yii;

/**
 * This is the model class for table "simp_article_attribute_type".
 *
 * @property integer $id
 * @property string $alias
 * @property string $name
 */
class ArticleAttributeTypeRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simp_article_attribute_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name'], 'required'],
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
        ];
    }
}

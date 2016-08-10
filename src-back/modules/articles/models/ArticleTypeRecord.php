<?php

namespace app\modules\articles\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "simp_article_type".
 *
 * @property integer $id
 * @property string $alias
 * @property string $name
 */
class ArticleTypeRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simp_article_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name'], 'required'],
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
        ];
    }
}

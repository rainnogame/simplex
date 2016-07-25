<?php

namespace common\models\article;

use common\ext\models\SimplexActiveRecord;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "simp_article_tag".
 *
 * @property integer $id
 * @property string $name
 */
class ArticleTagRecord extends SimplexActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simp_article_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'name'], 'required'],
            [['slug'], 'string', 'max' => 40],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
        ];
    }
}

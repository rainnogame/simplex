<?php

namespace app\modules\todo\models\task;

use Yii;

/**
 * This is the model class for table "{{%tasks}}".
 *
 * @property integer $id
 * @property string $text
 * @property string $description
 * @property integer $done
 */
class TaskRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tasks}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['done'], 'integer'],
            [['text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'description' => 'Description',
            'done' => 'Done',
        ];
    }

    /**
     * @inheritdoc
     * @return TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskQuery(get_called_class());
    }
}

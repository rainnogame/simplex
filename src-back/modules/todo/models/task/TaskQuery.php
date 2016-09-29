<?php

namespace app\modules\todo\models\task;

/**
 * This is the ActiveQuery class for [[TaskRecord]].
 *
 * @see TaskRecord
 */
class TaskQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TaskRecord[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TaskRecord|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

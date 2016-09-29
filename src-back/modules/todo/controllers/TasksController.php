<?php


namespace app\modules\todo\controllers;


use app\modules\todo\models\task\TaskRecord;
use yii\base\Controller;
use yii\helpers\ArrayHelper;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $tasks = TaskRecord::find()->all();
        $tasksArray = ArrayHelper::toArray($tasks, [
            'id',
            'text',
            'description',
            'done' => function (TaskRecord $tasks) {
                return $tasks->done == '1';
            },
        ]);
        return json_encode($tasksArray);
    }
}
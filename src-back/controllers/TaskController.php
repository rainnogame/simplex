<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 24.09.2016
 * Time: 12:35
 */

namespace app\controllers;


use app\models\task\TaskRacord;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionTasks()
    {
        $tasks = TaskRacord::find()->all();
        return $this->render('tasks', [
            'tasks' => $tasks,
        ]);
    }
}
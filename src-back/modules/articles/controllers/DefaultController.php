<?php

namespace app\modules\articles\controllers;

use app\models\UploadFileForm;
use app\modules\articles\actions\UpdateArticle;
use app\modules\articles\actions\UpdateCategory;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for ArticleRecord model.
 */
class DefaultController extends Controller
{
    
//    const DEFAULT_ARTICLE_TYPE_ID = 1;
//
//    /**
//     * Declares external actions for the controller.
//     * This method is meant to be overwritten to declare external actions for the controller.
//     * It should return an array, with array keys being action IDs, and array values the corresponding
//     * action class names or action configuration arrays. For example,
//     *
//     * ```php
//     * return [
//     *     'action1' => 'app\components\Action1',
//     *     'action2' => [
//     *         'class' => 'app\components\Action2',
//     *         'property1' => 'value1',
//     *         'property2' => 'value2',
//     *     ],
//     * ];
//     * ```
//     *
//     * [[\Yii::createObject()]] will be used later to create the requested action
//     * using the configuration provided here.
//     */
//    public function actions()
//    {
//        return [
//            'update-article' => [
//                'class' => UpdateArticle::className(),
//            ],
//            'update-category' => [
//                'class' => UpdateCategory::className(),
//            ],
//        ];
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function behaviors()
//    {
//        return [
////            'verbs' => [
////                'class' => VerbFilter::className(),
////                'actions' => [
////                    'delete' => ['POST'],
////                ],
////            ],
//        ];
//    }
//
//
//
//    /**
//     * Lists all ArticleRecord models.
//     *
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        $searchModel = new ArticleSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    /**
//     * Displays a single ArticleRecord model.
//     *
//     * @param integer $id
//     *
//     * @return mixed
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new ArticleRecord model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     *
//     * @param null $category_id
//     *
//     * @return mixed
//     * @internal param int $article_type_id
//     * @internal param null $category_id
//     *
//     * @internal param string $article_type
//     * @internal param string $type
//     */
//    public function actionCreate($category_id = NULL)
//    {
//        $isAjax = Yii::$app->request->isAjax;
//        $model = new ArticleRecord();
//
//        if ($category_id) {
//            $model->category_id = $category_id;
//        }
//        if ($isAjax) {
//            $loadResult = $model->load(Yii::$app->request->get());
//        } else {
//            $loadResult = $model->load(Yii::$app->request->post());
//        }
//        if (!$model->type_id) {
//            $model->type_id = self::DEFAULT_ARTICLE_TYPE_ID;
//        }
//
//        if ($loadResult && $model->save()) {
//            return $this->redirect(['/category' . $model->category->alias, 'article_id' => $model->id]);
//        } else {
//
//            if ($isAjax) {
//                return $this->renderAjax('_form', [
//                    'model' => $model,
//                ]);
//            } else {
//                return $this->render('create', [
//                    'model' => $model,
//                ]);
//            }
//
//        }
//    }
//
//    /**
//     * Updates an existing ArticleRecord model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     *
//     * @param integer $id
//     *
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['/category' . $model->category->alias, 'article_id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Deletes an existing ArticleRecord model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     *
//     * @param integer $id
//     *
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//
//        $model = $this->findModel($id);
//
//        $categoryAlias = $model->category->alias;
//
//        $model->delete();
//
//        return $this->redirect(['/category' . $categoryAlias]);
//    }
//
//    public function actionFileUpload()
//    {
//        $uploadFileForm = new UploadFileForm();
//        $uploadFileForm->file = UploadedFile::getInstance($uploadFileForm, 'file');
//        $uploadFileForm->upload();
//        return TRUE;
//    }
//
//    /**
//     * Finds the ArticleRecord model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     *
//     * @param integer $id
//     *
//     * @return ArticleRecord the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = ArticleRecord::findOne($id)) !== NULL) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
}

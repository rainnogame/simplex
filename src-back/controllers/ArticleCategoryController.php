<?php

namespace app\controllers;

use app\models\ArticleCategoryRecord;
use app\models\ArticleCategorySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategoryRecord model.
 */
class ArticleCategoryController extends Controller
{


    public function actionAliasById($id = 0)
    {
        return ArticleCategoryRecord::findOne($id)->alias;
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
        ];
    }
    
    /**
     * Lists all ArticleCategoryRecord models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    /**
     * Displays a single ArticleCategoryRecord model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Creates a new ArticleCategoryRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param string $parent_id
     *
     * @return mixed
     * @internal param string $root_category_alias
     *
     * @internal param null $root_category_id
     *
     * @internal param null $root_article_category_id root category to creating
     */
    public function actionCreate($parent_id = '')
    {

        $model = new ArticleCategoryRecord();
        $model->parent_id = $parent_id;

        $loadResult = $model->load(Yii::$app->request->post());

        if ($loadResult && $model->save()) {
            return $this->redirect(['category' . $model->alias]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Updates an existing ArticleCategoryRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['category' . $model->alias]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing ArticleCategoryRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Exception
     * @internal param string $root_category_alias
     *
     */
    public function actionDelete($id)
    {
        $category = $this->findModel($id);
        $parent = $category->parent;
        $category->delete();
        return $this->redirect(['category' . $parent->alias]);
    }
    
    /**
     * Finds the ArticleCategoryRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return ArticleCategoryRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCategoryRecord::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use app\models\ArticleRecord;
use app\models\ArticleSearch;
use app\models\UploadFileForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for ArticleRecord model.
 */
class ArticleController extends Controller
{

    const DEFAULT_ARTICLE_TYPE_ID = 1;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    /**
     * Lists all ArticleRecord models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single ArticleRecord model.
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
     * Finds the ArticleRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return ArticleRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleRecord::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new ArticleRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param int  $article_type_id
     * @param null $category_id
     *
     * @return mixed
     * @internal param string $article_type
     * @internal param string $type
     */
    public function actionCreate($article_type_id = self::DEFAULT_ARTICLE_TYPE_ID, $category_id = NULL)
    {
        $model = new ArticleRecord();
        
        
        if ($article_type_id) {
            $model->type_id = $article_type_id;
        }
        
        if ($category_id) {
            $model->category_id = $category_id;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/article-view', 'article_id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Updates an existing ArticleRecord model.
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
            return $this->redirect(['/article-view', 'article_id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing ArticleRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
    
    public function actionFileUpload()
    {
        $uploadFileForm = new UploadFileForm();
        $uploadFileForm->file = UploadedFile::getInstance($uploadFileForm, 'file');
        $uploadFileForm->upload();
        return TRUE;
    }
}

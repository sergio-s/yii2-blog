<?php

namespace backend\controllers;

use Yii;
use backend\models\BlogPostsTable;
use backend\models\BlogPostsTableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogController implements the CRUD actions for BlogPostsTable model.
 */
class BlogController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BlogPostsTable models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogPostsTableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlogPostsTable model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $perent_categoris = $model->parentCategoris;

        return $this->render('view', [
            'model' => $model,
            'perent_categoris' => $perent_categoris,

        ]);
    }

    /**
     * Creates a new BlogPostsTable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlogPostsTable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $cat_post_table = new \common\models\BlogCategorisPostsTable();
            $cat_post_table->id_post = $model->id;
            $cat_post_table->id_category = $model->category_id;
            $cat_post_table->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            $categoris = \common\models\BlogCategorisTable::getAllCategorisPosts();


//            $categoris_name = array(0 => 'нет категорий');
            foreach ($categoris as $category)
            {

                $categoris_name[$category->id] = $category->title;
            }

            return $this->render('create', [
                'model' => $model,
                'categoris_name' => $categoris_name,
            ]);
        }
    }

    /**
     * Updates an existing BlogPostsTable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        //удаляем в промежуточной таблице постов-категорий, строку с текущим постом, чтобы
        //вставить новые данные id поста и id обнавленной родительской категории
            \Yii::$app
                ->db
                ->createCommand()
                ->delete('blog_categoris_posts_table', ['id_post' => $model->id])
                ->execute();

            //создаем новую связь для данного поста с выбранной категорий через таблицу посредник
            $cat_post_table = new \common\models\BlogCategorisPostsTable();
            $cat_post_table->id_post = $model->id;
            $cat_post_table->id_category = $model->category_id;
            $cat_post_table->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            $categoris = \common\models\BlogCategorisTable::getAllCategorisPosts();

//категории,в которых состоит этот пост (можеет быть не одна категория)
            $perent_categoris = $model->parentCategoris;

//            $categoris_name = array(0 => 'нет категорий');
            foreach ($categoris as $category)
            {
                $categoris_name[$category->id] = $category->title;
            }

            return $this->render('update', [
                'model' => $model,
                'categoris_name' => $categoris_name,
                'perent_categoris' => $perent_categoris,
            ]);
        }
    }

    /**
     * Deletes an existing BlogPostsTable model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BlogPostsTable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return BlogPostsTable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlogPostsTable::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace backend\controllers;

use Yii;
use backend\models\BlogPostsTable;
use backend\models\BlogPostsTableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//for img
//use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\imagine\Gd;
use yii\helpers\FileHelper;

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
     * раскомментировать extension=php_fileinfo.dll в php ini для работы с файлами
     */
    public function actionCreate()
    {
        $model = new BlogPostsTable();

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'file');


            if ($file && $file->tempName) {
                $model->file = $file;


                    //имя файла
                    $fileName = $model->file->baseName . '.' . $model->file->extension;

                    //имя картинки для записи в базу данных
                    $model->img = $fileName;

                    //сохраняем данные в базу данных
                    if($model->validate() and $model->save()){

                        //сохранение родительской категории, выбранной в выпадающем меню
                        $this->saveParentCategory($model->id, $model->category_id );

                        // ID нового элемента
                        $new_id = $model->id;

                        //путь к папке для сохранения изображения текущей записи
                        $dir = Yii::getAlias('@blogImg-path/'.$new_id.'/');
                        $dirThumb = Yii::getAlias('@blogImg-path/'.$new_id.'/thumb/');

                        //создаем папку, если не существует
                        FileHelper::createDirectory($dir);
                        FileHelper::createDirectory($dirThumb);

                        //сохраняем картинку в созданную папку
                        $pathToBig = $dir.$fileName;
                        $pathToThumb = $dirThumb.$fileName;

                        if($model->file->saveAs($pathToBig))
                        {
                            //превью
                            Image::thumbnail($pathToBig, 406, 324)->save($pathToThumb, ['quality' => 100]);
                            sleep(1);

                            //ресайз большой картинки
                            Image::thumbnail($pathToBig, 1084, 864)->save($pathToBig, ['quality' => 100]);


                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                        else{
                            echo 'изображение не загрузилось';
                        }


                    }

            }

        }
        else
        {

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

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'file');

            if ($file && $file->tempName) {
                $model->file = $file;


                    //имя файла
                    $fileName = $model->file->baseName . '.' . $model->file->extension;

                    //имя картинки для записи в базу данных
                    $model->img = $fileName;

                    //сохраняем данные в базу данных
                    if($model->validate() and $model->save()){

                        //обновление родительской категории, выбранной в выпадающем меню с флагом true
                        $this->saveParentCategory($model->id, $model->category_id, true );

                        // ID нового элемента
                        $new_id = $model->id;

                        //путь к папке для сохранения изображения текущей записи
                        $dir = Yii::getAlias('@blogImg-path/'.$new_id.'/');
                        $dirThumb = Yii::getAlias('@blogImg-path/'.$new_id.'/thumb/');

                        //удаляем папку картинок с id статьи блога и все ее картинки для создания вновь

                        FileHelper::removeDirectory($dir);

                        //создаем папку, если не существует
                        FileHelper::createDirectory($dir);
                        FileHelper::createDirectory($dirThumb);

                        //сохраняем картинку в созданную папку
                        $pathToBig = $dir.$fileName;
                        $pathToThumb = $dirThumb.$fileName;

                        if($model->file->saveAs($pathToBig))
                        {
                            //превью
                            Image::thumbnail($pathToBig, 406, 324)->save($pathToThumb, ['quality' => 100]);
                            sleep(1);

                            //ресайз большой картинки
                            Image::thumbnail($pathToBig, 1084, 864)->save($pathToBig, ['quality' => 100]);


                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                        else{
                            echo 'изображение не загрузилось';
                        }


                    }

            }
                    //сохраняем без изменения картинки
                    if($model->validate() and $model->save()){

                        //обновление родительской категории, выбранной в выпадающем меню с флагом true
                        $this->saveParentCategory($model->id, $model->category_id, true );

                        return $this->redirect(['view', 'id' => $model->id]);
                    }

        }
        else
        {

            $categoris = \common\models\BlogCategorisTable::getAllCategorisPosts();

//категории,в которых состоит этот пост (можеет быть не одна категория)
            $perent_categoris = $model->parentCategoris;

            // $categoris_name = array(0 => 'нет категорий');
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

        //путь к папке изображений текущей записи
        $dir = Yii::getAlias('@blogImg-path/'.$id);

        //удаляем папку картинок с id статьи блога и все ее картинки
        FileHelper::removeDirectory($dir);

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


    /**
     * @param type $id_post
     * @param type $id_category
     * @param type $update
     * При обновлении родительской категории - удаляем в связной таблице поле с текущими id поста - категории
     * и пишем новые.
     * При создании записи - просто пишем новые id поста - категории в связной таблице.
     */
    protected function saveParentCategory($id_post, $id_category, $update = false )
    {
        if(true === $update)
        {
         //удаляем в промежуточной таблице постов-категорий, строку с текущим постом, чтобы
        //вставить новые данные id поста и id обнавленной родительской категории
            \Yii::$app
                ->db
                ->createCommand()
                ->delete('blog_categoris_posts_table', ['id_post' => $id_post])
                ->execute();
        }

        $cat_post_table = new \common\models\BlogCategorisPostsTable();
        $cat_post_table->id_post = $id_post;
        $cat_post_table->id_category = $id_category;
        $cat_post_table->save();
    }


}

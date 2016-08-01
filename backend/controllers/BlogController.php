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
use app\models\authors\AuthorsPosts;

/**
 * BlogController implements the CRUD actions for BlogPostsTable model.
 */
class BlogController extends BaseAdmin
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

    public function beforeAction($action)
    {
//        if (parent::beforeAction($action)) {
//            if ($this->action->id == 'create') {
//                Yii::$app->controller->enableCsrfValidation = false;
//            }
//
//            return true;
//        }
//        return false;
        $this->enableCsrfValidation = false;

	return parent :: beforeAction($action);
    }

    // для загрузки картинок из визуального редактора текста
    public function actions()
    {
        return [
            'redactor-images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => Yii::getAlias('@blogImg-web/textpics/'), // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@blogImg-path/textpics'), // Or absolute path to directory where files are stored.
                'type' => \vova07\imperavi\actions\GetAction::TYPE_IMAGES,
            ],
            'redactor-image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => Yii::getAlias('@blogImg-web/textpics/'), // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@blogImg-path/textpics'), // Or absolute path to directory where files are stored.
                'validatorOptions' => [
                    'maxWidth' => 10000,
                    'maxHeight' => 10000,
                    'maxSize' => 40000000//40мегабайт
                ],
                'successCallback' => [$this, 'uploadCallback'],
            ],

        ];
    }
    //данные из текстового редактора vova07\imperavi\actions\UploadAction
    //приходят сюда в виде $result в виде массива пути к картинке в веб и в файловой системе
    public function uploadCallback($result)
    {

        if(isset($result['filelink']) && isset($result['filepath'])){
            $mime = FileHelper::getMimeType($result['filepath']);
            if($mime === 'image/jpeg' || $mime === 'image/png' || $mime === 'image/gif'){
                //print_r($result['filepath']);
                //ресайз большой картинки
//                var_dump(is_file($result['filepath']));
                $imgPath = $result['filepath'];

                Image::thumbnail($imgPath, 1084, 864)->save($imgPath, ['quality' => 80]);

            }

        }

        return $result;
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
        //static::chengeAllWatermarks();//перезапись ватермарков

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
        //$this->enableCsrfValidation = false;
        $model = new BlogPostsTable();

        if ($model->load(Yii::$app->request->post()))
        {

            $file = UploadedFile::getInstance($model, 'file');

            if ($file && $file->tempName)
            {
                $model->file = $file;

                //имя файла
                $fileName = $model->file->baseName . '.' . $model->file->extension;

                //имя картинки для записи в базу данных
                $model->img = $fileName;

                //сохраняем данные в базу данных
                if($model->validate() and $model->save())
                {

                    //сохранение родительской категории, выбранной в выпадающем меню
                    $this->saveParentCategory($model->id, $model->category_id );

                    //сохранить выбранного автора, если автор был выбран (не обязательный атрибут)
                    if(null !== $model->writer_id){
                        $this->saveWriter($model->id, $model->writer_id, 'сreate');
                    }

                    // ID нового элемента
                    $new_id = $model->id;

                    //путь к папке для сохранения изображения текущей записи
                    $dir = Yii::getAlias('@blogImg-path/'.$new_id.'/');
                    $dirThumb = Yii::getAlias('@blogImg-path/'.$new_id.'/thumb/');
                    $dirWatermark = Yii::getAlias('@blogImg-path/'.$new_id.'/watermark/');//тут будут храниться большие фото с ватермаркой

                    //создаем папку, если не существует
                    FileHelper::createDirectory($dir);
                    FileHelper::createDirectory($dirThumb);
                    FileHelper::createDirectory($dirWatermark);

                    //сохраняем картинку в созданную папку
                    $pathToBig = $dir.$fileName;
                    $pathToThumb = $dirThumb.$fileName;
                    $pathToBigWatermark = $dirWatermark.$fileName;

                    if($model->file->saveAs($pathToBig))
                    {

                        //превью
                        Image::thumbnail($pathToBig, 406, 324)->save($pathToThumb, ['quality' => 100]);
                        sleep(1);

                        //ресайз большой картинки
                        Image::thumbnail($pathToBig, 1084, 864)->save($pathToBig, ['quality' => 90]);
                        sleep(1);

                        $watermark = Yii::getAlias(Yii::$app->params['watermark']);
                        if(file_exists($watermark))//есть водяной знак
                        {
                            //добавляем ватермарку к картинке
                            Image::watermark($pathToBig, $watermark, [600,600])//x и y
                                    ->save($pathToBigWatermark);
                            sleep(1);
                        }

                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                }

            }
            elseif($model->validate() and $model->save())
            {

                //обновление родительской категории, выбранной в выпадающем меню с флагом true
                $this->saveParentCategory($model->id, $model->category_id);

                //сохранить выбранного автора, если автор был выбран (не обязательный атрибут)
                if(null !== $model->writer_id){
                    $this->saveWriter($model->id, $model->writer_id, 'сreate');
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }

        }
        else
        {

            $categoris = \common\models\BlogCategorisTable::getAllCategorisPosts();



            //$categoris_name = array(0 => 'нет категорий');
            foreach ($categoris as $category)
            {
                $categoris_name[$category->id] = $category->title;
            }

            $prompt = 'Назначить автора';

            return $this->render('create', [
                'model' => $model,
                'categoris_name' => $categoris_name,
                'prompt' => $prompt,
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
                    if($model->validate() and $model->save())
                    {

                        //обновление родительской категории, выбранной в выпадающем меню с флагом true
                        $this->saveParentCategory($model->id, $model->category_id, true );

                        //сохранить выбранного автора, если автор был выбран (не обязательный атрибут)
                        if(!empty($model->writer_id)){
        //                    var_dump(Yii::$app->request->post());die;
                            $this->saveWriter($model->id, $model->writer_id, 'update');
                        }else{
                            $this->saveWriter($model->id, $model->writer_id, 'delete');//если выбрано поле prompt('не назначать автора') из выпадающего списка,то возвращается empty и мы удаляем связь поста с автором
                        }


                        // ID нового элемента
                        $new_id = $model->id;

                        //путь к папке для сохранения изображения текущей записи
                        $dir = Yii::getAlias('@blogImg-path/'.$new_id.'/');
                        $dirThumb = Yii::getAlias('@blogImg-path/'.$new_id.'/thumb/');
                        $dirWatermark = Yii::getAlias('@blogImg-path/'.$new_id.'/watermark/');//тут будут храниться большие фото с ватермаркой


                        //удаляем папку картинок с id статьи блога и все ее картинки для создания вновь
                        FileHelper::removeDirectory($dir);

                        //создаем папку, если не существует
                        FileHelper::createDirectory($dir);
                        FileHelper::createDirectory($dirThumb);
                        FileHelper::createDirectory($dirWatermark);


                        //сохраняем картинку в созданную папку
                        $pathToBig = $dir.$fileName;
                        $pathToThumb = $dirThumb.$fileName;
                        $pathToBigWatermark = $dirWatermark.$fileName;

                        if($model->file->saveAs($pathToBig))
                        {

                            //превью
                            Image::thumbnail($pathToBig, 406, 324)->save($pathToThumb, ['quality' => 100]);
                            sleep(1);

                            //ресайз большой картинки
                            Image::thumbnail($pathToBig, 1084, 864)->save($pathToBig, ['quality' => 90]);
                            sleep(1);

                            $watermark = Yii::getAlias(Yii::$app->params['watermark']);
                            if(file_exists($watermark))//есть водяной знак
                            {
                                //добавляем ватермарку к картинке
                                Image::watermark($pathToBig, $watermark, [600,600])//x и y
                                        ->save($pathToBigWatermark);
                                sleep(1);
                            }

                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                        else{
                            echo 'изображение не загрузилось';
                        }


                    }

            }elseif($model->validate() and $model->save()){

                //обновление родительской категории, выбранной в выпадающем меню с флагом true
                $this->saveParentCategory($model->id, $model->category_id, true );

                //сохранить выбранного автора, если автор был выбран (не обязательный атрибут)
                if(!empty($model->writer_id)){
//                    var_dump(Yii::$app->request->post());die;
                    $this->saveWriter($model->id, $model->writer_id, 'update');
                }else{
                    $this->saveWriter($model->id, $model->writer_id, 'delete');//если выбрано поле prompt('не назначать автора') из выпадающего списка,то возвращается empty и мы удаляем связь поста с автором
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }

        }
        else
        {

            $categoris = \common\models\BlogCategorisTable::getAllCategorisPosts();

            //категории,в которых состоит этот пост (можеет быть не одна категория)
            //пока поддерживается одна
            $perent_categoris = $model->parentCategoris;

            // $categoris_name = array(0 => 'нет категорий');
            foreach ($categoris as $category)
            {
                $categoris_name[$category->id] = $category->title;
            }
            //выбранная по умолчанию - текущая родительская категория
            if(isset($model->parentCategoris[0]->id)){
                $selected = $model->parentCategoris[0]->id;
            }
            else{
                $selected = NULL;
            }

            $prompt = 'Назначить автора';
            //гетер getAuthor()
            if(null !== $model->writer){
                $model->writer_id = $model->writer->id;
                $prompt = 'Не назначать автора';
                //$prompt = NULL;
            }


            return $this->render('update', [
                'model' => $model,
                'categoris_name' => $categoris_name,
                'perent_categoris' => $perent_categoris,
                'selected' => $selected,
                'prompt' => $prompt,
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

    //сохранение или удаление назнаенного автора (не создателя поста)
    protected function saveWriter($id_post, $id_author, $action){
//    var_dump($id_author);die;
        if($action === 'update'){
            $authorsPosts = AuthorsPosts::find()->where(['id_post' => $id_post])->one();//из табл authors_posts
            //если автор назначен
            if(null !== $authorsPosts){
                $authorsPosts->id_author = $id_author;//обновленный id_author
            }
            //если автор еще не назначен
            else
            {
                $authorsPosts = new AuthorsPosts();
                $authorsPosts->id_post   = $id_post;
                $authorsPosts->id_author = $id_author;
            }

            $authorsPosts->save();
            return;
        }

        if($action === 'сreate'){
            $authorsPosts = new AuthorsPosts();
            $authorsPosts->id_post   = $id_post;
            $authorsPosts->id_author = $id_author;
            $authorsPosts->save();
            return;
        }

        if($action === 'delete'){
            //если в форме у автора выбрана опция - "убрать авторство"
            $authorsPosts = AuthorsPosts::find()->where(['id_post' => $id_post])->one();//из табл authors_posts
            //если автор был назначен - удаляем связь из authors_posts, если автор не назначен - return
            if(null !== $authorsPosts){
                $authorsPosts->delete();
            }
            return;
        }
    }


    //пакетная замена водяных знаков
    public static function chengeAllWatermarks()
    {
        $arrayImg = [];
        $watermark = Yii::getAlias(Yii::$app->params['watermark']);
        $path = opendir(Yii::getAlias('@blogImg-path/'));
        // перебираем папку
        while (($dir = readdir($path )) !== false){ // перебираем пока есть файлы

            if(is_dir(Yii::getAlias('@blogImg-path/'.$dir)) && $dir != 'textpics' && $dir != '.' && $dir != '..'){ // если это не папка
                $curDir = Yii::getAlias('@blogImg-path/'.$dir);
                $scan = scandir($curDir);
                foreach($scan as $elem) {
                    //var_dump($curDir.'/'.$elem);
                    if(is_file($curDir.'/'.$elem)){
                        if((exif_imagetype($curDir.'/'.$elem) === IMAGETYPE_JPEG) || (exif_imagetype($curDir.'/'.$elem) === IMAGETYPE_PNG) || (exif_imagetype($curDir.'/'.$elem) === IMAGETYPE_GIF)){
                            $img = $curDir.'/'.$elem;
                            $arrayImg[] = $img;
                            //var_dump(dirname($img));

                        }

                    }
                }

            }
        }
        // закрываем папку
        closedir($path);

        $dirWatermark = '/watermark/';
        foreach($arrayImg as $imgpath) {
            $newDir = dirname($imgpath).$dirWatermark;
            $newFile = basename($imgpath);
            $newPath = $newDir.$newFile;

            FileHelper::removeDirectory($newDir);
            FileHelper::createDirectory($newDir);

            Image::watermark($imgpath, $watermark, [600,600])->save($newPath);

        }


        return;
    }

}

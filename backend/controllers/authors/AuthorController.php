<?php

namespace backend\controllers\authors;

use Yii;
use backend\controllers\BaseAdmin;
use app\models\authors\Authors;
use backend\models\authors\AuthorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\imagine\Gd;
use yii\helpers\FileHelper;
use yii\helpers\Html;

/**
 * AuthorController implements the CRUD actions for Authors model.
 */
class AuthorController extends BaseAdmin
{
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

    public function getViewPath()
    {
        return Yii::getAlias('@backend/views/authors');
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


    /**
     * Lists all Authors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Authors model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Authors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Authors();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->file = UploadedFile::getInstance($model, 'file');

            //имя файла
            $fileName = $model->file->baseName . '.' . $model->file->extension;

            //имя картинки для записи в базу данных
            $model->img = $fileName;

            //сохраняем данные в базу данных
            if($model->validate() and $model->save())
            {
                // ID нового элемента
                $new_id = $model->id;

                //путь к папке для сохранения изображения текущей записи
                $dir = Yii::getAlias('@authorsImg-path/'.$new_id.'/');//200X200
                $dirThumb = Yii::getAlias('@authorsImg-path/'.$new_id.'/thumb/');//90X90

                //создаем папку, если не существует
                FileHelper::createDirectory($dir);
                FileHelper::createDirectory($dirThumb);

                //сохраняем картинку в созданную папку
                $pathToBig = $dir.$fileName;
                $pathToThumb = $dirThumb.$fileName;

                //ресайз большой картинки
                Image::thumbnail($model->file->tempName, 200, 200)->save($pathToBig, ['quality' => 90]);
                sleep(1);

                //превью
                Image::thumbnail($pathToBig, 90, 90)->save($pathToThumb, ['quality' => 100]);
                sleep(1);

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        else
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Authors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()))
        {
            $model->scenario = Authors::SCENARIO_UPDATE;
            $model->file = UploadedFile::getInstance($model, 'file');

            if(NULL !== $model->file){
                //имя файла
                $fileName = $model->file->baseName . '.' . $model->file->extension;

                //имя картинки для записи в базу данных
                $model->img = $fileName;
            }

            //сохраняем данные в базу данных
            if($model->validate() and $model->save())
            {

                if(NULL !== $model->file){
                    // ID нового элемента
                    $new_id = $model->id;

                    //путь к папке для сохранения изображения текущей записи
                    $dir = Yii::getAlias('@authorsImg-path/'.$new_id.'/');//200X200
                    $dirThumb = Yii::getAlias('@authorsImg-path/'.$new_id.'/thumb/');//90X90

                    //удаляем папку картинок с id статьи блога и все ее картинки для создания вновь
                    FileHelper::removeDirectory($dir);

                    //создаем папку, если не существует
                    FileHelper::createDirectory($dir);
                    FileHelper::createDirectory($dirThumb);

                    //сохраняем картинку в созданную папку
                    $pathToBig = $dir.$fileName;
                    $pathToThumb = $dirThumb.$fileName;

                    //ресайз большой картинки
                    Image::thumbnail($model->file->tempName, 200, 200)->save($pathToBig, ['quality' => 90]);
                    sleep(1);

                    //превью
                    Image::thumbnail($pathToBig, 90, 90)->save($pathToThumb, ['quality' => 100]);
                    sleep(1);
                }



                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        else
        {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Authors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        //путь к папке изображений текущей записи
        $dir = Yii::getAlias('@authorsImg-path/'.$id);

        //удаляем папку картинок с id
        FileHelper::removeDirectory($dir);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Authors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Authors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Authors::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

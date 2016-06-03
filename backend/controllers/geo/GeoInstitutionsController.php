<?php

namespace backend\controllers\geo;

use Yii;
use backend\controllers\BaseAdmin;
use backend\models\geo\GeoInstitutions;
use backend\models\geo\GeoInstitutionsSearch;
use backend\models\geo\GeoInstitutionsPhotos;
use backend\models\geo\GeoInstitutionsPhones;
use common\models\likes\Likes;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\imagine\Gd;
use yii\helpers\FileHelper;
use yii\helpers\Html;

/**
 * GeoInstitutionsController implements the CRUD actions for GeoInstitutions model.
 */
class GeoInstitutionsController extends BaseAdmin
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
        return Yii::getAlias('@backend/views/geo/institutions');
    }

    /**
     * Lists all GeoInstitutions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GeoInstitutionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GeoInstitutions model.
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
     * Creates a new GeoInstitutions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GeoInstitutions();

        if ($model->load(Yii::$app->request->post()))
        {

            $model->file = UploadedFile::getInstances($model, 'file');//при загрузен нескольких фото getInstances

            $model->scenario = GeoInstitutions::SCENARIO_CREATE;
            if($model->validate() and $model->save())
            {
                // ID нового элемента
                $new_id = $model->id;

                //забиваем и сохраняем данные в связанную таблицу телефонов
                $phoneArr = array_map('trim', explode(',', $model->phone_char));//массив из строки с формы
                foreach($phoneArr as $phone){
                    $modelPhones = new GeoInstitutionsPhones(['scenario' => GeoInstitutionsPhones::SCENARIO_CREATE]);
                    $modelPhones->country_id = $model->country_id;
                    $modelPhones->city_id = $model->city_id;
                    $modelPhones->institution_id = $new_id;
                    $modelPhones->phone_char = $phone;
                    $modelPhones->save();
                }

                //забиваем и сохраняем данные в связанную таблицу фото, если загружены
                if(NULL != $model->file){
                    $dir = Yii::getAlias('@geoImg-path/institution-'.$new_id.'/');
                    FileHelper::createDirectory($dir);

                    foreach ($model->file as $file) {
                        //имя файла
                        $fileName = $file->baseName . '.' . $file->extension;
                        Image::thumbnail($file->tempName, 700, 500)->save($dir.$fileName, ['quality' => 90]);
                        if(file_exists($dir.$fileName)){
                            $modelPhotos = new GeoInstitutionsPhotos();
                            $modelPhotos->scenario = GeoInstitutionsPhotos::SCENARIO_CREATE;
                            $modelPhotos->institution_id = $new_id;
                            $modelPhotos->img = $fileName;
                            $modelPhotos->save();
                        }

                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);

            }

        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GeoInstitutions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()))
        {

            $model->file = UploadedFile::getInstances($model, 'file');//при загрузен нескольких фото getInstances

            $model->scenario = GeoInstitutions::SCENARIO_CREATE;
            if($model->validate() and $model->save())
            {
                // ID нового элемента
                $new_id = $model->id;

                //забиваем и сохраняем данные в связанную таблицу телефонов
                $phoneArr = array_map('trim', explode(',', $model->phone_char));//массив из строки с формы

                //удаляем старые телефоны
                GeoInstitutionsPhones::deleteAll(['institution_id' => $new_id]);

                //формируем новые телефоны
                foreach($phoneArr as $phone){
                    $modelPhones = new GeoInstitutionsPhones(['scenario' => GeoInstitutionsPhones::SCENARIO_CREATE]);
                    $modelPhones->country_id = $model->country_id;
                    $modelPhones->city_id = $model->city_id;
                    $modelPhones->institution_id = $new_id;
                    $modelPhones->phone_char = $phone;
                    $modelPhones->save();
                }

                //забиваем и сохраняем данные в связанную таблицу фото, если загружены
                if(NULL != $model->file){
                    $dir = Yii::getAlias('@geoImg-path/institution-'.$new_id.'/');

                    //удаляем дирректорию со старыми картинками
                    FileHelper::removeDirectory($dir);

                    //создаем дирректорию занова
                    FileHelper::createDirectory($dir);

                    //удаляем старые фото
                    GeoInstitutionsPhotos::deleteAll(['institution_id' => $new_id]);

                    foreach ($model->file as $file) {
                        //имя файла
                        $fileName = $file->baseName . '.' . $file->extension;
                        Image::thumbnail($file->tempName, 700, 500)->save($dir.$fileName, ['quality' => 90]);
                        if(file_exists($dir.$fileName)){
                            $modelPhotos = new GeoInstitutionsPhotos();
                            $modelPhotos->scenario = GeoInstitutionsPhotos::SCENARIO_CREATE;
                            $modelPhotos->institution_id = $new_id;
                            $modelPhotos->img = $fileName;
                            $modelPhotos->save();
                        }

                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);

            }

        }
        else {

            //выводим телефоны через запятую из связной таблицы
            $model->phone_char = $model->getPhonesNumbers($sep = ", ");

            $htmlImg = [];
            $arrPhotoSrc = $model->getPhotoSrc();
            if(NULL != $arrPhotoSrc){
                foreach ($arrPhotoSrc as $photo)
                {
                    //$htmlImg .= Html::img('@geoImg-web/institution-'.$model->id.'/'.$photo->img, ['class'=>'file-preview-image']);
                    $htmlImg[] = Yii::getAlias('@geoImg-web/institution-'.$model->id.'/'.$photo->img);

                }
            }

            return $this->render('update', [
                'model' => $model,
                'htmlImg' => $htmlImg,
            ]);
        }
    }

    /**
     * Deletes an existing GeoInstitutions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        self::deleteInstitution($id);

        return $this->redirect(['index']);
    }

    //удаление по id института
    public static function deleteInstitution($id)
    {
        //удаляем старые телефоны
        GeoInstitutionsPhones::deleteAll(['institution_id' => $id]);

        //удаляем старые фото из бд
        GeoInstitutionsPhotos::deleteAll(['institution_id' => $id]);

        //удаляем дирректорию со старыми картинками
        $dir = Yii::getAlias('@geoImg-path/institution-'.$id.'/');
        FileHelper::removeDirectory($dir);

        //удаляем лайки , если есть
        Likes::deleteAll(['materialType' => Likes::TYPE_GEOINSTITUTIONS, 'materialId' => $id]);

        static::findModelInstitution($id)->delete();

        return;
    }

    /**
     * Finds the GeoInstitutions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return GeoInstitutions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GeoInstitutions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    //то же функция, что и findModel($id) ,только статическая
    protected static function findModelInstitution($id)
    {
        if (($model = GeoInstitutions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

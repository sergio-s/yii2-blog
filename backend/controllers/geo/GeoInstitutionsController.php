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
        //static::chengeAllWatermarks();//перезапись ватермарков
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
                //РАБОТА С ФАЙЛАМИ
                //забиваем и сохраняем данные в связанную таблицу фото, если загружены
                if(NULL != $model->file){
                    $dir = Yii::getAlias('@geoImg-path/institution-'.$new_id.'/');
                    //$dirWatermark = $dir.'watermark/';//тут будут храниться большие фото с ватермаркой

                    FileHelper::createDirectory($dir);
                    //FileHelper::createDirectory($dirWatermark);

                    //$watermark = Yii::getAlias(Yii::$app->params['watermark']);

                    foreach ($model->file as $file) {
                        //имя файла
                        $fileName = $file->baseName . '.' . $file->extension;

                        //сохраняем картинки
                        Image::thumbnail($file->tempName, 1084, 864)->save($dir.$fileName, ['quality' => 90]);

                        //сохранение картинки с водяным знаком
                        //$dir.$fileName - что копируем,$watermark - водяной знак,$dirWatermark.$fileName - куда копируем
                        //Image::watermark($dir.$fileName, $watermark, [600,600])//x и y
                        //        ->save($dirWatermark.$fileName);

                        //записываем данные о картинках в бд
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
                    //$dirWatermark = $dir.'watermark/';//тут будут храниться большие фото с ватермаркой

                    //удаляем дирректорию со старыми картинками и папкой водяных знаков
                    FileHelper::removeDirectory($dir);

                    //создаем дирректории занова
                    FileHelper::createDirectory($dir);
                    //FileHelper::createDirectory($dirWatermark);

                    //удаляем старые фото из бд
                    GeoInstitutionsPhotos::deleteAll(['institution_id' => $new_id]);

                    //путь к файлу картинки - водяного знака
                    //$watermark = Yii::getAlias(Yii::$app->params['watermark']);

                    foreach ($model->file as $file) {
                        //имя файла
                        $fileName = $file->baseName . '.' . $file->extension;

                        //сохраняем картинки
                        Image::thumbnail($file->tempName, 1084, 864)->save($dir.$fileName, ['quality' => 90]);

                        //сохранение картинки с водяным знаком
                        //$dir.$fileName - что копируем,$watermark - водяной знак,$dirWatermark.$fileName - куда копируем
                        //Image::watermark($dir.$fileName, $watermark, [600,600])//x и y
                        //        ->save($dirWatermark.$fileName);

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



    //пакетная замена водяных знаков
    public static function chengeAllWatermarks()
    {
        $arrayImg = [];
        $watermark = Yii::getAlias(Yii::$app->params['watermark']);
        $path = opendir(Yii::getAlias('@geoImg-path/'));
        // перебираем папку
        while (($dir = readdir($path )) !== false){ // перебираем пока есть файлы

            if(is_dir(Yii::getAlias('@geoImg-path/'.$dir)) && $dir != '.' && $dir != '..'){ // если это не папка
                $curDir = Yii::getAlias('@geoImg-path/'.$dir);
                $scan = scandir($curDir);
                foreach($scan as $elem) {
                    //находим картинки внутри папки одного материала
                    if(is_file($curDir.'/'.$elem)){
                        if((exif_imagetype($curDir.'/'.$elem) === IMAGETYPE_JPEG) || (exif_imagetype($curDir.'/'.$elem) === IMAGETYPE_PNG) || (exif_imagetype($curDir.'/'.$elem) === IMAGETYPE_GIF)){
                            $img = $curDir.'/'.$elem;
                            //сохраняем все полный пути к картинкам в массив
                            $arrayImg[] = $img;
                        }

                    }
                }

            }
        }
        // закрываем папку
        closedir($path);

        $dirWatermark = '/watermark/';
        $dirFlag = [];// записываем в массив вновь созданную папку для проверки и исключния перетирания
        foreach($arrayImg as $imgpath) {
            $newDir = dirname($imgpath).$dirWatermark;//путь к дирректории из пути картинки+название новой папки
            $newFile = basename($imgpath);//только имя и расширение картинки
            $newPath = $newDir.$newFile;

            //если папка еще не обробатывалась
            if(!in_array($newDir, $dirFlag)){
                //записываем новую дирректорию в массив
                $dirFlag[] = $newDir;

                //чистим старую папку, если есть и создаем новую
                FileHelper::removeDirectory($newDir);
                FileHelper::createDirectory($newDir);
            }


            Image::watermark($imgpath, $watermark, [600,600])->save($newPath);

        }


        return;
    }



}

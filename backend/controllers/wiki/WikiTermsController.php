<?php

namespace backend\controllers\wiki;

use Yii;
use backend\controllers\BaseAdmin;
use backend\models\wiki\AdminWikiTerms;
use backend\models\wiki\AdminWikiTermsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\imagine\Gd;
use yii\helpers\FileHelper;

/**
 * WikiTermsController implements the CRUD actions for AdminWikiTerms model.
 */
class WikiTermsController extends BaseAdmin
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

    // для загрузки картинок из визуального редактора текста
    public function actions()
    {
        return [
            'redactor-images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => Yii::getAlias('@wikiImg-web/textpics/'), // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@wikiImg-path/textpics'), // Or absolute path to directory where files are stored.
                'type' => \vova07\imperavi\actions\GetAction::TYPE_IMAGES,
            ],
            'redactor-image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => Yii::getAlias('@wikiImg-web/textpics/'), // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@wikiImg-path/textpics'), // Or absolute path to directory where files are stored.
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

    //путь к видам, если в подпапках
    public function getViewPath()
    {
        return Yii::getAlias('@backend/views/wiki/terms');
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

	return parent :: beforeAction($action);
    }


    /**
     * Lists all AdminWikiTerms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminWikiTermsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdminWikiTerms model.
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
     * Creates a new AdminWikiTerms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AdminWikiTerms();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AdminWikiTerms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AdminWikiTerms model.
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
     * Finds the AdminWikiTerms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AdminWikiTerms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdminWikiTerms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

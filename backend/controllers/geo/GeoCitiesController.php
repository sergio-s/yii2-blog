<?php

namespace backend\controllers\geo;

use Yii;
use backend\controllers\BaseAdmin;
use backend\models\geo\GeoCountries;
use backend\models\geo\GeoCities;
use backend\models\geo\GeoCitiesSearch;
use backend\models\geo\GeoInstitutions;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GeoController implements the CRUD actions for GeoCities model.
 */
class GeoCitiesController extends BaseAdmin
{
    private $_defaultCountry;

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

    public function beforeAction($action) {
//        if ($action->id == 'redirect') {
//            $this->enableCsrfValidation = false;
//        }
        $this->_defaultCountry = GeoCountries::find()->rossia()->one();

        return parent::beforeAction($action);
    }

    public function getViewPath()
    {
        return Yii::getAlias('@backend/views/geo/cities');
    }

    /**
     * Lists all GeoCities models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GeoCitiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single GeoCities model.
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
     * Creates a new GeoCities model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GeoCities();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'defaultCountry' => $this->_defaultCountry,
            ]);
        }
    }

    /**
     * Updates an existing GeoCities model.
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
     * Deletes an existing GeoCities model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        //извлекаем массив id учреждений данного города
        $institutionsId = GeoInstitutions::find()
                                            ->where(['city_id' => $id])
                                            ->select('id')
                                            ->all();

        //удаляем все учреждения этого города и связанные с ними данные(фото, лайки, телефоны)
        foreach($institutionsId as $institutionId){
            GeoInstitutionsController::deleteInstitution($institutionId->id);
        }
        //удаляем город из БД
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GeoCities model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return GeoCities the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GeoCities::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

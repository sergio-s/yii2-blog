<?php

namespace backend\controllers;

use Yii;
use backend\models\comments\Comments;
use backend\models\comments\CommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * CommentsController implements the CRUD actions for Comments model.
 */
class CommentsController extends BaseAdmin
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

    /**
     * Lists all Comments models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->title .= 'Все комментарии';
        $searchModel = new CommentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comments model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->view->title .= "Информация о комментарии {$id}";

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->view->title .= 'Создать комментарий';
        $model = new Comments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->view->title .= 'Редактировать комментарий';
        $model = $this->findModel($id);

        $model->scenario = Comments::SCENARIO_UPDATE;
        $model->updaterId = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {



            return $this->render('update', [
                'model' => $model,

            ]);
        }
    }

    /**
     * Deletes an existing Comments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
//Yii::$app->controller->enableCsrfValidation = false;
        $this->findModel($id)->delete();
//        $dotherComments = Comments::find()->where(['parentId'=> $id]);

        $dotherComments = Comments::findAll(['parentId'=> $id]);
        foreach($dotherComments as $comment){
            $comment->scenario = Comments::SCENARIO_DELITE;
            $comment->parentId = 0;
            //$comment->level = 0;
            $this->dotherLevelMinusOne($id);//уменьшаем level у всех дочерних на один
            $comment->save();
        }

        //return \yii\web\Response::redirect(['index'] , 302 , false);
        return Yii::$app->getResponse()->redirect(['comments/index'], 302, false);
        //return $this->redirect(['index']);
    }

    /**
     * Finds the Comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

//уменьшаем все дочерние уровни на 1
    protected function dotherLevelMinusOne($id)
    {
        if (($model = Comments::findOne(['parentId'=> $id])) !== null) {
                $model->level -= 1;
                $model->save();
            return $this->dotherLevelMinusOne($model->id);
        } else {
            return FALSE;
        }
    }

}

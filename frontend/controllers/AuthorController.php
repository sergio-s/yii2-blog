<?php

namespace frontend\controllers;

use yii;
use yii\helpers\Url;
use app\models\BlogPostsTable;
use app\models\authors\Authors;

class AuthorController extends BaseFront
{
    public function actionIndex($id = null)
    {
        $author = Authors::findOne($id);
        //ставим проверку только в экшкн, где передаются параметры, как $alias
        //если не правильно в адресе указан экшэн,  то на страницу ошибки перебросит автоматом
        if($author === NULL)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
            //throw new \yii\web\NotFoundHttpException;
        }

        //передаем тайтл
        Yii::$app->view->title .= '-профиль автора -'.$author->authorFullName;
        \Yii::$app->view->registerMetaTag(['name' => 'description','content' => 'Кратко об авторе'.$author->authorFullName]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => 'автор '.$author->authorFullName]);


        return $this->render('index',[
                                        'author' => $author,
                                    ]);
    }

}

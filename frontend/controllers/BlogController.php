<?php

namespace frontend\controllers;

use Yii;
/**
 * BlogController
 */
class BlogController extends BaseFront
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        //передаем тайтл
        Yii::$app->view->title .= ': главная блога';

        return $this->render('index');
    }

}

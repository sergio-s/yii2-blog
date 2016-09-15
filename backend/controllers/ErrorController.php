<?php

namespace backend\controllers;

use yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class ErrorController extends Controller
{

    public function actions()
    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//        ];
    }


    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if (null !== $exception) {

            if($exception instanceof ForbiddenHttpException){
                $this->layout = '@app/views/layouts/forbidden';
                
                return $this->render('forbidden', ['exception' => $exception]);

            }


            return $this->render('error', ['exception' => $exception]);
        }
    }

}

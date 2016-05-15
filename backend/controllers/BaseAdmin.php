<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\components\rbac\rbacRoles;
use yii\web\ForbiddenHttpException;

class BaseAdmin extends Controller
{

    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
////                        'roles' => ['?'],
//                    ],
//                    [
//
//                        'allow' => true,
//                        'roles' => [rbacRoles::ROLE_ADMIN],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if(Yii::$app->user->isGuest){
                return Yii::$app->getResponse()->redirect(Yii::$app->urlManagerFrontend->createUrl(['/site/login']));
            }
            else{
                if (!\Yii::$app->user->can(rbacRoles::ROLE_ADMIN)) {
                    $message = 'Доступ запрещен. Вернитесь на ';
                    $message .= "<a href='".Yii::$app->urlManagerFrontend->createUrl(['/'])."'>сайт</a>";
                    throw new ForbiddenHttpException($message);
                }
            }

            return true;
        } else {
            return false;
        }
    }


}


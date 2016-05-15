<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class BaseFront extends Controller
{

    // по умолчанию для всего сайта
    public $layout = '@app/views/layouts/page/default';
    public $slider = false;

    //временные данные одной категории для вывода в блоках сайдбара и центрального блока
    public $oneCatBlog;
    public $dbBlogCatTitlte = false;//во временных блоках заголовок из бд, иначе - что в верстке




    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
//            //понадобиться отключить CSRF-проверку Yii2 для OpenID callbacks
//            'eauth' => [
//                // required to disable csrf validation on OpenID requests
//                'class' => \nodge\eauth\openid\ControllerBehavior::className(),
//                'only' => ['login'],
//            ],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
      //общий для всех тайтл
        Yii::$app->view->title = Yii::$app->name." ";

        //временное сохранение данных категории для заполнения сайдбара и центральных блоков данными 1 категории блога
        $this->oneCatBlog = \app\models\BlogCategorisTable::find()->where(['id' => 1])->one();



      return parent::beforeAction($action);
    }



}


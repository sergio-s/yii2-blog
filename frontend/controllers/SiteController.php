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
use rmrevin\yii\ulogin\AuthAction;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends BaseFront
{

   /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            //понадобиться отключить CSRF-проверку Yii2 для OpenID callbacks
//            'eauth' => [
//                // required to disable csrf validation on OpenID requests
//                'class' => \nodge\eauth\openid\ControllerBehavior::className(),
//                'only' => ['login'],
//            ],
//        ];
//    }


    // rmrevin/yii2-ulogin виджет отключеаем enableCsrfValidation
    public function beforeAction($action)
    {
        if ($this->action->id == 'ulogin-auth')
        {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);

    }

    public function actions()
    {
        return [
            // rmrevin/yii2-ulogin виджет
            'ulogin-auth' => [
                'class' => AuthAction::className(),
                'successCallback' => [$this, 'uloginSuccessCallback'],
                'errorCallback' => function($data){
                    \Yii::error($data['error']);
                },
            ],

//            'index' =>[
//
//            ]
        ];
    }

    // rmrevin/yii2-ulogin виджет
    public function uloginSuccessCallback($attributes)
    {

//        print_r(\Yii::$app->user->identity->uloginUser[0]->last_name);die;

        $uLoginModel = new \common\models\ulogin\UloginModel();
        if($uLoginModel->uLogin($attributes))
        {
            //print_r(\Yii::$app->user->identity->username);
            //return $this->goHome();
            if($uLoginModel->login()){

                //сессия хранит адрес формы комментариев, из виджета комментариев для редиректа после входа на форму
                $this->goReferer(Yii::$app->session['goReferer']['comments']['url']);

            }

        }
        else
        {
            //throw new Exception('Вход не удался');
            return $this->goBack();
        }


    }




    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //передаем тайтл
        Yii::$app->view->title .= '- интернет журнал';
        $this->slider = true;//включаем слайдер

        return $this->render('index',[
                                        //'title_meta' =>     $page->title_meta,
                                        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
//    public function actionLogin()
//    {
//        //передаем тайтл
//        Yii::$app->view->title .= ': вход на сайт';
//
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
//    }



    public function actionLogin()
    {
        // встроеннаа авторизация в yii2 по умолчанию размещается ниже
        //передаем тайтл
        Yii::$app->view->title .= ': вход на сайт';


        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        //передаем тайтл
        Yii::$app->view->title .= ': контакты';

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        //передаем тайтл
        Yii::$app->view->title .= ': информация';

        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        //передаем тайтл
        Yii::$app->view->title .= ': регистрация';

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

       /**
     *@return mixed
     *  обработка формы отправки почты из формы подписки
     */
//    public function actionSubscription()
//    {
//
//    $model = new MyModel();
//    if ($this->modelSubscription->load(Yii::$app->request->post()) && $model->save()) {
//        if (!Yii::$app->request->isPjax) {
////            return $this->redirect(['view', 'id' => $model->id]);
//            return $this->redirect(Yii::$app->request->referrer);
//        }
//    }
//
//    return $this->render('create', [
//        'model' => $model,
//    ]);
//
//    }

    private function goReferer($session){
        if(!empty($session)){
            return $this->redirect($session);
        }
        else
        {
            return $this->redirect(Yii::$app->request->referrer);
        }
    }


}

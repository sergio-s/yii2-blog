<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\components\rbac\rbacRoles;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class SiteController extends BaseAdmin
{
   public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (\Yii::$app->user->can(rbacRoles::ROLE_ADMIN)) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        //return $this->goHome();
        return Yii::$app->getResponse()->redirect(Yii::$app->urlManagerFrontend->createUrl(['/']));
    }
}

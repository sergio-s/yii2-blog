<?php
namespace common\widgets\subscription;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use \yii\web\View;



class SubscriptionWidget extends Widget
{

    public $widget_id;//нужен для пердачи уникального id в pjax


    public function init()
    {
        parent::init();

        if($this->widget_id === NULL)
        {
            throw new \ErrorException('Не установлен id виджета подписка .');
        }

    }

    public function run()
    {
            $model = new \app\models\Subscription();


            if ($model->load(Yii::$app->request->post())) {
                //если email который пришол с формы уже зарегестрирован у пользователя, получаем id пользователя
                if($user = \common\models\User::findByEmail($model->email))
                {
                   $model->id_user = $user->id;
                }
                //устанавливаем дату отправки формы
                $model->actionDate = new \yii\db\Expression('NOW()');

                if($model->validate())
                {
                    if($model->save())
                    {
                        //отправляем сообщение об успешном сохранении
                        Yii::$app->session->setFlash('Subscription', 'Ваш email успешно зарегестрирован');

                        //обнуляем модель, чтобы очистить форму, т.к. с редирект pjax не работает
                        $model = new \app\models\Subscription();
//                        $model->id_user = null;
//                        $model->email = null;
//                        $model->actionDate = null;
                    }

                }
                else
                {
                    //отправляем сообщение об ошибке
                    Yii::$app->session->setFlash('Subscription_error', 'Произошла ошибка, повторите еще раз!');
                }

            }

            return $this->render('subscription_view', [
                'model' => $model,
                'widget_id' => $this->widget_id,
            ]);

    }

}
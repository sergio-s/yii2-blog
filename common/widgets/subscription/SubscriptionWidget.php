<?php
namespace common\widgets\subscription;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
//use app\models\subscription\Subscription;

/**
 * Виджет выводит формы регистрации email в 3х видах оформления
 */

class SubscriptionWidget extends Widget
{

    public $widget_id;//нужен для пердачи уникального id в pjax
    public $wView;
    public $modelName;

    public function init()
    {
        parent::init();

        if($this->widget_id === NULL)
        {
            throw new \ErrorException('Не установлен id виджета подписка .');
        }

//        if ($this->wView === NULL) {
//            $this->wView = 'sidebar';
//        }

        if (!in_array($this->wView, ['sidebar', 'header', 'footer', 'index'])) {
            throw new InvalidConfigException('Invalid view type: ' . $this->wView);
        }

        if($this->modelName === NULL)
        {
            throw new \ErrorException('Не установлен modelName виджета подписка .');
        }

        //var_dump($this->model);die;
    }

    public function run()
    {
            $namespace = "\app\models\subscription\\";
            $className = $namespace.$this->modelName;
            $model = new $className();


            if ($model->load(Yii::$app->request->post()) ) {
                //если email который пришол с формы уже зарегестрирован у пользователя, получаем id пользователя
                $model->email = trim($model->email);

                if($user = \common\models\User::findByEmail($model->email))
                {
                   $model->id_user = $user->id;
                }
                //устанавливаем дату отправки формы
                $model->actionDate = new \yii\db\Expression('NOW()');

                if($model->validate() and $model->save())
                {

                    //Yii::$app->response->redirect()->send();
                    //обнуляем модель, чтобы очистить форму, т.к. с редирект pjax не работает
                    $model = new $className(); //reset model

//                    if(Yii::$app->getRequest()->getIsPjax()) {
//                        $model = new Subscription();
//                    }

                    //отправляем сообщение об успешном сохранении
                    //$this->widget_id - имя сессии
                    Yii::$app->session->setFlash($this->widget_id, 'Ваш email успешно зарегестрирован');





                }
            }

            //var_dump($className);
            return $this->render($this->wView, [
                'model' => $model,
                'widget_id' => $this->widget_id,
            ]);

    }

}
<?php
namespace common\widgets\likes;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\models\likes\Likes;


/**
 * Виджет комментариев
 */

class LikesWidget extends Widget
{

    /**
     * @var string|null
     */
    public $userIdentityClass = null;

    public $materialType;

    public $materialId;

    protected $pjaxContainerId;

    protected $widgetId;

    public function init()
    {
        parent::init();


        if ($this->materialType === NULL) {
            throw new InvalidConfigException('In :'.__CLASS__.' Not set: ' . $this->materialType);
        }

        if ($this->materialId === NULL || !is_numeric($this->materialId)) {
            throw new InvalidConfigException('In :'.__CLASS__.' Not set: ' . $this->materialId);
        }

        if ($this->userIdentityClass === null) {
            $this->userIdentityClass = Yii::$app->getUser()->identityClass;// по умолчанию common\models\User
        }

        $this->widgetId = $this->getId();

        //генерация уникального id для pjax
        $this->pjaxContainerId = 'comment-pjax-container-' . $this->widgetId;



    }

    public function run()
    {
        $likesModel = new Likes();

        if (Yii::$app->request->post('like')) {
            if(!Yii::$app->user->isGuest){
                //есть ли у данного пользователя лайк к этому материалу

                $userLike = Likes::find()
                                ->userLikes()
                                ->andWhere(['materialType' => $this->materialType,'materialId' => $this->materialId])
                                ->count();

                if($userLike){
                    Yii::$app->session->setFlash($this->widgetId, "Вы (".Yii::$app->user->identity->username.") уже поставили лайк для данного материала.");
                    goto clear;
                }
                $likesModel->materialType = $this->materialType;
                $likesModel->materialId = $this->materialId;
                if($likesModel->save()){
                    $likesModel = new Likes();
                }
            }else{
                Yii::$app->session->setFlash($this->widgetId, 'Поставить лайк могут только зарегестрированные пользователи.');
            }
            clear:
            $post = Yii::$app->request->post('like');
            $post = null;
        }

        $likeTotal = Likes::find()
                ->where(['materialType' => $this->materialType,'materialId' => $this->materialId])
                ->count();

        return $this->render('index', [
                                        'pjaxContainerId' => $this->pjaxContainerId,
                                        'likeTotal' => $likeTotal,
                                        'widgetId' => $this->widgetId,


        ]);

    }





}
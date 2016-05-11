<?php
namespace common\widgets\comments;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use frontend\assets\CommentAsset;
use common\models\comments\CommentForm;
use common\models\comments\Comments;


/**
 * Виджет комментариев
 */

class CommentsWidget extends Widget
{

    /**
     * @var string comment form id
     */
    public $formId = 'comment-form';

    /**
     * @var string|null
     */
    public $userIdentityClass = null;

    public $materialType;

    public $materialId;

    public $lastInsertID = NULL;

    /**
     * @var null|integer maximum comments level, level starts from 1, null - unlimited level;
     */
    public $maxLevel = 7;

    /**
     * @var string pjax container id, generated automatically
     */
    protected $pjaxContainerId;

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

        //генерация уникального id для pjax
        $this->pjaxContainerId = 'comment-pjax-container-' . $this->getId();

        $this->registerAssets();

        //запись текущей ссылки с якорем на форму, для переброски на нее после логина для возможности комментировать
        Yii::$app->session['goReferer'] = [
            'comments' => [
                //'url' => Url::to(''). '#'. $this->formId,
                'url' => Url::to(''),
                'lifetime' => 3600,
            ]

        ];
//        echo $session['comments']['url'];die;
    }

    public function run()
    {


        $commentForm = new CommentForm();
        $commentForm->materialType = $this->materialType;
        $commentForm->materialId = $this->materialId;

        $commentModelClass = new Comments();


        if ($commentForm->load(Yii::$app->request->post()) && $commentForm->validate()) {

            $commentModelClass->materialType = $this->materialType;
            $commentModelClass->materialId = (int)$this->materialId;

            $commentModelClass->parentId = (int)$commentForm->parentId;
            $commentModelClass->message = $commentForm->message;

            $commentModelClass->status = 1;

            if($commentModelClass->validate() && $commentModelClass->save())
            {
                $this->lastInsertID = $commentModelClass->id;
                $commentModelClass = new Comments(); //reset model
                $commentForm = new CommentForm();
//var_dump($commentModelClass->materialId);die;
                Yii::$app->session->setFlash($this->formId, 'Комментарий опубликован');
            }


        }

        $comments = $commentModelClass::getTree($this->materialType, $this->materialId);
        //$clone = clone $comments;//клон всех комментов
        //$totalCount = $clone->count();//кол-во всех комментов
        $totalCount = $commentModelClass::getCount($this->materialType, $this->materialId);

        return $this->render('index', [
                                        'formId' => $this->formId,
                                        'pjaxContainerId' => $this->pjaxContainerId,
                                        'commentForm' => $commentForm,
                                        'comments' => $comments,
                                        'maxLevel' => $this->maxLevel,
                                        'totalCount' => $totalCount,
                                        'lastInsertID' => $this->lastInsertID,

        ]);

    }

    /**
     * Register assets.
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        CommentAsset::register($view);
    }




}
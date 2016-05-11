<?php

namespace common\models\comments;

use Yii;
use common\components\behaviors\PurifyBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "comments".
 *
 * @property string $id
 * @property string $materialType
 * @property string $materialId
 * @property string $autorId
 * @property string $parentId
 * @property string $createdDate
 * @property string $message
 * @property integer $level
 * @property integer $	status
 */
class Comments extends \yii\db\ActiveRecord
{

    //типы контента, к которым относятся комментарии
    //нужны для отношения комментариев к оприделенным таблицам
    const TYPE_BLOGPOST = "blog_post";
    const ACTIVE = 1;//соотносится с полем status = 1 в таблице comments бд
    const DISABLED = 0;//соотносится с полем status = 0 в таблице comments бд

    /**
     * @return array
     */
    public static function getStatusList(){
        return[
            self::ACTIVE => 'Active',
            self::DISABLED => 'Disabled'//отключен
        ];
    }




    protected $_children;

    public $userIdentityClass = null;

    public function init()
    {
        parent::init();

        if ($this->userIdentityClass === null) {
            $this->userIdentityClass = Yii::$app->getUser()->identityClass;// по умолчанию common\models\User
        }

    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['materialType', 'materialId', 'autorId', 'createdDate', 'message'], 'required'],
//            [['materialId', 'autorId', 'parentId', 'status'], 'integer'],
//            [['createdDate', 'level'], 'safe'],
//            [['message'], 'string'],
//            [['materialType'], 'string', 'max' => 255],

            [['materialType','materialId','autorId','parentId','level', 'createdDate', 'message', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'materialType' => 'Тип контента, который прокомментировали (пост блока или страница сайта). От этого значения зависит, к какому виду материалов относится materialId. Если materialType = \'blogPost\', то используется id поста из таблицы постов.blog_posts_table',
            'materialId' => 'id материала, который прокомментировали (поста в блоге или страницы сайта)',
            'autorId' => 'id зарегестрированного пользователя из таблицы users или id гостя из таблицы guests, в зависимости от того, какое значение передано в isGuest (1 - гость, 0-зарегестрированный))',
            'parentId' => 'id комментария, на который отвечает данный комментарий',
            'createdDate' => 'Created Date',
            'message' => 'message',
            'status' => '1- опубликовано, 0 - не опубликовано',
            'level' => 'уровень вложенности',
        ];
    }

    /**
     * @inheritdoc
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }


        /**
     * Returns a list of behaviors that this component should behave as.
     * @return array
     */
    public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'autorId',
                'updatedByAttribute' => 'updaterId',
            ],
            'timestamp' => [//Использование поведения TimestampBehavior ActiveRecord
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['createdDate'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => false,

                ],
                'value' => new \yii\db\Expression('NOW()'),

            ],
            'purify' => [
                'class' => PurifyBehavior::className(),
                'attributes' => ['message']
            ]
        ];
    }



    /**
     * This method is called at the beginning of inserting or updating a record.
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->parentId > 0) {
                $parentNodeLevel = (int)self::find()->select('level')->where(['id' => $this->parentId])->scalar();
                $this->level = $parentNodeLevel + 1;
            }
            return true;
        } else {
            return false;
        }
    }

        /**
     * Build comments tree.
     *
     * @param array $data Records array
     * @param int $rootID parentId Root ID
     * @return array|ActiveRecord[] Comments tree
     */
    protected static function buildTree(&$data, $rootID = 0)
    {
        $tree = [];
        foreach ($data as $id => $node) {
            if ($node->parentId == $rootID) {
                unset($data[$id]);
                $node->children = self::buildTree($data, $node->id);
                $tree[] = $node;
            }
        }
        return $tree;
    }

    public static function getTree($materialType, $materialId, $maxLevel = null)
    {
        $query = self::find()->where(['materialType' => $materialType,'materialId' => $materialId,])->with(['author.userSignupSocData']);//UserSignupSocData из class User - getUserSignupSocData()

        if ($maxLevel > 0) {
            $query->andWhere(['<=', 'level', $maxLevel]);
        }

        $models = $query->orderBy(['parentId' => SORT_ASC, 'createdDate' => SORT_ASC])->all();

        if (!empty($models)) {
            $models = self::buildTree($models);
        }
        return $models;
    }


    public static function getCount($materialType, $materialId, $maxLevel = null)
    {
        $query = self::find()->where(['materialType' => $materialType,'materialId' => $materialId]);

        if ($maxLevel > 0) {
            $query->andWhere(['<=', 'level', $maxLevel]);
        }

        return $query->count();
    }


        /**
     * Author relation
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne($this->userIdentityClass, ['id' => 'autorId']);
    }

    /**
     * @return null|array|ActiveRecord[] Comment children
     */
    public function getChildren()
    {
        return $this->_children;
    }
    /**
     * $_children setter.
     *
     * @param array|ActiveRecord[] $value Comment children
     */
    public function setChildren($value)
    {
        $this->_children = $value;
    }

    /**
     * Check if comment has children comment
     * @return bool
     */
    public function hasChildren()
    {
        return !empty($this->_children) ? true : false;
    }


    /**
     * @return boolean Если комментарий активен
     */
    public function getIsActive()
    {
        return $this->status === self::ACTIVE;
    }


    /**
     * @return boolean Если комментарий отключен
     */
    public function getIsDisabled()
    {
        return $this->status === self::DISABLED;
    }

    /**
    * Get author name
    * @return mixed
    * из таблицы user
    */
    public function getAuthorName()
    {
        return $this->author->username;
    }

    /**
    * Get comment posted date as relative time
    * @return string
    */
    public function getPostedDate($format = 'asDatetime')
    {
//        var_dump(Yii::$app->formatter->timeZone);die;
//         var_dump(Yii::$app->formatter->asDatetime($this->createdDate, 'medium'));die;
        Yii::$app->formatter->timeZone = 'UTC';
        switch ($format) {

            case 'asRelativeTime' :
                $date = Yii::$app->formatter->asRelativeTime($this->createdDate);
                break;

            case 'asDatetime' :
                $date = Yii::$app->formatter->asDatetime($this->createdDate, 'php:l d F Y - H:i:s');
                break;
        }

        return $date;
    }

        /**
     * Get comment content
     * @param string $deletedCommentText
     * @return string
     */
    public function getMessage($disabledCommentText = 'Комментарий отключен.')
    {
        return $this->isDisabled ? $deletedCommentText : Yii::$app->formatter->asNtext($this->message);
    }

    /**
    * Get avatar user
    * @param array $imgOptions
    * @return string
    */
    public function getAvatar($imgOptions = [])
    {
        $imgOptions = ArrayHelper::merge($imgOptions, ['class' => 'img-responsive commentAvatar']);

        if($this->author->avatar != NULL){
            return Html::img($this->author->avatar, $imgOptions);
        }
        else{
            return Html::img('@noAvatar', $imgOptions);
        }




    }


}

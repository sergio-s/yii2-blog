<?php
namespace common\models\comments;


use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $message;
    public $parentId;
    public $materialType;
    public $materialId;

    //public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'materialType', 'materialId'], 'required'],
            ['parentId', 'validateParentID'],

//            [['message', 'captcha'], 'required'],
//            ['captcha', 'captcha'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message' => 'Комментарий',
        ];
    }


        /**
     * Validate parentId attribute
     * @param $attribute
     */
    public function validateParentID($attribute)
    {
        if ($this->{$attribute} !== null) {
            $comment = Comments::find()->where(['id' => $this->{$attribute}, 'materialType' => $this->materialType, 'materialId' => $this->materialId])->active()->exists();
            if ($comment === false) {
                $this->addError('message', 'Что-то пошло не так. Повторите еще раз.');
            }
        }
    }

}
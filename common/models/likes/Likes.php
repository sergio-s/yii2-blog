<?php

namespace common\models\likes;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "likes".
 *
 * @property string $id
 * @property string $materialType
 * @property string $materialId
 * @property string $userId
 * @property string $likeDate
 *
 */
class Likes extends \yii\db\ActiveRecord
{

    const TYPE_BLOGPOST = "blog_post";
    const TYPE_GEOINSTITUTIONS = "geo_institutions";

    public static function getMaterialType(){
        return[
            self::TYPE_BLOGPOST => 'Статьи блога',
            self::TYPE_GEOINSTITUTIONS => 'Карточка роддома',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'likes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['materialType', 'materialId', 'userId', 'likeDate'], 'safe'],
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
            'userId' => 'id зарегестрированного пользователя из таблицы users ',
            'likeDate' => 'Like Date',
        ];
    }

        public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::className(),//устанавливаем id юзера
                'createdByAttribute' => 'userId',
                'updatedByAttribute' => null,
            ],
            'timestamp' => [//Использование поведения TimestampBehavior ActiveRecord
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['likeDate'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => null,

                ],
                'value' => new \yii\db\Expression('NOW()'),

            ],
        ];
    }


    /**
     * @inheritdoc
     * @return LikesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LikesQuery(get_called_class());
    }
}

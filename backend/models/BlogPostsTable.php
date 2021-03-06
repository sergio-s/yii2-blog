<?php

namespace backend\models;

use Yii;
use common\components\behaviors\PurifyBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use app\models\authors\Authors;

/**
 * This is the model class for table "blog_posts_table".
 *
 * @property string $id
 * @property string $alias
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $h1
 * @property string $img
 * @property string $alt
 * @property string $content
 * @property string $createdDate
 * @property string $updatedDate
 * @property int    $autorId
 * @property int    $updaterId
 *
 * @property BlogCategorisPostsTable[] $blogCategorisPostsTables
 */
class BlogPostsTable extends \yii\db\ActiveRecord
{
    public $category_id;
    public $writer_id;//назначенный писатель (автор),т.е. не тот, кто создал, а назначенный автор в орме добавления поста
    public $file;//загружаемое изображение
//    public $del_img;//удаляемое изображение

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_posts_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'description', 'h1'], 'required'],
            [['content'], 'string'],
            [['createdDate','updatedDate','autorId','updaterId'], 'safe'],
            [['alias', 'title', 'description', 'h1', 'keywords', 'img', 'alt'], 'string', 'max' => 255],
            [['category_id', 'alt', 'writer_id'], 'safe'],//id категории для промежуточной таблицы связей

            //валидация картинки из формы
//            [['file'],  'safe'],
//            [['file'], 'image',
//                'extensions' => 'jpg, gif, png',
//                'maxSize' => 500 * 1024 * 3 , 'tooBig' => 'Слишком большое. Лимит - 1500KB',
//                'minWidth' => 1200, 'underWidth' => 'Слишком маленькая ширина, минимум - 1200px',
//                'minHeight' => 864, 'underHeight' => 'Слишком маленькая высота, минимум - 864px',
//            ],

        ];
    }

//    public function rules()
//    {
//        return [
//            [['parentId'], 'integer'],
//            [['status', 'isPrivate', 'canComment'], 'string'],
//            [['alias', 'title_meta', 'description', 'h1', 'content', 'workData'], 'required'],
//            [['alias', 'title_meta', 'description', 'keywords', 'h1', 'imgSrc', 'createdBy'], 'string', 'max' => 255],
//            [['alias', 'title_meta', 'description', 'keywords', 'h1'], 'trim'],
//            [['alias'], 'unique', 'message' => 'Алиас должен быть уникальным.'],
//            [['title_meta'], 'unique', 'message' => 'title должен быть уникальным.'],
//            [['h1'], 'unique', 'message' => 'h1 должен быть уникальным.'],
//            [['file','imgTitle', 'imgAlt', 'parents_name', 'contentbeforeimg'], 'safe'],
//            [['workData'], 'date', 'format' => 'yyyy-MM-dd'],
//
//            [['file'], 'file', 'extensions'=>'jpg, gif, png'],
//            //[['file'], 'file', 'skipOnEmpty' => false, 'checkExtensionByMimeType' => false, 'extensions' => 'gif, jpg,jpeg, png', 'mimeTypes' => 'image/gif, image/jpeg, image/png'],
//        ];
//    }





    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Алиас',
            'title' => 'title',
            'description' => 'description',
            'keywords' => 'keywords',
            'h1' => 'H1',
            'content' => 'Контент',
            'createdDate' => 'Дата создания',
            'updatedDate' => 'Дата обновления',
            'autorId' => 'Создал',
            'updaterId' => 'Редактор',

            'category_id' => 'Выбрать (изменить) категорию',
            'file' => 'Загрузка изображения',
            'alt' => 'alt изображения',
            'writer_id' => 'Установленный автор',//не создатель материала
        ];
    }

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
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updatedDate'],

                ],
                'value' => new \yii\db\Expression('NOW()'),

            ],
//            'purify' => [
//                'class' => PurifyBehavior::className(),
//                'attributes' => ['message']
//            ]
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategorisPostsTables()
    {
        return $this->hasMany(BlogCategorisPostsTable::className(), ['id_post' => 'id']);
    }

    //получаем связанные назначенных авторов
    public function getWriters()
    {
        return $this->hasMany(Authors::className(), ['id' => 'id_author'])
                ->viaTable('authors_posts', ['id_post' => 'id']);
    }

    public function getWriter()
    {
        return $this->getWriters()->one();
    }

     //получаем автора
    public function getWriterFullName()
    {
        return $this->writer->first_name.' '.$this->writer->last_name;
    }

        //получаем все категории, к которым принадлежит пост
    public function getParentCategoris()
    {
        return $this->hasMany(BlogCategorisTable::className(), ['id' => 'id_category'])->viaTable('blog_categoris_posts_table', ['id_post' => 'id']);
    }

}

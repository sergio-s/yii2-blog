<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "blog_posts_table".
 *
 * @property string $id
 * @property string $alias
 * @property string $title
 * @property string $description
 * @property string $h1
 * @property string $content
 * @property string $createdDate
 *
 * @property BlogCategorisPostsTable[] $blogCategorisPostsTables
 */
class BlogPostsTable extends \yii\db\ActiveRecord
{
    public $category_id;
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
            [['createdDate'], 'safe'],
            [['alias', 'title', 'description', 'h1', 'img'], 'string', 'max' => 255],
            [['category_id'], 'safe'],//id категории для промежуточной таблицы связей

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
            'title' => 'Тайтл',
            'description' => 'Краткое описание',
            'h1' => 'H1',
            'content' => 'Контент',
            'createdDate' => 'Дата создания',
            'category_id' => 'Выбрать (изменить) категорию',
            'file' => 'Загрузка изображения'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategorisPostsTables()
    {
        return $this->hasMany(BlogCategorisPostsTable::className(), ['id_post' => 'id']);
    }

        //получаем все категории, к которым принадлежит пост
    public function getParentCategoris()
    {
        return $this->hasMany(BlogCategorisTable::className(), ['id' => 'id_category'])->viaTable('blog_categoris_posts_table', ['id_post' => 'id']);
    }

}

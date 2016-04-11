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
            [['alias', 'title', 'description', 'h1'], 'string', 'max' => 255],
            [['category_id'], 'safe'],//id категории для промежуточной таблицы связей
        ];
    }

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
            'category_id' => 'Категория',
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

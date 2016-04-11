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
            'alias' => 'Alias',
            'title' => 'Title',
            'description' => 'Description',
            'h1' => 'H1',
            'content' => 'Content',
            'createdDate' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategorisPostsTables()
    {
        return $this->hasMany(BlogCategorisPostsTable::className(), ['id_post' => 'id']);
    }
}

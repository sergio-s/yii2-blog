<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_posts_table".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $description
 * @property string $h1
 * @property string $content
 * @property string $createdDate
 */
class BlogPostsTable extends \yii\db\ActiveRecord
{
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
            [['alias', 'title', 'description', 'h1'], 'string', 'max' => 255]
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
}

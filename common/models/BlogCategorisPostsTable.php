<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog_categoris_posts_table".
 *
 * @property string $id
 * @property string $id_post
 * @property string $id_category
 */
class BlogCategorisPostsTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_categoris_posts_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post', 'id_category'], 'required'],
            [['id_post', 'id_category'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_post' => 'Id Post',
            'id_category' => 'Id Category',
        ];
    }
}

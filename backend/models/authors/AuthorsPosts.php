<?php

namespace app\models\authors;

use Yii;
use backend\models\BlogPostsTable;
use app\models\authors\Authors;
/**
 * This is the model class for table "authors_posts".
 *
 * @property string $1
 * @property string $id_author
 * @property string $id_post
 *
 * @property Authors $idAuthor
 * @property BlogPostsTable $idPost
 */
class AuthorsPosts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_author', 'id_post'], 'required'],
            [['id_author', 'id_post'], 'integer'],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['id_author' => 'id']],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => BlogPostsTable::className(), 'targetAttribute' => ['id_post' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '1' => '1',
            'id_author' => 'Id Author',
            'id_post' => 'Id Post',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'id_author']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPost()
    {
        return $this->hasOne(BlogPostsTable::className(), ['id' => 'id_post']);
    }
}

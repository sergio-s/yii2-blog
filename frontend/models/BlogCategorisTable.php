<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_categoris_table".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $descriptions
 */
class BlogCategorisTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_categoris_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'descriptions'], 'required'],
            [['descriptions'], 'string'],
            [['alias', 'title'], 'string', 'max' => 255]
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
            'descriptions' => 'Descriptions',
        ];
    }

    //получение всех категорий
    public static function getAllCategorisPosts($sort = SORT_ASC)
    {

        $obj = self::find()
                        ->orderBy([
                                'id'=>$sort,
                                 ])->all();

        return $obj;

    }

    //получаем все посты данной категории. Вызов $obj->PostsFromCategory
    public function getPostsFromCategory()
    {
        $res = $this->hasMany(BlogPostsTable::className(), ['id' => 'id_post'])->viaTable('blog_categoris_posts_table', ['id_category' => 'id']);
        $res->orderBy([
                                'createdDate'=> SORT_DESC,//от новых к старым
                                 ])->all();
        return $res;
    }

    //получаем данные одной категории.
    public static function getOneCategory($alias)
    {
        return self::find()->where([   'alias' => $alias,
                                        //'status' => '1'
                                        ])
                                        ->one();
    }

}

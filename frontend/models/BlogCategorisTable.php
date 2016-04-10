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
}

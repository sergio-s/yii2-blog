<?php

namespace app\models\authors;

use Yii;
use backend\models\BlogPostsTable;

/**
 * This is the model class for table "authors".
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $description
 * @property string $img
 *
 * @property AuthorsPosts[] $authorsPosts
 */
class Authors extends \yii\db\ActiveRecord
{

    public $file;//загружаемое изображение

    const SCENARIO_UPDATE = 'update';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'description', 'img'], 'required'],
            [['description'], 'string'],
            [['first_name', 'last_name', 'img'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_UPDATE] = [
            'first_name',
            'last_name',
            'description',

                                    ];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилимя',
            'description' => 'Краткое описание',
            'img' => 'Картинка',
            'file' => 'Загрузка изображения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorsPosts()
    {
        return $this->hasMany(AuthorsPosts::className(), ['id_author' => 'id']);
    }

    //получаем связанные посты
    public function getPosts()
    {
        return $this->hasMany(BlogPostsTable::className(), ['id' => 'id_post'])
                ->viaTable('authors_posts', ['id_author' => 'id']);
    }

    //получаем автора
    public function getAuthorFullName()
    {
        $fullName = $this->first_name.' '.$this->last_name;
        return strip_tags(trim($fullName));
    }

    /**
     * @inheritdoc
     * @return AuthorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AuthorsQuery(get_called_class());
    }
}

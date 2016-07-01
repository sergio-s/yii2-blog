<?php

namespace app\models\wiki;

use Yii;

/**
 * This is the model class for table "wiki_letters".
 *
 * @property string $id
 * @property string $alias
 * @property string $letter
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $h1
 * @property string $createdDate
 * @property string $updatedDate
 * @property integer $autorId
 * @property integer $updaterId
 *
 * @property WikiTerms[] $wikiTerms
 */
class WikiLetters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wiki_letters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'letter', 'title', 'description', 'h1'], 'required'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['autorId', 'updaterId'], 'integer'],
            [['alias', 'title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
            [['letter'], 'string', 'max' => 10],
            [['letter'], 'unique'],
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
            'letter' => 'Letter',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'h1' => 'H1',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
            'autorId' => 'Autor ID',
            'updaterId' => 'Updater ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWikiTerms()
    {
        return $this->hasMany(WikiTerms::className(), ['id_letter' => 'id']);
    }

    /**
     * @inheritdoc
     * @return WikiLettersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WikiLettersQuery(get_called_class());
    }
}

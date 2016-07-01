<?php

namespace backend\models\wiki;

use Yii;
use common\components\behaviors\PurifyBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

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
class AdminWikiLetters extends \yii\db\ActiveRecord
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
            [['letter', 'title', 'description', 'h1'], 'required'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['autorId', 'updaterId'], 'integer'],
            [['title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
            [['letter'], 'string', 'max' => 1],
            [['alias'], 'safe'],//'safe' т.к. заполняется в можели автоматически из поля letter
            [['letter'], 'unique','targetAttribute' => ['letter'], 'message' => 'Такая буква уже была добавлена ранее.'],
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
            'letter' => 'Буква (верх. регистр)',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'h1' => 'H1',
            'createdDate' => 'Дата создания',
            'updatedDate' => 'Дата обновления',
            'autorId' => 'Автор',
            'updaterId' => 'Редактор',
        ];
    }

    public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'autorId',
                'updatedByAttribute' => 'updaterId',
            ],
            'timestamp' => [//Использование поведения TimestampBehavior ActiveRecord
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['createdDate'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updatedDate'],

                ],
                'value' => new \yii\db\Expression('NOW()'),

            ],
//            'purify' => [
//                'class' => PurifyBehavior::className(),
//                'attributes' => ['message']
//            ]
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->alias = $this->letter;
            return true;
        } else {
            return false;
        }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWikiTerms()
    {
        return $this->hasMany(AdminWikiTerms::className(), ['id_letter' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AdminWikiLettersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdminWikiLettersQuery(get_called_class());
    }
}

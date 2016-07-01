<?php

namespace backend\models\wiki;

use Yii;
use common\components\behaviors\PurifyBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "wiki_terms".
 *
 * @property string $id
 * @property string $id_letter
 * @property string $alias
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $h1
 * @property string $content
 * @property string $createdDate
 * @property string $updatedDate
 * @property integer $autorId
 * @property integer $updaterId
 *
 * @property WikiLetters $idLetter
 */
class AdminWikiTerms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wiki_terms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_letter', 'alias', 'title', 'description', 'h1'], 'required'],
            [['id_letter', 'autorId', 'updaterId'], 'integer'],
            [['content'], 'string'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['alias', 'title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
            [['id_letter'], 'exist', 'skipOnError' => true, 'targetClass' => AdminWikiLetters::className(), 'targetAttribute' => ['id_letter' => 'id']],
            [['alias'], 'unique','targetAttribute' => ['alias'], 'message' => 'Такой alias уже есть. alias должен быть уникальным.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_letter' => 'Id Letter',
            'alias' => 'Alias',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'h1' => 'H1',
            'content' => 'Контент',
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLetter()
    {
        return $this->hasOne(AdminWikiLetters::className(), ['id' => 'id_letter']);
    }

    /**
     * @inheritdoc
     * @return AdminWikiTermsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdminWikiTermsQuery(get_called_class());
    }
}

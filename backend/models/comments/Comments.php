<?php

namespace backend\models\comments;

use Yii;
use common\components\behaviors\PurifyBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "comments".
 *
 * @property string $id
 * @property string $materialType
 * @property string $materialId
 * @property string $autorId
 * @property string $updaterId
 * @property string $parentId
 * @property integer $level
 * @property string $createdDate
 * @property string $message
 * @property integer $status
 */
class Comments extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DELITE = 'delite';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['materialType', 'materialId', 'autorId', 'updaterId', 'message'], 'required'],
            [['materialId', 'autorId', 'updaterId', 'parentId', 'level', 'status'], 'integer'],
            [['createdDate', 'updatedDate',], 'safe'],
            [['message'], 'string'],
            [['materialType'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_CREATE] = [
                                        'materialType',
                                        'materialId',
                                        'autorId',
                                        //'updaterId',
                                        'parentId',
                                        'level',
                                        'createdDate',
                                        'updatedDate',
                                        'message',
                                        'status',
                                    ];
        $scenarios[self::SCENARIO_UPDATE] = [
        //                              //'materialType',
                                        //'materialId',
                                        //'autorId',
                                        'updaterId',
                                        //'parentId',
                                        //'level',
                                        //'createdDate',
                                        'updatedDate',
                                        'message',
                                        'status',
                                    ];
        $scenarios[self::SCENARIO_DELITE] = [
        //                              //'materialType',
                                        //'materialId',
                                        //'autorId',
                                        //'updaterId',
                                        'parentId',
                                        'level',
                                        //'createdDate',
                                        //'updatedDate',
                                        //'message',
                                        //'status',
                                    ];


        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID комментария',
            'materialType' => 'Тип контента',
            'materialId' => 'id материала',
            'autorId' => 'Кто создал',
            'updaterId' => 'Кто редактировал',
            'parentId' => 'id отвеченного комментария',
            'level' => 'уровень вложенности коментария',
            'createdDate' => 'Дата создания',
            'updatedDate' => 'Дата обновления',
            'message' => 'Комментарий',
            'status' => 'статус публикации',
        ];
    }


    /**
     * Returns a list of behaviors that this component should behave as.
     * @return array
     */
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
            'purify' => [
                'class' => PurifyBehavior::className(),
                'attributes' => ['message']
            ]
        ];
    }


//    public function afterDelete()
//    {
//        $this->log->type = self::ACTION_DELETE;
//        $this->log->record = json_encode($this->attributes,JSON_UNESCAPED_UNICODE);
//        $this->log->save();
//        parent::afterDelete();
//    }



    /**
     * @inheritdoc
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }

    //получаем связанный материал по виду materialType
    public function getMaterial()
    {
        if($this->materialType == \common\models\comments\Comments::TYPE_BLOGPOST){
            return $this->hasOne(\common\models\BlogPostsTable::className(), ['id' => 'materialId']);
        }
        elseif($this->materialType == \common\models\comments\Comments::TYPE_GEOINSTITUTIONS){
            return $this->hasOne(\backend\models\geo\GeoInstitutions::className(), ['id' => 'materialId']);
        }
        return false;
    }

}

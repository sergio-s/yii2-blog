<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscription".
 *
 * @property integer $id
 * @property string $id_user
 * @property string $email
 * @property string $actionDate
 */
class Subscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['email', 'unique'],
            ['email', 'email'],
            [['id_user'], 'safe'],
            [['actionDate'], 'safe'],
            [['actionDate', 'email'], 'required'],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'id зарегестрированного пользователя, который оформил подписку, или null если гость оформил подписку'),
            'email' => Yii::t('app', 'Email'),
            'actionDate' => Yii::t('app', 'Action Date'),
        ];
    }
}

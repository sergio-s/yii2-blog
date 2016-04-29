<?php

namespace app\models\subscription;

use Yii;

/**
 * This is the model class for table "subscription".
 *
 * @property integer $id
 * @property string $id_user
 * @property string $email
 * @property string $actionDate
 */
class SubscriptionFooter extends \yii\db\ActiveRecord
{

    public $checkbox;

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


            [['id_user','actionDate'], 'safe'],
            [['actionDate', 'email'], 'required'],
            //правило для чекбокса
//            ['checkbox', 'required', 'on' => ['register'], 'requiredValue' => 1, 'message' => 'Нужно согласиться с правилами'],
            ['checkbox', 'required', 'requiredValue' => 1, 'message' => 'Нужно согласиться с правилами'],
            ['email', 'email'],
            ['email', 'unique', 'message' => 'Этот email уже зарегестрирован'],


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

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);

        //... тут ваш код

    }

}

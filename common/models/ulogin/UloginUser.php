<?php
namespace common\models\ulogin;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class UloginUser extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // login scenario
            [['email', 'photo', 'first_name', 'last_name', 'network', 'identity', 'uid'], 'safe'],

            //save scenario
            [['id_user'], 'safe'],
        ];
    }


    public static function tableName()
    {
        return 'ulogin_user';
    }

    //поиск по id
    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }

    //ищем по полю identity ,в таблице соц сетей это поле уникально
    public static function findBySocIdentity($identity)
    {
        return static::findOne(['identity' => $identity]);
    }

    //ищем по полю Uid ,в таблице соц сетей это поле уникально
    public static function findByUid($uid)
    {
        return static::findOne(['uid' => $uid]);
    }

    //переставляем поле login_soc во всех соц профелях данного юзера в 0
    //это нужно, чтобы потом отметить одно поле в качестве текущего (последнего) логина
    //Иначе, login_soc = 1 будут иметь все поля у данного пользователя, а долно быть только одно
    //Данные поля будут установлены в 0 при очередном входе через соц сеть и установлено одно поле
    //login_soc у той соц сети, через которую в данный момент зашел пользователь
    public static function clearOldLastLogin($id_user)
    {
        $rows = self::find()->where(['id_user' => $id_user,'login_soc' => '1'])->all();

        //если какие-то соц сети уже записаны, обновляем нужное поле в них
        if(NULL != $rows)
        {
            foreach ($rows as $row)
            {
                $row->login_soc = '0';
                $row->save(); // Делаем запись в цилке
            }
        }
        else
        {
            return false;
        }

    }

}

<?php
namespace common\models\ulogin;

use Yii;
use yii\base\Model;
use common\models\User;
use common\components\rbac\rbacRoles;
/**
 * Login form
 */
class UloginModel extends Model
{
//    public $id_user;
//    public $email;
//    public $photo;
//    public $first_name;
//    public $last_name;
//    public $network;
//    public $identity;
//    public $uid;

    public $uloginUser;

//    const SCENARIO_LOGIN = 'login';
//    const SCENARIO_SAVE = 'save_to_db';

    public $rememberMe = true;


//    public function scenarios()
//    {
//        return [
//            self::SCENARIO_LOGIN => ['email', 'photo', 'first_name', 'last_name', 'network', 'identity', 'uid'],
//            self::SCENARIO_SAVE =>  ['id_user', 'email', 'photo', 'first_name', 'last_name', 'network', 'identity', 'uid'],
//        ];
//    }


//    /**
//     * @inheritdoc
//     */
//    public function rules()
//    {
//        return [
//            // login scenario
//            [['email', 'photo', 'first_name', 'last_name', 'network', 'identity', 'uid'], 'safe'],
//            //save scenario
//            [['id_user'], 'safe'],
//        ];
//    }

    //получаем входной массив с параметрами из соцсети
    //валидируем по сценарию
    //проверяем существует ли пользователь
    public function uLogin($attributes)
    {
        $this->setAttr($attributes);

//        $this->scenario = self::SCENARIO_SAVE;
//        if ($this->validate()) {

        //ищем юзера с емейл, таким как у входящего через соц сеть
        $user = $this->getUserFromEmail($this->uloginUser->email);

        //если пользователь с таким емейл уже есть
        if(NULL != $user)
        {

            //если такой аккаунт уже записан в базе данных таблицы ulogin_user
            $data = UloginUser::findBySocIdentity($this->uloginUser->identity);

            //если соц сети записанные у пользователя есть, то ставим у login_soc = '0'
            //чтобы login_soc = '1' поставить у активной соцсети
            UloginUser::clearOldLastLogin($user->id);
            sleep(1);//чтобы сначала выполнилась предидущая функция и далее потом продолжился скрипт

            if($data)
            {
                //обновляем только статус текущего входа в поле login_soc
                $data->login_soc = '1';//с этой соц.сетью выполнен текущий (последний) логин
                $data->save();//сохраняем
            }
            //если такой аккаунт у пользователя еще не записан
            else
            {

                $this->uloginUser->	id_user = $user->id;//получаем id юзера для записи в таблицу ulogin_user
                $this->uloginUser->	signup_soc = '0';//отмечаем, что с этой соц сетью пользователь зарегестрировался
                $this->uloginUser->	login_soc = '1';//с этой соц.сетью выполнен текущий (последний) логин

                //сохраняем данные соц. сети
                $this->uloginUser->save();


            }

            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        //если пользователя с таким емейл нет
        else
        {

            //создаем юзера с данными из соц.сети, о которой зашел юзер впервые
            $user = new \common\models\User();
            $user->username = $this->uloginUser->first_name.' '.$this->uloginUser->last_name;
            $user->email = $this->uloginUser->email;
            $user->setPassword($this->uloginUser->uid);
            $user->role = rbacRoles::ROLE_USER;//из перечня групп в console\controllers\RbacController
            $user->signup_tupe = 'soc';//устанавливаем тип регистрации юзера 'soc', по умолчанию 'site'
            $user->avatar = $this->uloginUser->photo;//аватар юзера по умолчанию копируется из соц сети, через которую зарегились
            $user->generateAuthKey();
            $user->save();

            //записываем данные в таблицу профеля соц сетей ulogin_user
            $this->uloginUser->	id_user = $user->id;
            $this->uloginUser->	signup_soc = '1';//отмечаем, что с этой соц сетью пользователь зарегестрировался
            $this->uloginUser->	login_soc = '1';//с этой соц.сетью выполнен текущий (последний) логин
            $this->uloginUser->save();

            // добавление роли user для зарегестрировавшегося
            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole(rbacRoles::ROLE_USER);
            $auth->assign($userRole, $user->getId());


            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);


        }



    }


    //массив данных из соцсети переименовываем в свои имена
    public function setAttr($attributes)
    {
        $this->uloginUser = new UloginUser();

        $this->uloginUser->email = $attributes['email'];
        $this->uloginUser->photo = $attributes['photo_big'];
        $this->uloginUser->first_name = $attributes['first_name'];
        $this->uloginUser->last_name = $attributes['last_name'];
        $this->uloginUser->network = $attributes['network'];
        $this->uloginUser->identity = $attributes['identity'];
        $this->uloginUser->uid = $attributes['uid'];
    }

    //проверяем, есть ли такой емейл у зарегестрированного юзера
    protected function getUserFromEmail($email)
    {
        return \common\models\User::findByEmail($email);

    }

//    /**
//     * Validates the password.
//     * This method serves as the inline validation for password.
//     *
//     * @param string $attribute the attribute currently being validated
//     * @param array $params the additional name-value pairs given in the rule
//     */
//    public function validatePassword($attribute, $params)
//    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Incorrect username or password.');
//            }
//        }
//    }
//
//    /**
//     * Logs in a user using the provided username and password.
//     *
//     * @return boolean whether the user is logged in successfully
//     */
//    public function login()
//    {
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
//        } else {
//            return false;
//        }
//    }
//
//    /**
//     * Finds user by [[username]]
//     *
//     * @return User|null
//     */
//    protected function getUser()
//    {
//        if ($this->_user === null) {
//            $this->_user = User::findByUsername($this->username);
//        }
//
//        return $this->_user;
//    }
}

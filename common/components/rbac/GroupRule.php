<?php
namespace common\components\rbac;

use Yii;
use yii\rbac\Rule;
use common\models\User;

/**
 * User group rule class.
 */
class GroupRule extends Rule
{
    /**
     * @inheritdoc
     */
    public $name = 'group';

    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->identity->role;

            if ($item->name === User::ROLE_ADMIN) {
                return $role == User::ROLE_ADMIN;
            }
            elseif ($item->name === User::ROLE_MODERATOR) {
                return $role == User::ROLE_MODERATOR ||  $role == User::ROLE_ADMIN;
            }
            elseif ($item->name === User::ROLE_USER) {
                return $role == User::ROLE_USER ||  $role == User::ROLE_ADMIN || $role == User::ROLE_MODERATOR;
            }
        }
        return false;
    }
}
?>

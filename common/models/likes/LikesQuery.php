<?php

namespace common\models\likes;

/**
 * This is the ActiveQuery class for [[Likes]].
 *
 * @see Likes
 */
class LikesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Likes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Likes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    //все лайки оприделенного пользователя
    public function userLikes()
    {
        $this->andWhere(['userId' => \Yii::$app->user->id]);
        return $this;
    }
}

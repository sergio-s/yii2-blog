<?php

namespace backend\models\wiki;

/**
 * This is the ActiveQuery class for [[AdminWikiLetters]].
 *
 * @see AdminWikiLetters
 */
class AdminWikiLettersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AdminWikiLetters[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AdminWikiLetters|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

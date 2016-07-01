<?php

namespace backend\models\wiki;

/**
 * This is the ActiveQuery class for [[AdminWikiTerms]].
 *
 * @see AdminWikiTerms
 */
class AdminWikiTermsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AdminWikiTerms[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AdminWikiTerms|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

<?php

namespace app\models\wiki;

/**
 * This is the ActiveQuery class for [[WikiTerms]].
 *
 * @see WikiTerms
 */
class WikiTermsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return WikiTerms[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WikiTerms|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    //по alias буквы
    public function byAlias($alias)
    {
       return $this->andWhere(['alias' => $alias]);
    }

}

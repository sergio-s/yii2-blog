<?php

namespace app\models\wiki;

/**
 * This is the ActiveQuery class for [[WikiLetters]].
 *
 * @see WikiLetters
 */
class WikiLettersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return WikiLetters[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WikiLetters|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    //Все имеющиеся категории букв, где есть термины
    public function alphabet()
    {
        return $this->select('wiki_letters.alias, wiki_letters.letter')
                    ->orderBy(['wiki_letters.letter'=>SORT_ASC]);

    }

    //Только те категории букв, где есть термины
    public function alphabetIssetTerm()
    {
        return $this->select('wiki_letters.id,wiki_letters.alias, wiki_letters.letter')
                    ->innerJoinWith('wikiTerms', false)
                    ->distinct()
                    ->orderBy(['wiki_letters.letter'=>SORT_ASC]);

    }

    //по alias буквы
    public function byAlias($alias)
    {
       return $this->andWhere(['alias' => $alias]);
    }

}

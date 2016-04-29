<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BlogCategorisTable]].
 *
 * @see BlogCategorisTable
 */
class BlogCategorisTableQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BlogCategorisTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BlogCategorisTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

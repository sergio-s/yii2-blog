<?php

namespace backend\models\geo;

/**
 * This is the ActiveQuery class for [[GeoCities]].
 *
 * @see GeoCities
 */
class GeoCitiesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GeoCities[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GeoCities|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

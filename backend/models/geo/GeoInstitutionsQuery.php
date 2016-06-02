<?php

namespace backend\models\geo;

/**
 * This is the ActiveQuery class for [[GeoInstitutions]].
 *
 * @see GeoInstitutions
 */
class GeoInstitutionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GeoInstitutions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GeoInstitutions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

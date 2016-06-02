<?php

namespace app\models\geo;

/**
 * This is the ActiveQuery class for [[GeoInstitutionsPhones]].
 *
 * @see GeoInstitutionsPhones
 */
class GeoInstitutionsPhonesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GeoInstitutionsPhones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GeoInstitutionsPhones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

<?php

namespace backend\models\geo;

/**
 * This is the ActiveQuery class for [[GeoCountries]].
 *
 * @see GeoCountries
 */
class GeoCountriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GeoCountries[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GeoCountries|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    //населенные пункты внутри регион. центра или регион центры (если 0)
    public function rossia()
    {
       return $this->andWhere(['id' => 1]);
    }

}

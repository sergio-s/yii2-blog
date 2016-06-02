<?php

namespace app\models\geo;

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

    //населенные пункты внутри регион. центра или регион центры (если 0)
    public function regyonCenter($id_center = 0)
    {
       return $this->andWhere(['id_center' => $id_center]);
    }

    //населенные пункты по id страны
    public function country($countryId)
    {
       return $this->andWhere(['country_id' => $countryId]);
    }

    //населенный пункт по id
    public function city($cityId)
    {
       return $this->andWhere(['id' => $cityId]);
    }

}

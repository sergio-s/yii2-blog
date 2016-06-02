<?php

namespace backend\models\geo;

/**
 * This is the ActiveQuery class for [[GeoInstitutionsPhotos]].
 *
 * @see GeoInstitutionsPhotos
 */
class GeoInstitutionsPhotosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GeoInstitutionsPhotos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GeoInstitutionsPhotos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

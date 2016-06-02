<?php

namespace app\models\geo;

/**
 * This is the ActiveQuery class for [[InstitutionsPhoto]].
 *
 * @see InstitutionsPhoto
 */
class GeoInstitutionsPhotosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InstitutionsPhoto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InstitutionsPhoto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    //сортировка фото по значимости
    public function sortQueue()
    {
       return $this->orderBy(['queue' => SORT_ASC]);
    }

    //первое фото по очереди вывода.
    public function firstQueue()
    {
       return $this->andWhere(['queue' => GeoInstitutionsPhotos::FIRST_QUEUE]);
    }



}

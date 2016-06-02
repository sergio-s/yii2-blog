<?php

namespace app\models\geo;

use Yii;

/**
 * This is the model class for table "geo_institutions".
 *
 * @property string $id
 * @property string $city_id
 * @property string $name
 * @property string $address
 * @property string $lat
 * @property string $lng
 * @property string $description
 *
 * @property GeoCities $city
 * @property GeoInstitutionsPhones[] $geoInstitutionsPhones
 */
class GeoInstitutions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_institutions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id', 'name', 'address', 'lat', 'lng', 'description'], 'required'],
            [['city_id'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['description'], 'string'],
            [['name', 'address'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCities::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'name' => 'Name',
            'address' => 'образец - Малая Балканская ул., д. 54 ',
            'lat' => 'широта',
            'lng' => 'долгота',
            'description' => 'краткое описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(GeoCities::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutionsPhones()
    {
        return $this->hasMany(GeoInstitutionsPhones::className(), ['institution_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutionsPhotos()
    {
        return $this->hasMany(GeoInstitutionsPhotos::className(), ['institution_id' => 'id']);
    }

    
    /**
     * @inheritdoc
     * @return GeoInstitutionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GeoInstitutionsQuery(get_called_class());
    }
}

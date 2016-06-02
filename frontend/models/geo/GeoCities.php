<?php

namespace app\models\geo;

use Yii;

/**
 * This is the model class for table "geo_cities".
 *
 * @property string $id
 * @property string $phone_code
 * @property string $country_id
 * @property string $id_center
 * @property string $name
 * @property string $address
 * @property string $lat
 * @property string $lng
 * @property string $description
 *
 * @property GeoCountries $country
 * @property GeoInstitutions[] $geoInstitutions
 * @property GeoInstitutionsPhones[] $geoInstitutionsPhones
 */
class GeoCities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_code', 'country_id', 'name', 'address', 'lat', 'lng'], 'required'],
            [['country_id', 'id_center'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['description'], 'string'],
            [['phone_code'], 'string', 'max' => 10],
            [['name', 'address'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCountries::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_code' => 'телефонный код города',
            'country_id' => 'Country ID',
            'id_center' => 'id регионального или другого центра, к которому пернадлежит город. 0 - является региональным центром',
            'name' => 'название города',
            'address' => 'адрессгорода, например: Люберцы, Московская область, Россия',
            'lat' => 'широта',
            'lng' => 'долгота',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(GeoCountries::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutions()
    {
        return $this->hasMany(GeoInstitutions::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutionsPhones()
    {
        return $this->hasMany(GeoInstitutionsPhones::className(), ['city_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return GeoCitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GeoCitiesQuery(get_called_class());
    }
}

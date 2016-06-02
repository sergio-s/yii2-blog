<?php

namespace backend\models\geo;

use Yii;

/**
 * This is the model class for table "geo_countries".
 *
 * @property string $id
 * @property string $phone_code
 * @property string $name
 * @property string $lat
 * @property string $lng
 *
 * @property GeoCities[] $geoCities
 * @property GeoInstitutions[] $geoInstitutions
 * @property GeoInstitutionsPhones[] $geoInstitutionsPhones
 */
class GeoCountries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_code', 'name', 'lat', 'lng'], 'required'],
            [['lat', 'lng'], 'number'],
            [['phone_code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_code' => 'Phone Code',
            'name' => 'название',
            'lat' => 'долгота',
            'lng' => 'широта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoCities()
    {
        return $this->hasMany(GeoCities::className(), ['country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutions()
    {
        return $this->hasMany(GeoInstitutions::className(), ['country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutionsPhones()
    {
        return $this->hasMany(GeoInstitutionsPhones::className(), ['country_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return GeoCountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GeoCountriesQuery(get_called_class());
    }
}

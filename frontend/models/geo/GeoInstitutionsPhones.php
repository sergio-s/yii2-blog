<?php

namespace app\models\geo;

use Yii;

/**
 * This is the model class for table "geo_institutions_phones".
 *
 * @property string $id
 * @property string $country_id
 * @property string $city_id
 * @property string $institution_id
 * @property string $phone_char
 * @property string $ phone_int
 * @property string $type
 * @property integer $significance
 *
 * @property GeoCountries $country
 * @property GeoCities $city
 * @property GeoInstitutions $institution
 */
class GeoInstitutionsPhones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_institutions_phones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'city_id', 'institution_id', 'phone_char', ' phone_int', 'type'], 'required'],
            [['country_id', 'city_id', 'institution_id', 'significance'], 'integer'],
            [['type'], 'string'],
            [['phone_char', ' phone_int'], 'string', 'max' => 15],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCountries::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoInstitutions::className(), 'targetAttribute' => ['institution_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'institution_id' => 'id учреждения',
            'phone_char' => 'номер телефона в местном формате, так с возможными тире и пробелами(так, как будет выводиться на сайт)',
            ' phone_int' => 'Phone Int',
            'type' => 'тип телефона',
            'significance' => 'значимость номера. 1- основной, 2- второстипенный и т.п.',
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
    public function getCity()
    {
        return $this->hasOne(GeoCities::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(GeoInstitutions::className(), ['id' => 'institution_id']);
    }

    /**
     * @inheritdoc
     * @return GeoInstitutionsPhonesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GeoInstitutionsPhonesQuery(get_called_class());
    }
}

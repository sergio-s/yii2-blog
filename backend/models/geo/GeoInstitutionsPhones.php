<?php

namespace backend\models\geo;

use Yii;

/**
 * This is the model class for table "geo_institutions_phones".
 *
 * @property string $id
 * @property string $country_id
 * @property string $city_id
 * @property string $institution_id
 * @property string $phone_char
 * @property integer $significance
 *
 * @property GeoCountries $country
 * @property GeoCities $city
 * @property GeoInstitutions $institution
 */
class GeoInstitutionsPhones extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DELITE = 'delite';

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
            [['country_id', 'city_id', 'institution_id', 'phone_char'], 'required'],
            [['country_id', 'city_id', 'institution_id', 'significance'], 'integer'],
            [['phone_char'], 'string', 'max' => 50],
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
            'institution_id' => 'Institution ID',
            'phone_char' => 'Phone Char',
            'significance' => 'Значимость номера',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_CREATE] = [
                                        'country_id',
                                        'city_id',
                                        'institution_id',
                                        'phone_char',
                                        //без significance
                                    ];
        $scenarios[self::SCENARIO_UPDATE] = [

                                    ];
        $scenarios[self::SCENARIO_DELITE] = [

                                    ];


        return $scenarios;
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

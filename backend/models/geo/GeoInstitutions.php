<?php

namespace backend\models\geo;
use common\models\likes\Likes;

use Yii;

/**
 * This is the model class for table "geo_institutions".
 *
 * @property string $id
 * @property string $country_id
 * @property string $city_id
 * @property string $name
 * @property string $address
 * @property string $lat
 * @property string $lng
 * @property string $description
 * @property string $rating
 *
 * @property GeoCities $city
 * @property GeoCountries $country
 * @property GeoInstitutionsPhones[] $geoInstitutionsPhones
 * @property GeoInstitutionsPhotos[] $geoInstitutionsPhotos
 */
class GeoInstitutions extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DELITE = 'delite';

    public $phone_char;// из связанной таблицы телефонов

    public $file;//обьекты картинок


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
            [['country_id', 'city_id', 'name', 'address', 'lat', 'lng', 'description'], 'required'],
            [['country_id', 'city_id'], 'integer'],
            [['lat', 'lng', 'rating'], 'number'],
            [['description', 'keywords'], 'string'],
            [['name', 'address'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCountries::className(), 'targetAttribute' => ['country_id' => 'id']],


            //кастомные поля
            [['file'], 'safe'],
            [['file'], 'file', 'extensions' => 'jpeg, jpg, png, gif', 'maxSize'=>3*1024*1024, 'maxFiles'=>4],
            //[['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],//макс кол-во загружаемых файлов
            [['phone_char'], 'required'],
            [['phone_char'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'ID страны',
            'city_id' => 'ID города',
            'name' => 'Название роддома',
            'address' => 'Адресс роддома',
            'lat' => 'широта',
            'lng' => 'долгота',
            'description' => 'краткое описание',
            'rating' => 'рейтинг',
            //'like' => 'Лайки',
            'countryName' => 'Название страны',//кастомное поле из другой таблицы
            'cityName' => 'Название города',//кастомное поле из другой таблицы
            'likeCount' => 'Число лайков',//кастомное поле из другой таблицы
            'photoCount' => 'Число фото',//кастомное поле из другой таблицы
            'phonesNumbers' => 'Телефоны',//кастомное поле из другой таблицы
            'phone_char' => 'Телефоны через запятую. Пример: 8 (495) 494-83-30, 8 (495) 495-00-30',//кастомное поле из другой таблицы ддя create и update форм
            'file' => 'Фотографии',//кастомное поле из другой таблицы
            'keywords' => 'Ключевые слова',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_CREATE] = [
                                        'country_id',
                                        'city_id',
                                        'name',
                                        'address',
                                        'lat',
                                        'lng',
                                        'description',
                                        'keywords'
                                        //без рейтинга
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

    /* Getter for City name */
    public function getCountryName() {
        return $this->country->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(GeoCities::className(), ['id' => 'city_id']);
    }

    /* Getter for City name */
    public function getCityName() {
        return $this->city->name;
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutionsLikes()
    {
        return $this->hasMany(Likes::className(), ['materialId' => 'id'])
                            ->andWhere(['materialType' => Likes::TYPE_GEOINSTITUTIONS]);//

    }

    //количество лайков к данному материалу
    public function getLikesCount(){
      return $this->getGeoInstitutionsLikes()->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutionsPhones()
    {
        return $this->hasMany(GeoInstitutionsPhones::className(), ['institution_id' => 'id']);
    }

    //телефоны к данному материалу в виде строки с переносами
    public function getPhonesNumbers($sep = "<br>"){
        $res = [];
        foreach($this->geoInstitutionsPhones as $phone){
            $res[] =  $phone->phone_char;
        }
        if(!empty($res)){
            return implode($sep, $res);
        }
        return 'нет';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoInstitutionsPhotos()
    {
        return $this->hasMany(GeoInstitutionsPhotos::className(), ['institution_id' => 'id']);
    }

    //количество фото к данному материалу
    public function getPhotoCount(){
        return $this->getGeoInstitutionsPhotos()->count();
    }

    //src фото к данному материалу
    public function getPhotoSrc(){
        return $this->getGeoInstitutionsPhotos()->select(['img'])->all();
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

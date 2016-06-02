<?php

namespace backend\models\geo;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\geo\GeoInstitutions;

/**
 * GeoInstitutionsSearch represents the model behind the search form about `backend\models\geo\GeoInstitutions`.
 */
class GeoInstitutionsSearch extends GeoInstitutions
{
    //добавляем свое поле в модель для отображения место id города -  его названи
    public $countryName;
    public $cityName;
    public $likeCount;
    public $photoCount;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'city_id'], 'integer'],
            [['name', 'address', 'description'], 'safe'],
            [['lat', 'lng', 'rating'], 'number'],
            [['cityName', 'countryName', 'likeCount', 'photoCount'], 'safe']//кастомное поле $countryName
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GeoInstitutions::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /**
        * Setup your sorting attributes
        * Note: This is setup before the $this->load($params)
        * statement below
        */
       $dataProvider->setSort([
           'attributes' => [

               'name' => [
                   'asc' => ['name' => SORT_ASC],
                   'desc' => ['name' => SORT_DESC],
                   'label' => 'name',
                   'default' => SORT_ASC
               ],
               //кастомное поле из другой таблицы
               'countryName' => [
                    'asc' => ['geo_countries.name' => SORT_ASC],
                    'desc' => ['geo_countries.name' => SORT_DESC],
                    'label' => 'Название страны'
                ],

               //кастомное поле из другой таблицы
               'cityName' => [
                    'asc' => ['geo_cities.name' => SORT_ASC],
                    'desc' => ['geo_cities.name' => SORT_DESC],
                    'label' => 'Название города'
                ],

               //кастомное поле из другой таблицы
//               'likeCount' => [
//                    'asc' => [$this->likesCount => SORT_ASC],
//                    'desc' => [$this->likesCount => SORT_DESC],
//                    'label' => 'Число лайков'
//                ],

           ]
       ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            $query->joinWith(['country']);//кастомное поле из другой таблицы
            $query->joinWith(['city']);//кастомное поле из другой таблицы
            //$query->joinWith(['likes']);//кастомное поле из другой таблицы

            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'rating' => $this->rating,
            //'like' => $this->like,

        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'description', $this->description]);

        // filter by country name
        $query->joinWith(['country' => function ($q) {
                            $q->where('geo_countries.name LIKE "%' . $this->countryName . '%"');
                        }]);

        $query->joinWith(['city' => function ($q) {
                            $q->where('geo_cities.name LIKE "%' . $this->cityName . '%"');
                        }]);


        return $dataProvider;
    }
}

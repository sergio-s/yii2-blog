<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use app\models\geo\GeoCountries;
use app\models\geo\GeoCities;
use app\models\geo\GeoInstitutions;
use yii\data\ActiveDataProvider;
use common\models\raits\Raits;

class GeoController extends BaseFront
{
    public $h1;


    public function actionIndex($countryId = 1)
    {
        //россия и региональные центры
        $country = GeoCountries::find()->country($countryId)
                ->with([
                    'geoCities'=>   function ($query) {
                                        $query->regyonCenter();
                                    },
                    ])
                ->one();

        //var_dump($country->geoCities);die;
        if(NULL === $country)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
            //throw new \yii\web\NotFoundHttpException;
        }

        Yii::$app->view->title .= ': рейтинг роддомов';
        $this->h1 = "Рейтинг роддомов";

        //всего городов в базе,относящейся к этой стране
        $cityCount = GeoCities::find()->country($countryId)->count();

        //всего роддомов в базе,относящейся к этой стране
        $institutionCount = GeoInstitutions::find()->country($countryId)->count();

        //Массив для передачи в виджет карты GoogleMapWidget::widget
        $markerMap = [];
        if(isset($country->geoCities) && NULL != $country->geoCities){
            $i = 0;
            foreach($country->geoCities as $city){
                $markerMap[$i]['title'] = $city->name;
                $markerMap[$i]['lat'] = $city->lat;
                $markerMap[$i]['lng'] = $city->lng;
                $markerMap[$i]['infowindow']['content']  = "Подробнее по роддомам города ";
                $markerMap[$i]['infowindow']['content'] .= "<a href='".Url::toRoute(['/geo/cities', 'cityId' => $city->id])."'>{$city->name}</a> ";
                $markerMap[$i]['infowindow']['content'] .= "<p><a href='".Url::toRoute(['/geo/cities', 'cityId' => $city->id])."'>Перейти к просмотру...</a></p>";
                $i++;
           }
        }



        return $this->render('index',[
                                        'country'           => $country,
                                        'markerMap'         => $markerMap,
                                        'cityCount'         => $cityCount,
                                        'institutionCount' => $institutionCount,

                                    ]);
    }

    public function actionCities($cityId)
    {
        //всего городов в базе,относящейся к этой стране
        $city = GeoCities::find()->city($cityId)
                    ->with(['geoInstitutions.geoInstitutionsPhones',
                            'geoInstitutions.geoInstitutionsPhotos' =>  function ($query) {
                                                                $query->firstQueue();
                                                            },
                        ])
                    ->one();




        if(NULL === $city)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
            //throw new \yii\web\NotFoundHttpException;
        }

        Yii::$app->view->title .= ": рейтинг роддомов - {$city->name}";
        $this->h1 = "{$city->name} : рейтинг роддомов";

        //Массив для передачи в виджет карты GoogleMapWidget::widget
        $markerMap = [];
        if(isset($city->geoInstitutions) && NULL != $city->geoInstitutions){
            $i = 0;
            foreach($city->geoInstitutions as $institution){
                $markerMap[$i]['title'] = $institution->name;
                $markerMap[$i]['lat'] = $institution->lat;
                $markerMap[$i]['lng'] = $institution->lng;
                $markerMap[$i]['infowindow']['content']   = $this->renderPartial('infowindow',['institution' => $institution,]);

                $i++;
           }
        }

        return $this->render('cities',[
                                        'city' => $city,
                                        'markerMap' => $markerMap,
        ]);
    }


    public function actionInstitutions($instId)
    {
        //всего городов в базе,относящейся к этой стране
        $institution = GeoInstitutions::find()->institution($instId)
                        ->with([
                                'geoInstitutionsPhones',
                                'geoInstitutionsPhotos' =>  function ($query) {
                                                                $query->sortQueue();
                                                            },
                                ])
                        ->one();

        if(NULL === $institution)
        {
            throw new \yii\web\HttpException(404, 'Такой страницы не существует. ');
            //throw new \yii\web\NotFoundHttpException;
        }

        Yii::$app->view->title .= ": {$institution->name}";
        $this->h1 = "{$institution->name}";


                //Массив для передачи в виджет карты GoogleMapWidget::widget
        $markerMap = [];

        $markerMap[0]['title'] = $institution->name;
        $markerMap[0]['lat'] = $institution->lat;
        $markerMap[0]['lng'] = $institution->lng;
        $markerMap[0]['infowindow']['content']   = "<div>";
        if(isset($institution->geoInstitutionsPhotos[0]->img) && NULL != $institution->geoInstitutionsPhotos[0]->img){
            $markerMap[0]['infowindow']['content']  .= "<img style='width:60px; hight:60px;float:left;margin-right:4px;' src='";//$institution->geoInstitutionsPhotos
            $markerMap[0]['infowindow']['content']  .= Yii::getAlias("@web/img/geo/institution-{$institution->id}/{$institution->geoInstitutionsPhotos[0]->img}");
            $markerMap[0]['infowindow']['content']  .= "'>";
        }
        $markerMap[0]['infowindow']['content']  .= "<p style='overflow:hidden'>";
        $markerMap[0]['infowindow']['content']  .= "<strong>{$institution->name}</strong><br>";
        $markerMap[0]['infowindow']['content']  .= $institution->address;
        $markerMap[0]['infowindow']['content']  .= "</p>";
        $markerMap[0]['infowindow']['content']  .= "</div>";



        $idModalWidget = Raits::TYPE_GEOINSTITUTIONS.$instId;//id для виджета модального окна в виде
        //обработка звездного рейтинга
        if (Yii::$app->request->isPost && Yii::$app->request->isAjax){
            $rait = Yii::$app->request->post('rait');//оценка пользователя
            $res = [];
            if(!Yii::$app->user->isGuest){
                //есть ли запись о голосовании на материале у данного пользователя
                $userRaits = Raits::find()
                                ->userRaits()
                                ->andWhere(['materialType' => Raits::TYPE_GEOINSTITUTIONS,'materialId' => $instId])
                                ->count();

                //если пользователь уже голосовал выводим сообщение и далее не выполняем
                if($userRaits){
                    $res['message'] = 'Этот голос не учитывается. Вы уже проголосовали ранее...';
                    return json_encode($res, JSON_NUMERIC_CHECK);
                }

                //Если новый голос пользователя, записываем в бд
                $newRait = new Raits();
                $newRait->materialType = Raits::TYPE_GEOINSTITUTIONS;
                $newRait->materialId = $instId;
                $newRait->rateNum = $rait;
                $newRait->save();

                /**
                 * Вычисляем общий рейтинг с учетом изменений
                 */
                //выбираем все голоса по данной записи
                $allRaits = Raits::find()->where(['materialType' => Raits::TYPE_GEOINSTITUTIONS,'materialId' => $instId])
                                         ->select('rateNum');

                $allUsers = $allRaits->count();//сумма всех учетных записей пользователей к дан. материалу (1а запись - 1 пользователь)
                $sumVotes = $allRaits->sum('rateNum');//сумма всех оценок пользователей к дан. материалу

                $totalRating = round($sumVotes / $allUsers, 2);// округляем до сотых

                //записываем вычесленный рейтинг в таблицу материала в поле rating
                $inst = GeoInstitutions::findOne($instId);
                    $inst->scenario = GeoInstitutions::RATING_UPDATE;
                    $inst->rating = $totalRating;
                    $inst->ratingVotes = $totalRating;
                    $inst->save();

                //возвращаем новый рейтинг в вид
                $res['rating'] = $inst->rating;//передаем вычесленный рейтинг по материалу
                $res['ratingVotes'] = $allUsers;//передаем сумму всех голосов по материалу

                return json_encode($res, JSON_NUMERIC_CHECK);
            }

        }

        return $this->render('institutions',[
                                                'institution' => $institution,
                                                'markerMap' => $markerMap,
                                                'idModalWidget' => $idModalWidget,
        ]);
    }

}

<?php
namespace common\widgets\googlemap;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\helpers\ArrayHelper;
use common\widgets\googlemap\GoogleMapAsset;

/**
 * Виджет комментариев
 */

class GoogleMapWidget extends Widget
{

    public $mapId = 'map';
    public $panoId = 'pano';

    public $mapOptions = [];

    public $locationDefault = [
                'lat' => '61.0137097',
		'lng' => '99.1966559',
            ];

    public $marker = [];

    public $panorama = [];

    public function init()
    {
        parent::init();

        //$this->marker
        $this->setMapOptions($this->mapOptions);

        $this->registerClientScript();


    }

    public function run()
    {
        return $this->render('map', [
                                        'mapId' => $this->mapId,
                                        'panoId'=> $this->panoId,


        ]);

    }

    /**
     * Register assets.
     */
//    protected function registerAssets()
//    {
//        $view = $this->getView();
//        CommentAsset::register($view);
//    }

    protected function registerClientScript($position = View::POS_END)
    {
        $view = $this->getView();
//        $bundleName = GoogleMapAsset::className();
//        $bundle = new $bundleName;
//        $bundle->css = ['css/google.maps.css',];
//        //var_dump($bundle);die;
//        $bundle::register($view);


        $view->registerJs($this->getJs(), $position);
    }

    public function getJs()
    {

        $mapOpt = $this->getMapOptions();
        return  <<< JS
            var placeId;
            function initMap() {

                    var mapOptions = {$mapOpt};


                    {$this->mapId} = new google.maps.Map(document.getElementById('{$this->mapId}'),mapOptions);

                    //создание маркера на карте
                    {$this->getMarkers()}

                    //формирование панорамы
                    {$this->getPano()}

                    var geocoder = new google.maps.Geocoder;
                    service = new google.maps.places.PlacesService(map);

                    getPlaceId(geocoder, mapOptions.center, function(res){
                        console.log(res);
                        var request = {placeId: 'ChIJ2TxDhRI2tUYRERj9qUGybx8'};
                        service = new google.maps.places.PlacesService({$this->mapId});
                        service.getDetails(request, callback);

                    });


            }//end initMap

            function callback(place, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                  console.log(place);
                }
            }

            function getPlaceId(geocoder, location, callback){
                geocoder.geocode({'location': location}, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                                if (results[1]) {
                                    placeId = results[0].place_id;
                                    callback(placeId);
                                    //placeId = results[0].formatted_address;
                                    //console.log(placeId);

                                } else {
                                    console.log('No results found');
                                    callback(null);

                                }
                        } else {
                              console.log('Geocoder failed due to: ' + status);
                              callback(null);

                        }
                });

            }


JS;

    }

    public function setMapOptions($options = [])
    {

        $this->mapOptions = ArrayHelper::merge(
            [
                "zoom" => "2",
                "center" => ['lat' => $this->locationDefault['lat'], 'lng'=> $this->locationDefault['lng']],
                "disableDefaultUI" => 0,
                "mapTypeControl" => 1,
                "mapTypeControlOptions" => "{style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,}",
            ],
            $options
        );

    }

    public function getMapOptions()
    {
//        $res = [];
//        foreach($this->mapOptions as $name => $value){
//            $res[] = $name.':'.$value;
//        }
//
//        return implode(",\n", $res);
        return json_encode($this->mapOptions, JSON_NUMERIC_CHECK);
    }

    public function getMarkers()
    {
        if(!empty($this->marker)){
            $markersArr = json_encode($this->marker);
$js = <<< JS

            var infowindow =  new google.maps.InfoWindow({
                    content: ""
                });

            var markersArr = {$markersArr};

            for (var i = 0; i < markersArr.length; i++) {
                var plase = markersArr[i];
                //console.log(markersArr);

                var latLng = new google.maps.LatLng(Number(plase.lat), Number(plase.lng));

                var marker = new google.maps.Marker({
                  position: latLng,
                  map: {$this->mapId},
                  title: plase.title,
                });


                 bindInfoWindow(marker, {$this->mapId}, infowindow, plase.infowindow.content);

            }

            function bindInfoWindow(marker, map, infowindow, description) {
                marker.addListener('click', function() {
                    infowindow.setContent(description);
                    infowindow.open(map, this);
                });
            }


JS;

            return $js;
        }
        return;
    }

//                                                'panorama' =>   [
//                                                        'position' => ['lat' => $institution->lat, 'lng' => $institution->lng],
//                                                        //'pov' => ['heading' => 34,'pitch' => 10],
//                                                  ],
    public function getPano()
    {
        if(!empty($this->panorama)){
            $panoramaArr = json_encode($this->panorama, JSON_NUMERIC_CHECK);
$js = <<< JS
            var panoramaOptions = {$panoramaArr};

            var {$this->panoId} = new google.maps.StreetViewPanorama(
                document.getElementById('{$this->panoId}'), panoramaOptions);

             {$this->mapId}.setStreetView({$this->panoId});


JS;
            return $js;
        }
        return;
    }




}
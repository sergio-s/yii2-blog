<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use common\widgets\googlemap\GoogleMapWidget;
use common\models\comments\Comments;


\frontend\assets\GeoAsset::register($this);
\frontend\assets\GoogleMapAsset::register($this);
\frontend\assets\GoogleMapClusterAsset::register($this);

$this->params['breadcrumbs'][] = $this->context->h1;
?>
<h1><?=$this->context->h1;?></h1>

<div class="geo-index">

    <div class="row">
        <div class="col-md-18" style="height: 400px;">
            <?php echo GoogleMapWidget::widget([
                                                'mapOptions' =>   [
                                                        'zoom' => '2',
                                                        'center' => ['lat' => $country->lat, 'lng' => $country->lng],
                                                ],
                                                'marker' =>  $markerMap,
//                                                'marker' =>   [
//                                                        ['title' => 'россия','lat' => $country->lat,'lng' => $country->lng, 'infowindow' => ['content' => 'россия']],
//                                                        ['title' => 'москва','lat' => '55.755826','lng' => '37.6173', 'infowindow' => ['content' => 'москва']],
//                                                ],
                ]);
            ?>


        </div>
        <ul id="geo" class="col-md-6 map-statistics">
            <li><small>Всего городов в базе: <?= isset($cityCount)? $cityCount: '0';?></small></li>
            <li><small>Всего роддомов в базе: <?= isset($institutionCount)? $institutionCount: '0';?></small></li>
            <li><small>Всего отзывов: <?=$countAllComments; ?></small></li>
            
        </ul>
    </div>
    <?php if(isset($country->geoCities) && NULL != $country->geoCities):?>
        <div id="counries-list">
            <h2><?=Html::encode($country->name);?></h2>
            <ul  class="row cities-list">
                <?php foreach($country->geoCities as $city):?>
                    <li class="col-xs-8">
                        <a href="<?=Url::toRoute(['/geo/cities', 'cityId' => $city->id]);?>"><?=Html::encode($city->name);?></a>
                    </li>

                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
</div>

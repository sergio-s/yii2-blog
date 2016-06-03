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

$this->params['breadcrumbs'][] = array('label'=> 'Рейтинг роддомов', 'url'=> Url::toRoute('/geo/index'));
$this->params['breadcrumbs'][] = Html::encode($this->context->h1);
?>
<h1><?=Html::encode($this->context->h1);?></h1>
<?php if(NULL != $city->description):?>
<p><?=Html::encode($city->description);?></p>
<?php endif;?>
<div class="geo-index">

    <div class="row">
        <div class="col-md-24" style="height: 470px;">
            <?php echo GoogleMapWidget::widget([
                                                'mapOptions' =>   [
                                                        'zoom' => '10',
                                                        'center' => ['lat' => $city->lat, 'lng' => $city->lng],
                                                ],
                                                'marker' =>  $markerMap,//контент infowindow устанавливается в контроллере
//                                                'marker' =>   [
//                                                        ['title' => 'россия','lat' => $country->lat,'lng' => $country->lng, 'infowindow' => ['content' => 'россия']],
//                                                        ['title' => 'москва','lat' => '55.755826','lng' => '37.6173', 'infowindow' => ['content' => 'москва']],
//                                                ],
                ]);
            ?>


        </div>
    </div>

    <br>
    <?php if(isset($city->geoInstitutions) && NULL != $city->geoInstitutions):?>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Роддом</th>
                <th>Адресс</th>
                <th>Телефон</th>
                <th>Рейтинг</th>
                <th>Отзывов</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($city->geoInstitutions as $institution):?>
                <tr>
                    <th><a href="<?=Url::toRoute(['/geo/institutions', 'instId' => $institution->id]);?>"><?=Html::encode($institution->name);?></a></th>
                    <th><?=Html::encode($institution->address);?></th>
                    <?php if(NULL != $institution->geoInstitutionsPhones):?>
                        <th>
                            <?php foreach($institution->geoInstitutionsPhones as $phone):?>
                                <p><small><?=$phone->phone_char;?></small></p>
                            <?php endforeach;?>
                        </th>
                    <?php endif;?>
                    <th><?=$institution->rating;?></th>
                    <th><?=Comments::getCount(Comments::TYPE_GEOINSTITUTIONS, $institution->id, Comments::ACTIVE);?></th>
                </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    <?php endif;?>
</div>

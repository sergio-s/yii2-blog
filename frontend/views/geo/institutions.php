<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use common\widgets\googlemap\GoogleMapWidget;
use common\widgets\comments\CommentsWidget;
use common\models\comments\Comments;
use common\widgets\likes\LikesWidget;
use common\models\likes\Likes;
use kartik\rating\StarRating;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;


\frontend\assets\GeoAsset::register($this);
\frontend\assets\ColorboxAsset::register($this);
\frontend\assets\GoogleMapAsset::register($this);
\frontend\assets\GoogleMapClusterAsset::register($this);

$this->params['breadcrumbs'][] = array('label'=> 'Рейтинг роддомов', 'url'=> Url::toRoute('/geo/index'));
$this->params['breadcrumbs'][] = array('label'=> Html::encode($institution->city->name), 'url'=> Url::toRoute(['/geo/cities', 'cityId' => $institution->city->id]));
$this->params['breadcrumbs'][] = Html::encode($this->context->h1);
?>
<h1><?=Html::encode($this->context->h1);?></h1>

<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>


<?php echo LikesWidget::widget(['materialType'=> Likes::TYPE_GEOINSTITUTIONS, 'materialId'=> $institution->id]); ?>

<div class="geo-index">

    <div class="row">
        <div class="col-md-24" style="height: 350px; overflow: hidden;">
            <?php echo GoogleMapWidget::widget([
                                                'mapOptions' =>   [
                                                        'zoom' => '17',
                                                        'center' => ['lat' => $institution->lat, 'lng' => $institution->lng],
                                                ],

                                                'marker' =>  $markerMap,
                    ]);
            ?>
        </div>

    </div>
    <br>


<!--КАРТОЧКА УЧРЕЖДЕНИЯ-->
    <ul class="institution_info">
        <li class="row">
            <strong class="col-xs-5">Адрес:</strong>
            <span class="col-xs-19"><?=Html::encode($institution->address);?></span>
        </li>

        <?php if(isset($institution->geoInstitutionsPhones) && NULL != $institution->geoInstitutionsPhones):?>
        <li class="row">
            <strong class="col-xs-5">Телефон: </strong>
            <ul class="col-xs-19">
                <?php foreach($institution->geoInstitutionsPhones as $phone):?>
                    <li><?=Html::encode($phone->phone_char);?></li>
                <?php endforeach;?>
            </ul>
        </li>
        <?php endif;?>

        <li class="row">
            <strong class="col-xs-5">Отзывов: </strong>
            <span class="col-xs-19"><?=Comments::getCount(Comments::TYPE_GEOINSTITUTIONS, $institution->id, Comments::ACTIVE);?></span>
        </li>

        <li class="row">
            <strong class="col-xs-5">Описание:</strong>
            <span class="col-xs-19">&nbsp;<?=Html::encode($institution->description);?></span>
        </li>

    </ul>
<br>

<?= $this->render('rating',['institution' => $institution, 'id' => 'w1']);?>

<!--ФОТО УЧРЕЖДЕНИЯ-->
    <?php if(isset($institution->geoInstitutionsPhotos) && NULL != $institution->geoInstitutionsPhotos):?>
    <div class="row">
        <div class="col-xs-20 col-xs-offset-2">
            <div class="row" id="geo_institutions_photos">

                <?php $i = 1;?>
                <?php foreach($institution->geoInstitutionsPhotos as $photo):?>
                    <?php if($i === 1): ?>
                        <div class="col-xs-24 institutions_big_photo"><a rel="group1" title="<?=$photo->title;?>" href="<?=Yii::getAlias('@web/img/geo/institution-'.$institution->id.'/'.$photo->img);?>" class="imgColorBox"><img title="<?=$photo->title;?>" src="<?=Yii::getAlias('@web/img/geo/institution-'.$institution->id.'/'.$photo->img);?>"></a></div>
                    <?php else: ?>
                        <div class="col-xs-8"><a rel="group1" title="<?=$photo->title;?>" href="<?=Yii::getAlias('@web/img/geo/institution-'.$institution->id.'/'.$photo->img);?>" class="imgColorBox"><img title="<?=$photo->title;?>" src="<?=Yii::getAlias('@web/img/geo/institution-'.$institution->id.'/'.$photo->img);?>"></a></div>
                    <?php endif;?>
                <?php $i++;?>
                <?php endforeach;?>

             </div>
        </div>
    </div>
    <?php endif;?>




</div>

<?php echo CommentsWidget::widget(['title' => 'Оставьте ваш отзыв по роддому', 'materialType'=> Comments::TYPE_GEOINSTITUTIONS, 'materialId'=> $institution->id]); ?>

<?php
        if(!Yii::$app->user->isGuest){
            echo $this->render('rating',['institution' => $institution, 'id' => 'w2']);
        }
?>

<br>


<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>
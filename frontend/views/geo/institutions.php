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

$this->params['breadcrumbs'][] = array('label'=> 'Рейтинг роддомов', 'url'=> Url::toRoute('/geo/index'));
$this->params['breadcrumbs'][] = array('label'=> Html::encode($institution->city->name), 'url'=> Url::toRoute(['/geo/cities', 'cityId' => $institution->city->id]));
$this->params['breadcrumbs'][] = Html::encode($this->context->h1);
?>
<h1><?=Html::encode($this->context->h1);?></h1>

<!--<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>-->


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



    <ul class="institution_info">
        <li class="row">
            <strong class="col-md-5">Адрес:</strong>
            <span class="col-md-19"><?=Html::encode($institution->address);?></span>
        </li>

        <?php if(isset($institution->geoInstitutionsPhones) && NULL != $institution->geoInstitutionsPhones):?>
        <li class="row">
            <strong class="col-md-5">Телефон:</strong>
            <ul class="col-md-19">
                <?php foreach($institution->geoInstitutionsPhones as $phone):?>
                    <li><?=Html::encode($phone->phone_char);?></li>
                <?php endforeach;?>
            </ul>
        </li>
        <?php endif;?>

        <li class="row">
            <strong class="col-md-5">Отзывов:</strong>
            <span class="col-md-19"><?=Comments::getCount(Comments::TYPE_GEOINSTITUTIONS, $institution->id, Comments::ACTIVE);?></span>
        </li>

        <li class="row">
            <strong class="col-md-5">Описание:</strong>
            <span class="col-md-19"><?=Html::encode($institution->description);?></span>
        </li>

    </ul>

<?php

       Modal::begin(['id' => 'myModal-geo','header' => '<h2>Сообщение для Вас!</h2>',]);
            echo "<h2 style='color:green;'>";
                echo "<strong>";

                echo "</strong>";
            echo "</h2>";
        Modal::end();
        //вызываем модальное окно в этом блоке
//        $js = "$('#myModal-geo').modal()";
//        $this->registerJs($js);
?>

    <div id="ratingBlock">
        <div class="row">
            <p class="col-md-5" id="ratingBlockInfo">
                <small>Рейтинг: <strong id="numRait"><?=$institution->rating;?></strong></small><br>
                <small>Голосов: <strong id="numVotes"><?=$institution->ratingVotes;?></strong></small>
            </p>
            <p class="col-md-19">


            <?php //echo $institution->rating;

                    echo StarRating::widget([
                        'name' => 'rating_1',
                        'model' => $institution,
                        'attribute' => 'rating',
                        //'value' => 3,
                        'pluginOptions' => [
                            //'disabled'=>true,

                            //'displayOnly' => true,//звезды только для показа, но не активны
                            'theme' => 'krajee-svg',
                            'stars' => 10,
                            'step' => 1,
                            'min' => 0,
                            'max' => 10,
                            'disabled' => Yii::$app->user->isGuest ? true : false,//для гостя блокируем кнопки
                            'showClear' => false,// (знак "кирпич")
                            'showCaption' => false,//без подписи количества выбранных
                            'size' => 'xs',//mili
                            'defaultCaption' => 'оценка {rating}',
                            'starCaptions' => [
                                0 => 'Extremely Poor',
                                1 => 'оценка 1',
                                2 => 'оценка 2',
                                3 => 'оценка 3',
                                4 => 'оценка 4',
                                5 => 'оценка 5',
                                6 => 'оценка 6',
                                7 => 'оценка 7',
                                8 => 'оценка 8',
                                9 => 'оценка 9',
                                10 => 'оценка 10',
                            ],
                        ],
                        'pluginEvents' => [
                            'rating.change' => "function(event, value, caption) {
                                //console.log(value);
                                //console.log($('#geoinstitutions-rating').val());

                                $.ajax({
                                    type: 'POST',
                                    url: '".Url::to()."',
                                    data: {'rait': value},
                                    cache: false,
                                    success: function(data) {
                                        var data = jQuery.parseJSON(data);
                                        var inputRating = $('#geoinstitutions-rating');

                                        if (typeof data.message !== 'undefined') {
                                            console.log(data.message);
                                            inputRating.rating('reset');//очищает рейтинг до значения в бд

                                            $('#myModal-geo .modal-body strong').text(data.message);//забиваем сообщение в модальное окно
                                            $('#myModal-geo').modal();//вызываем виджет модального окна

                                        }else{

                                            $('#numRait').text(data.rating);//обновляем цыфры рейтинга в тегах на странице
                                            $('#numVotes').text(data.ratingVotes);//обновляем цыфры кол-ва голосов в тегах на странице
                                            inputRating.rating('refresh', {disabled: true, showClear: false, showCaption: true});//добавляет рейтинг и блокирует повторное нажатие
                                        }

                                    }
                                });



                            }",

                        ],
                    ]);
            ?>

            </p>
        </div>
    </div>

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

<!--<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>-->
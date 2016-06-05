<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use rmrevin\yii\ulogin\ULogin;
use common\widgets\subscription\SubscriptionWidget;

AppAsset::register($this);
?>

<aside class="col-md-8 col-md-offset-1 visible-lg visible-md">

                                <!--секция - подписаться-->
                                <div id="subscribe" class="row selection">
                                    <div class="col-md-24">
                                        <!--заголовок-->
                                        <div class="row">
                                            <div class="h3-box-selection">
                                                <span class="sprite sprite-circle-deck"></span>
                                                <h3 class="h3-selection b-dash-light-rose">Подписка</h3>
                                            </div>
                                        </div>
                                        <!--контент-->
                                        <div class="row">
                                            <div class="col-md-24 block-style-1 block-shadow">


                                                <p class="label-subscribe">
                                                    Подпишитесь на бесплатную рассылку. <br>Получите в подарок <span class="vazhnoe">бесплатную версию журнала</span> "Я БЕРЕМЕННА".</p>

                                                <div style="margin-bottom: 10px; text-align: center; ">
<!--                                                    <img src="/css/img/oblojka2.jpg" style="width: 50%; ">-->
                                                    <?= Html::img('@web/css/img/oblojka2.jpg', ['style'=>['width' => '50%']]);?>
                                                </div>

                                                <div class="row">
                                                    <?=$this->render('@app/views/layouts/sidebar/common/subscribe.php'); ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--секция - новости-->
                                <div id="news-aside" class="row selection">
                                    <div class="col-md-24">
                                        <!--заголовок-->
                                        <div class="row">
                                            <div class="h3-box-selection">
                                                <span class="sprite sprite-circle-bell"></span>
                                                <h3 class="h3-selection b-dash-light-yellow">
                                                    <!--Новости-->
                                                    <?php echo ($this->context->dbBlogCatTitlte)? Html::encode(\Yii::$app->controller->oneCatBlog->title): 'Другие статьи'; ?>
                                                </h3>
                                                <p class="h3-control">
                                                    <a href="/articles" class="control-but">Все</a>
                                                </p>
                                            </div>
                                        </div>
                                        <!--контент-->
                                        <div class="row">

                                            <?php foreach(\Yii::$app->controller->oneCatBlog->getPostsFromCategory($limit = '4') as $post):?>
                                                <div class="col-md-24 block-style-1 block-shadow m-b-10 hover-horder"><!-- отступы блоков m-b-10 -->
                                                    <div class="news-aside-content">
                                                        <div>
                                                            <a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>">
                                                                <?php if(isset($post->img)): ?>
                                                                    <?php echo Html::img('@blogImg-web/'.$post->id.'/thumb/'.$post->img, ['alt'=>'нет изображения', 'class'=>'']);?>
                                                                <?php else:?>
                                                                    <?= Html::img('@blogImg-web/default.jpg', ['alt'=>'нет картинки', 'class'=>'']);?>
                                                                <?php endif;?>

                                                            </a>
                                                        </div>
                                                        <div>
                                                            <small><a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>"><?= Html::encode($post->title); ?></a></small>
                                                            <p><?=BaseStringHelper::truncateWords(strip_tags($post->content), 5, $suffix = '...' );?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>
<!--                                            1
                                            <div class="col-md-24 block-style-1 block-shadow m-b-10 hover-horder"> отступы блоков m-b-10

                                                <div class="news-aside-content">
                                                    <div>
                                                        <a href=""><?php //echo Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?></a>
                                                    </div>
                                                    <div>
                                                        <small><a href="">Заголовок</a></small>
                                                        <p  >Какой-то текст (описание). Какой-то текст ..</p>
                                                    </div>
                                                </div>
                                            </div>
                                            2
                                            <div class="col-md-24 block-style-1 block-shadow m-b-10 hover-horder">

                                                <div class="news-aside-content">
                                                    <div>
                                                        <a href=""><?php //echo Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?></a>
                                                    </div>
                                                    <div>
                                                        <small><a href="">Заголовок</a></small>
                                                        <p  >Какой-то текст (описание). Какой-то текст ..</p>
                                                    </div>
                                                </div>
                                            </div>
                                            3
                                            <div class="col-md-24 block-style-1 block-shadow m-b-10 hover-horder"> отступы блоков m-b-10

                                                <div class="news-aside-content">
                                                    <div>
                                                        <a href=""><?php //echo Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?></a>
                                                    </div>
                                                    <div>
                                                        <small><a href="">Заголовок</a></small>
                                                        <p  >Какой-то текст (описание). Какой-то текст ..</p>
                                                    </div>
                                                </div>
                                            </div>
                                            4
                                            <div class="col-md-24 block-style-1 block-shadow hover-horder"> отступы блоков m-b-10

                                                <div class="news-aside-content">
                                                    <div>
                                                        <a href=""><?php //echo Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?></a>
                                                    </div>
                                                    <div>
                                                        <small><a href="">Заголовок</a></small>
                                                        <p  >Какой-то текст (описание). Какой-то текст ..</p>
                                                    </div>
                                                </div>
                                            </div>-->

                                        </div>

                                    </div>
                                </div>

                                <!--секция - блок иконок и категорий-->
                                <!-- <div id="iconslinks-aside" class="row selection">
                                    <div class="col-md-24">

                                        <div class="row">
                                            <div class="h3-box-selection">
                                                <span class="sprite sprite-circle-women"></span>
                                                <h3 class="h3-selection b-dash-light-purple">Удобная беременность</h3>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-24 block-style-1 block-shadow">
                                                <div class="row iconslinks-aside-box">
                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-ico-some"></span></span>
                                                                <span class="t-wrap">Категория1</span>
                                                            </a>
                                                        </p>
                                                    </div>


                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-ico-stork"></span></span>
                                                                <span class="t-wrap">Категория2</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                    <div class="clearfix visible-lg visible-md"></div>

                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-ico-some-1"></span></span>
                                                                <span class="t-wrap">Категория3</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-ico-abc"></span></span>
                                                                <span class="t-wrap">Категория4</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                    <div class="clearfix visible-lg visible-md"></div>

                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-ico-m"></span></span>
                                                                <span class="t-wrap">Категория5</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-ico-w"></span></span>
                                                                <span class="t-wrap">Категория6</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                    <div class="clearfix visible-lg visible-md"></div>

                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-ico-figure"></span></span>
                                                                <span class="t-wrap">Категория7</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-fork-and-knife"></span></span>
                                                                <span class="t-wrap">Категория8</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                    <div class="clearfix visible-lg visible-md"></div>

                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-ruler"></span></span>
                                                                <span class="t-wrap">Категория9</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                    <div class="col-md-12 wrap-it">
                                                        <p class="hover-horder">
                                                            <a href="">
                                                                <span class="i-wrap"><span class="sprite sprite-plus"></span></span>
                                                                <span class="t-wrap">Категория10</span>
                                                            </a>
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div> -->

    <div class="row selection">

        <script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>

        <!-- VK Widget -->
        <div id="vk_groups" style="margin: auto; "></div>
        <script type="text/javascript">
            VK.Widgets.Group("vk_groups", {
                mode: 0,
                width: "400",
                height: "400",
                color1: 'FFFFFF',
                color2: '2B587A',
                color3: '5B7FA6'
            }, 121676155);
        </script>

    </div>


                                <!--секция - блок слайдер-->
<?php
    $this->registerCssFile('@web/css/owl.carousel.css',  ['position' => yii\web\View::POS_HEAD]);
    $this->registerCssFile('@web/css/owl.theme.default.min.css',  ['position' => yii\web\View::POS_HEAD]);

    $this->registerJsFile('@web/js/owl.carousel.min.js',  ['position' => yii\web\View::POS_END]);
?>
<!--    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <script src="/js/owl.carousel.min.js"></script>-->

    <script>
        $(document).ready(function(){
            $("#daypregnant").owlCarousel({
                items : 1,
                loop : true,
                autoplay : true,
                autoplayTimeout : 4000
            });
        });
    </script>

    <style>
        #slider-aside .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
            background: #CCBBA2;
        }
    </style>

                                <div id="slider-aside" class="row selection">
                                    <div class="col-md-24">

                                        <div class="row">
                                            <div class="h3-box-selection">
                                                <span class="sprite sprite-circle-ey"></span>
                                                <h3 class="h3-selection b-dash-light-brown">Новый день</h3>
                                                <p class="h3-control" style="display: none; ">
                                                    <a  class="control-arrow" href=""><span class="sprite sprite-left-smoll-button"></span></a>
                                                    <a  class="control-arrow" href=""><span class="sprite sprite-rigth-smoll-button"></span></a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div id="daypregnant" class="col-md-24 block-style-1 block-shadow">
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
<!--                                                        <img class="" src="/css/img/slider1.jpg" alt="">-->
                                                        <?= Html::img('@web/css/img/slider1.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Любовь</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
<!--                                                        <img class="" src="/css/img/slider2.jpg" alt="">-->
                                                        <?= Html::img('@web/css/img/slider2.jpg', ['style'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Долгожданное</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
                                                        <?= Html::img('@web/css/img/slider3.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Привет, это я</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
                                                        <?= Html::img('@web/css/img/slider4.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Счастье</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
                                                        <?= Html::img('@web/css/img/slider5.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Как дела</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
                                                        <?= Html::img('@web/css/img/slider6.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Папа, мама, я</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
                                                        <?= Html::img('@web/css/img/slider7.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Мгновение</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
                                                        <?= Html::img('@web/css/img/slider8.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Очень скоро</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
                                                        <?= Html::img('@web/css/img/slider9.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Новые открытия</a>
                                                    </div>
                                                </div>
                                                <div class="aside-block-slider">
                                                    <div id="aside-slider-box">
                                                        <?= Html::img('@web/css/img/slider10.jpg', ['alt'=>'', 'class'=>'']);?>
                                                    </div>

                                                    <div class="aside-caption-slider">
                                                        <a href="#" class="">Ты и я</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--секция - цитаты-->

    <script>
        $(document).ready(function(){
            $("#citati").owlCarousel({
                items : 1,
                loop : true,
                autoplay : true,
                autoplayTimeout : 6000
            });
        });
    </script>
    <style>
        .owl-theme .owl-controls {
            margin-top: 0px;
        }
        #quote-aside .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
            background: #EFA4C9;
        }
    </style>



                                <div id="quote-aside" class="row selection">
                                    <div class="col-md-24">
                                        <!--заголовок-->
                                        <div class="row">
                                            <div class="h3-box-selection">
                                                <span class="sprite sprite-circle-bulb-rose"></span>
                                                <h3 class="h3-selection b-dash-light-rose-2">Цитатник</h3>
                                            </div>
                                        </div>
                                        <!--контент-->
                                        <div class="row">
                                            <div id="citati" class="col-md-24 block-style-1 block-shadow">
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Если больному после разговора с врачом не стало легче, то это не врач.
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Владимир Бехтерев</cite>
                                                            <p>Психолог</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Воспитывать... самая трудная вещь. Думаешь: ну, все теперь кончилось! Не тут-то было: только начинается!
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Лермонтов М. Ю.</cite>
                                                            <p>Поэт</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Все в женщине – загадка, и все в женщине имеет одну разгадку: она называется беременностью.
                                                            Мужчина для женщины средство; целью бывает всегда ребенок.
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Фридрих Вильгельм Ницше.</cite>
                                                            <p>Так говорил Заратустра</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Акушерство так же непредсказуемо, как поведение породистого жеребца. Сейчас он — само спокойствие, а через две минуты может, испугавшись ёжика, подняться в галоп.
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Татьяна Соломатина.</cite>
                                                            <p>Акушер</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Женщина — всегда женщина. Даже с огромным животом в предбаннике операционной. Если рядом, конечно, есть мужчина.
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Татьяна Соломатина.</cite>
                                                            <p>Акушер</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Когда Господь посылает женщине такое Чудо, как беременность, Он дает ей шанс сделать этот мир лучше, светлее, чище. Но то, как распорядится женщина этим даром, зависит только от неё самой.
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Екатерина Сиванова</cite>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Присмотритесь как-нибудь к беременной женщине: вам кажется, что она переходит улицу, или работает, или даже говорит с вами. Ничего подобного. Она думает о своем ребенке.
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Анна Гавальда</cite>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Хорошенькая женщина после первого ребёнка оказывается в очень уязвимом положении. Ей надо увериться, что всё так же пленительна. И только преданное поклонение какого-нибудь нового мужчины может доказать ей, что ничего не изменилось.
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Фрэнсис Скотт Фицджеральд</cite>
                                                            <p>Писатель</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Когда женщина собирается рожать, природа с нею что-то делает, окружает её какой-то аурой, придаёт ей особую привлекательность...
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Джин Плейди</cite>
                                                            <p>Писатель</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="quote-box-aside">
                                                    <div id="blockquote-wrap">
                                                        <blockquote>
                                                            Внутри меня — человек. Это чудо. Это невероятное чудо. Почему об этом не кричат на каждом углу? Почему появление нового айфона — несусветное событие, а появление из ничего нового человека — обыденность?
                                                        </blockquote>
                                                        <div id="blockquote-footer">
                                                            <cite title="Source Title">Тамара Лисицкая</cite>
                                                            <p>Писатель</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--секция - темы-->
                                <div id="topics-aside" class="row selection">
                                    <div class="col-md-24">
                                        <!--заголовок-->
                                        <div class="row">
                                            <div class="h3-box-selection">
                                                <span class="sprite sprite-circle-bulb-green"></span>
                                                <h3 class="h3-selection b-dash-light-brightgreen">Темы</h3>
                                                <p class="h3-control">
                                                    <a class="control-but">Все</a>
                                                </p>
                                            </div>
                                        </div>
                                        <!--контент-->
                                        <div class="row">
                                            <div class="col-md-24 block-style-1 block-shadow">
                                                <ul id="topics-box-aside">

                                                    <li><a style="font-size:100%" href="/articles/category/plan">планирование</a></li>
                                                    <li><a style="font-size:125%" href="/articles/post/coffee-pri-beremennosti">кофе</a></li>
                                                    <li><a style="font-size:75%" href="/articles/post/toksikoz-pri-beremennosti">токсикоз</a></li>
                                                    <li><a style="font-size:125%" href="#">форум</a></li>
                                                    <li><a style="font-size:175%" href="/articles/category/baby">ребенок</a></li>
                                                    <li><a style="font-size:75%" href="/articles/post/orvi-opasnost-dlya-beremennoi">орви</a></li>
                                                    <li><a style="font-size:100%" href="/articles/post/4secrets-podguzniki">подгузники</a></li>
                                                    <li><a style="font-size:225%" href="/articles/post/simptomi-beremennosti">симптомы беременности</a></li>
                                                    <li><a style="font-size:100%" href="/articles/post/beremennost-i-fiz-nagruzki">физические нагрузки</a></li>
                                                    <li><a style="font-size:75%" href="/articles/category/rodi">роды</a></li>
                                                    <li><a style="font-size:175%" href="/articles/post/prinyatie-vanni-pri-beremennosti">принятие ванны</a></li>
                                                    <li><a style="font-size:100%" href="/articles/category/posle-vupiski">после выписки</a></li>
                                                    <li><a style="font-size:250%" href="/articles/category/pregnancy">беременность</a></li>
                                                    <li><a style="font-size:100%" href="/articles/post/izmenenie-vkusa">изменение вкуса</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </aside>
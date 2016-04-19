<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<!--///////////////////////////////////секция горизонтальная подборка материалов////////////////////////////////////////////-->
<div class="row selection">

    <div id="selection-horizontal-1" class="col-xs-24 selection-horizontal">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-f"></span>
                <h3 class="h3-selection b-dash-light-green">Беременность</h3>
                <p class="h3-control">
                    <a  class="control-arrow" href=""><span class="sprite sprite-left-smoll-button"></span></a>
                    <a  class="control-arrow" href=""><span class="sprite sprite-rigth-smoll-button"></span></a>
                </p>
            </div>
        </div>
        <div class="row">
            <!--картинки-->
            <!--1-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal" src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal  center-text">
                        <p>The Truth About Essential Oils During Pregnancy</p>
                    </div>
                </div>
            </div>

            <!--2-->

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>The Truth About Essential Oils During Pregnancy</p>
                    </div>
                </div>
            </div>

            <!--3 hidden-xs-->

            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

            <!--4 hidden-xs-->

            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--visible-sm visible-xs...................................секция - подписаться visible-sm visible-xs..........................................-->
<div id="subscribe" class="row selection visible-sm visible-xs">
    <div class="col-xs-24">
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

                <p class="label-subscribe">Подпишитесь на бесплатную рассылку. Получите в подарок бесплатную версию журнала.</p>
                <form id="subscribe-form" role="form" class="">
                    <!--                                                    <label for="exampleInput"></label>-->
                    <input type="email" class="" placeholder="Введите ваш email">
                    <button type="submit" class="">Отправить</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!--visible-sm visible-xs...................................секция - новости..........................................-->
<div id="news-aside" class="row selection visible-sm visible-xs">
    <div class="col-xs-24">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-bell"></span>
                <h3 class="h3-selection b-dash-light-yellow">Новости</h3>
                <p class="h3-control">
                    <a class="control-but">Все</a>
                </p>
            </div>
        </div>
        <!--контент-->
        <div class="row">
            <!--1-->
            <div class="col-sm-12 block-style-1 block-shadow m-b-10 hover-horder"><!-- отступы блоков m-b-10 -->

                <div class="news-aside-content">
                    <div>
                        <a href=""><img class="" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div>
                        <small><a href="">Заголовок</a></small>
                        <p>Какой-то текст (описание). Какой-то текст ..</p>
                    </div>
                </div>
            </div>
            <!--2-->
            <div class="col-sm-12 block-style-1 block-shadow m-b-10 hover-horder">

                <div class="news-aside-content">
                    <div>
                        <a href=""><img class="" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div>
                        <small><a href="">Заголовок</a></small>
                        <p>Какой-то текст (описание). Какой-то текст ..</p>
                    </div>
                </div>
            </div>
            <!--3-->
            <div class="col-sm-12 block-style-1 block-shadow m-b-10 hover-horder"><!-- отступы блоков m-b-10 -->

                <div class="news-aside-content">
                    <div>
                        <a href=""><img class="" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div>
                        <small><a href="">Заголовок</a></small>
                        <p  >Какой-то текст (описание). Какой-то текст ..</p>
                    </div>
                </div>
            </div>
            <!--4-->
            <div class="col-sm-12 block-style-1 block-shadow hover-horder"><!-- отступы блоков m-b-10 -->

                <div class="news-aside-content">
                    <div>
                        <a href=""><img class="" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div>
                        <small><a href="">Заголовок</a></small>
                        <p  >Какой-то текст (описание). Какой-то текст ..</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- visible-sm visible-xs...................................секция - блок иконок и категорий........................-->
<div id="iconslinks-aside" class="row selection visible-sm visible-xs">
    <div class="col-xs-24">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-women"></span>
                <h3 class="h3-selection b-dash-light-purple">Удобная беременность</h3>
            </div>
        </div>
        <!--контент-->
        <div class="row">
            <div class="col-md-24 block-style-1 block-shadow">
                <div class="row iconslinks-aside-box">

                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-ico-some"></span></span>
                                <span class="t-wrap">Категория1</span>
                            </a>
                        </p>
                    </div>


                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-ico-stork"></span></span>
                                <span class="t-wrap">Категория2</span>
                            </a>
                        </p>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-ico-some-1"></span></span>
                                <span class="t-wrap">Категория3</span>
                            </a>
                        </p>
                    </div>

                    <div class="clearfix visible-sm"></div>

                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-ico-abc"></span></span>
                                <span class="t-wrap">Категория4</span>
                            </a>
                        </p>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-ico-m"></span></span>
                                <span class="t-wrap">Категория5</span>
                            </a>
                        </p>
                    </div>

                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-ico-w"></span></span>
                                <span class="t-wrap">Категория6</span>
                            </a>
                        </p>
                    </div>

                    <div class="clearfix visible-sm visible-xs"></div>

                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-ico-figure"></span></span>
                                <span class="t-wrap">Категория7</span>
                            </a>
                        </p>
                    </div>

                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-fork-and-knife"></span></span>
                                <span class="t-wrap">Категория8</span>
                            </a>
                        </p>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-sm-8 col-xs-12 wrap-it">
                        <p class="hover-horder">
                            <a href="">
                                <span class="i-wrap"><span class="sprite sprite-ruler"></span></span>
                                <span class="t-wrap">Категория9</span>
                            </a>
                        </p>
                    </div>

                    <div class="clearfix visible-sm"></div>

                    <div class="col-sm-8 col-xs-12 wrap-it">
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
</div>



<!---------------------------------Секция вертикальная подборка материалов---------------------------------------------->
<div class="row selection">
    <div class="col-xs-24  selection-vertical">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-ph"></span>
                <h3 class="h3-selection b-dash-light-red">Питание</h3>
                <p class="h3-control">
                    <a class="control-but">Смотреть все</a>
                </p>
            </div>
        </div>
        <div class="row">
            <!--материалы -->
            <!--1-->
            <div class="col-md-24 col-sm-24 col-xs-24 selection-vertical-content  block-style-1 block-shadow hover-horder">
                <div class="row box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <a href=""><img class="img-selection-vertical" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div class="col-md-17 col-sm-17 col-xs-17">
                        <div class="textbox-selection-vertical">
                            <h4 class="h4-selection-vertical"><a href="">Заголовок</a></h4>
                            <p>1Какой-то текст (описание) .Какой-то текст (описание) ...Какой-то текст (описание) ...Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) ...</p>
                        </div>
                    </div>
                </div>
                <ul class="icon-box">
                    <li><a href=""><span class="sprite sprite-ico-arrow"></span><small>0</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-heart"></span><small>15</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-comment"></span><small>1</small></a></li>
                </ul>
            </div>

            <!--2-->
            <div class="col-md-24 col-sm-24 col-xs-24 selection-vertical-content  block-style-1 block-shadow hover-horder">
                <div class="row row box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <a href=""><img class="img-selection-vertical" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div class="col-md-17 col-sm-17 col-xs-17">
                        <div class="textbox-selection-vertical">
                            <h4 class="h4-selection-vertical"><a href="">Заголовок</a></h4>
                            <p  >Какой-то текст (описание) .Какой-то текст (описание) ...Какой-то текст (описание) ...Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) ...</p>
                        </div>
                    </div>
                </div>
                <ul class="icon-box">
                    <li><a href=""><span class="sprite sprite-ico-arrow"></span><small>0</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-heart"></span><small>15</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-comment"></span><small>1</small></a></li>
                </ul>
            </div>

            <!--3-->
            <div class="col-md-24 col-sm-24 col-xs-24 selection-vertical-content  block-style-1 block-shadow hover-horder">
                <div class="row row box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <a href=""><img class="img-selection-vertical" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div class="col-md-17 col-sm-17 col-xs-17">
                        <div class="textbox-selection-vertical">
                            <h4 class="h4-selection-vertical"><a href="">Заголовок</a></h4>
                            <p  >Какой-то текст (описание) .Какой-то текст (описание) ...Какой-то текст (описание) ...Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) ...</p>
                        </div>
                    </div>
                </div>
                <ul class="icon-box">
                    <li><a href=""><span class="sprite sprite-ico-arrow"></span><small>0</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-heart"></span><small>15</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-comment"></span><small>1</small></a></li>
                </ul>
            </div>

        </div>
    </div>
</div>

<!---------------------------------секция горизонтальная подборка материалов------------------------------------------------->
<div class="row selection">
    <div id="selection-horizontal-2" class="col-xs-24 selection-horizontal">

        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle"></span>
                <h3 class="h3-selection b-dash-light-grey">Психология</h3>
                <p class="h3-control">
                    <a  class="control-arrow" href=""><span class="sprite sprite-left-smoll-button"></span></a>
                    <a  class="control-arrow" href=""><span class="sprite sprite-rigth-smoll-button"></span></a>
                </p>
            </div>
        </div>
        <div class="row">
            <!--картинки-->
            <!--1-->
            <div class="col-sm-6 col-xs-12">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal" src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal  center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

            <!--2-->

            <div class="col-sm-6 col-sm-6 col-xs-12">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

            <!--3 hidden-xs-->

            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

            <!--4 hidden-xs-->

            <div class="col-sm-6 hidden-xs">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!--visible-sm visible-xs...................................секция - блок слайдер....................................-->
<div id="slider-aside" class="row selection visible-sm visible-xs">
    <div class="col-xs-24">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-ey"></span>
                <h3 class="h3-selection b-dash-light-brown">Новый день</h3>
                <p class="h3-control">
                    <a  class="control-arrow" href=""><span class="sprite sprite-left-smoll-button"></span></a>
                    <a  class="control-arrow" href=""><span class="sprite sprite-rigth-smoll-button"></span></a>
                </p>
            </div>
        </div>
        <!--контент-->
        <div class="row">
            <div class="col-sm-24 block-style-1 block-shadow">
                <div class="aside-block-slider">
                    <div id="aside-slider-box">
                        <img class="" src="css/img/index.jpg" alt="...">
                        <span id="l-b-aside-slider-box" class="sprite sprite-left-arrow-medium"></span>
                        <span id="r-b-aside-slider-box" class="sprite sprite-rigth-arrow-medium"></span>
                    </div>

                    <div class="aside-caption-slider">
                        <a href="#" class="">Какой-то текст (описание).Какой-то текст (описание).Какой-то текст.</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!--visible-sm visible-xs...................................секция - цитаты ....hidden-xs............................................-->
<div id="quote-aside" class="row selection visible-sm">
    <div class="col-xs-24">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-bulb-rose"></span>
                <h3 class="h3-selection b-dash-light-rose-2">Цитатник</h3>
                <p class="h3-control">
                    <a  class="control-arrow" href=""><span class="sprite sprite-left-smoll-button"></span></a>
                    <a  class="control-arrow" href=""><span class="sprite sprite-rigth-smoll-button"></span></a>
                </p>
            </div>
        </div>
        <!--контент-->
        <div class="row">
            <div class="col-sm-24 block-style-1 block-shadow">
                <div id="quote-box-aside">
                    <img class="img-circle" src="css/img/index.jpg" alt="...">
                    <div id="blockquote-wrap">
                        <blockquote>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                        </blockquote>
                        <div id="blockquote-footer">
                            <cite title="Source Title">Эдуард Эствил</cite>
                            <p>Доктор</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!---------------------------------Секция вертикальная подборка материалов---------------------------------------------->
<div class="row selection">
    <div class="col-xs-24 selection-vertical">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-pb"></span>
                <h3 class="h3-selection b-dash-light-blue">Роды</h3>
                <p class="h3-control">
                    <a class="control-but">Смотреть все</a>
                </p>
            </div>
        </div>

        <div class="row">
            <!--материалы -->
            <!--1-->
            <div class="col-xs-24 selection-vertical-content  block-style-1 block-shadow hover-horder">
                <div class="row row box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <div class="col-xs-7">
                        <a href=""><img class="img-selection-vertical" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div class="col-xs-17">
                        <div class="textbox-selection-vertical">
                            <h4 class="h4-selection-vertical"><a href="">Заголовок</a></h4>
                            <p  >Какой-то текст (описание) .Какой-то текст (описание) ...Какой-то текст (описание) ...Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) ...</p>
                        </div>
                    </div>
                </div>
                <ul class="icon-box">
                    <li><a href=""><span class="sprite sprite-ico-arrow"></span><small>0</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-heart"></span><small>15</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-comment"></span><small>1</small></a></li>
                </ul>
            </div>

            <!--2-->
            <div class="col-xs-24 selection-vertical-content  block-style-1 block-shadow hover-horder">
                <div class="row row box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <div class="col-xs-7">
                        <a href=""><img class="img-selection-vertical" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div class="col-xs-17">
                        <div class="textbox-selection-vertical">
                            <h4 class="h4-selection-vertical"><a href="">Заголовок</a></h4>
                            <p  >Какой-то текст (описание) .Какой-то текст (описание) ...Какой-то текст (описание) ...Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) ...</p>
                        </div>
                    </div>
                </div>
                <ul class="icon-box">
                    <li><a href=""><span class="sprite sprite-ico-arrow"></span><small>0</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-heart"></span><small>15</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-comment"></span><small>1</small></a></li>
                </ul>
            </div>

            <!--3-->
            <div class="col-xs-24 selection-vertical-content  block-style-1 block-shadow hover-horder">
                <div class="row row box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <div class="col-xs-7">
                        <a href=""><img class="img-selection-vertical" src="css/img/index.jpg" alt="..."></a>
                    </div>
                    <div class="col-xs-17">
                        <div class="textbox-selection-vertical">
                            <h4 class="h4-selection-vertical"><a href="">Заголовок</a></h4>
                            <p  >Какой-то текст (описание) .Какой-то текст (описание) ...Какой-то текст (описание) ...Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) .Какой-то текст (описание) ...</p>
                        </div>
                    </div>
                </div>
                <ul class="icon-box">
                    <li><a href=""><span class="sprite sprite-ico-arrow"></span><small>0</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-heart"></span><small>15</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-comment"></span><small>1</small></a></li>
                </ul>
            </div>

        </div>
    </div>
</div>


<!--visible-sm...................................секция - темы.  visible-sm................................................-->
<div id="topics-aside" class="row selection visible-sm">
    <div class="col-xs-24">
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
            <div class="col-sm-24 block-style-1 block-shadow">
                <ul id="topics-box-aside">

                    <li><a style="font-size:100%" href="#">надпись</a></li>
                    <li><a style="font-size:125%" href="#">слово тег2</a></li>
                    <li><a style="font-size:75%" href="#">название статьи</a></li>
                    <li><a style="font-size:125%" href="#">фраза тег4</a></li>
                    <li><a style="font-size:175%" href="#">название тег5</a></li>
                    <li><a style="font-size:75%" href="#">тег6</a></li>
                    <li><a style="font-size:100%" href="#">слово тег6</a></li>
                    <li><a style="font-size:225%" href="#">тег7</a></li>
                    <li><a style="font-size:100%" href="#">какой-то тег8</a></li>
                    <li><a style="font-size:75%" href="#">тег10</a></li>
                    <li><a style="font-size:175%" href="#">надпись тег11</a></li>
                    <li><a style="font-size:100%" href="#">тег12</a></li>
                    <li><a style="font-size:250%" href="#">название статьи</a></li>
                    <li><a style="font-size:100%" href="#">какой-то тег8</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>


<!---------------------------------секция горизонтальная подборка материалов------------------------------------------------->
<div class="row selection">

    <div id="selection-horizontal-3" class="col-xs-24 selection-horizontal">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-pfb"></span>
                <h3 class="h3-selection b-dash-light-rose">Новорожденный</h3>
                <p class="h3-control">
                    <a  class="control-arrow" href=""><span class="sprite sprite-left-smoll-button"></span></a>
                    <a  class="control-arrow" href=""><span class="sprite sprite-rigth-smoll-button"></span></a>
                </p>
            </div>
        </div>
        <div class="row">
            <!--картинки-->
            <!--1-->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal" src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal  center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

            <!--2-->

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

            <!--3 hidden-xs-->

            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

            <!--4 hidden-xs-->

            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="block-shadow hover-horder box-block-w100-h100">
                    <a href="" class="block-w100-h100"></a>
                    <a href="#" class="">
                        <img class="img-selection-horizontal"  src="css/img/index.jpg" alt="...">
                    </a>
                    <div class="caption-selection-horizontal   center-text">
                        <p>Какой-то текст (описание) ...</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!--visible-xs...................................секция - темы.  visible-xs................................................-->
<div id="topics-aside" class="row selection visible-xs">
    <div class="col-xs-24">
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
            <div class="col-xs-24 block-style-1 block-shadow">
                <ul id="topics-box-aside">

                    <li><a style="font-size:100%" href="#">надпись</a></li>
                    <li><a style="font-size:125%" href="#">слово тег2</a></li>
                    <li><a style="font-size:75%" href="#">название статьи</a></li>
                    <li><a style="font-size:125%" href="#">фраза тег4</a></li>
                    <li><a style="font-size:175%" href="#">название тег5</a></li>
                    <li><a style="font-size:75%" href="#">тег6</a></li>
                    <li><a style="font-size:100%" href="#">слово тег6</a></li>
                    <li><a style="font-size:225%" href="#">тег7</a></li>
                    <li><a style="font-size:100%" href="#">какой-то тег8</a></li>
                    <li><a style="font-size:75%" href="#">тег10</a></li>
                    <li><a style="font-size:175%" href="#">надпись тег11</a></li>
                    <li><a style="font-size:100%" href="#">тег12</a></li>
                    <li><a style="font-size:250%" href="#">название статьи</a></li>
                    <li><a style="font-size:100%" href="#">какой-то тег8</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>

<!--visible-xs...................................секция - цитаты ....visible-xs............................................-->
<div id="quote-aside" class="row selection visible-xs">
    <div class="col-xs-24">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-bulb-rose"></span>
                <h3 class="h3-selection b-dash-light-rose-2">Цитатник</h3>
                <p class="h3-control">
                    <a  class="control-arrow" href=""><span class="sprite sprite-left-smoll-button"></span></a>
                    <a  class="control-arrow" href=""><span class="sprite sprite-rigth-smoll-button"></span></a>
                </p>
            </div>
        </div>
        <!--контент-->
        <div class="row">
            <div class="col-xs-24 block-style-1 block-shadow">
                <div id="quote-box-aside">
                    <img class="img-circle" src="css/img/index.jpg" alt="...">
                    <div id="blockquote-wrap">
                        <blockquote>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                        </blockquote>
                        <div id="blockquote-footer">
                            <cite title="Source Title">Эдуард Эствил</cite>
                            <p>Доктор</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

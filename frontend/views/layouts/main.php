<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>TODO supply a title</title>
        <link type="text/css" rel="StyleSheet" href="css/bootstrap/bootstrap.min.css" >
        <link type="text/css" rel="StyleSheet" href="css/general-css/pages.css" >
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery1.11.3.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="js/selectivizr-v1.0.3b.js"></script>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="visible-md">
            <h1 style="color:red">Средние учтройства md</h1>
        </div>
        <div class="visible-sm">
            <h1 style="color:red">Планшеты sm</h1>
        </div>
        <div class="visible-xs">
            <h1 style="color:red">Телефоы xs</h1>
        </div>

        <div id="all">
            <!--Шапка-->
            <header>
                <div class="container-fluid">
                    <!--полоса с ссылками соцсетей-->
                    <div id="top-line" class="row">
                        <div class="col-md-8 col-md-offset-15 col-sm-8 col-sm-offset-16 col-xs-21 col-xs-offset-2">
                            <ul id="top-line-boxsoc">
                                <li id="soc-ico-1"><a href=""><span class="sprite sprite-soc-buttons-top"></span></a></li>
                                <li id="soc-ico-2"><a href=""><span class="sprite sprite-soc-buttons-top"></span></a></li>
                                <li id="soc-ico-3"><a href=""><span class="sprite sprite-soc-buttons-top"></span></a></li>
                                <li id="soc-ico-4"><a href=""><span class="sprite sprite-soc-buttons-top"></span></a></li>
                                <li id="soc-ico-5"><a href=""><span class="sprite sprite-soc-buttons-top"></span></a></li>
                            </ul>
                        </div>
                    </div>
<!----------------------------------------------------шапка сайта----------------------------------------------------->
                    <div id="header-content" class="row">
                        <div id="header-logo-box" class="col-sm-24">
                            <div class="row">
                                <!--logo-->
                                <div  id="header-logo" class="col-lg-9 col-lg-offset-1 col-md-10 col-sm-24 col-xs-24">
                                    <a href="">
                                        <span class="sprite sprite-logo hidden-xs"></span>
                                        <img class="logo-img-xs visible-xs" src="css/img/logo.jpg" alt="...">
                                    </a>
                                </div>

                                <div  id="header-actions" class="col-md-14 col-sm-24">
                                    <div class="row">

                                        <!--search-->
                                        <div id="search-action-box" class="col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-14 col-xs-12 col-xs-offset-11">
                                            <form id="search-form" class="">
                                                <input id="search-small-dev-480" type="search" class=""  placeholder="Поиск">
                                                <button type="submit" class=""><span class="sprite sprite-enlarger"></span></button>
                                            </form>
                                        </div>

                                        <!--email-->
                                        <div id="email-action-box" class="col-md-10 hidden-sm hidden-xs">
                                            <form id="search-form" role="form" class="">

                                                    <input type="email" class="" placeholder="Введите ваш email">
                                                    <button type="submit" class="">Подписаться</button>

                                            </form>
                                        </div>

                                        <!--arrow-->
                                        <div class="col-md-5 hidden-sm hidden-xs">
                                            <div id="header-arrow-text"><img src="css/img/header-arrow-text.jpg"></div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
<!------------------------------------------верхнее меню сайта------------------------------------------------------->
                    <div id="header-nav" class="row hidden-sm hidden-xs">
                        <div class="col-md-22 col-md-offset-1">
                            <ul id="header-nav-menu">
                                <li class="cat-box"><a href="">Главная</a>
<!--                                    <ul>
                                        <li><a href="">Контакты</a></li>
                                        <li><a href="">Сервисы</a></li>
                                        <li><a href="">Статьи</a></li>
                                    </ul>-->
                                </li>
                                <li><a href="">Беременность</a></li>
                                <li><a href="">Роды</a></li>
                                <li><a href="">Ребенок</a></li>
                                <li><a href="">Кормление</a></li>
                                <li class="cat-box"><a href="">Сервисы</a>
<!--                                    <ul>
                                        <li><a href="">Контакты</a></li>
                                        <li><a href="">Сервисы</a></li>
                                        <li><a href="">Статьи</a></li>
                                    </ul>-->
                                </li>
                                <li><a href="">Контакты</a></li>
                            </ul>
                            <div id="header-nav-menu-before"></div>
                        </div>

                    </div>
                </div>
            </header>

<!----------------------------------------------слайдер в верхней части-------------------------------------------->
            <div class="container-fluid">
                <div class="row">
                    <div id="slider">
                        <div id="slider-box" class="col-md-20 col-md-offset-2 col-sm-24 col-xs-24">
                            <ul>
                                <li> тут будет слайдер</li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                ЦЕТРАЛЬНЫЙ БЛОК
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <main class="container-fluid">
                <div class="row">
                    <!--весь центральный блок-->
                    <div class="col-md-22 col-md-offset-1 col-sm-22 col-sm-offset-1 col-xs-22 col-xs-offset-1">
                        <div class="row">

<!---------------------------------------блок article------------------------------------------------------------------------>
                            <article class="col-md-15">
<!---------------------------------секция горизонтальная подборка материалов------------------------------------------------->
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



                            </article>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                    Блок aside visible-lg visible-md
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
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

                                <!--секция - новости-->
                                <div id="news-aside" class="row selection">
                                    <div class="col-md-24">
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
                                            <div class="col-md-24 block-style-1 block-shadow m-b-10 hover-horder"><!-- отступы блоков m-b-10 -->

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
                                            <!--2-->
                                            <div class="col-md-24 block-style-1 block-shadow m-b-10 hover-horder">

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
                                            <!--3-->
                                            <div class="col-md-24 block-style-1 block-shadow m-b-10 hover-horder"><!-- отступы блоков m-b-10 -->

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
                                            <div class="col-md-24 block-style-1 block-shadow hover-horder"><!-- отступы блоков m-b-10 -->

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

                                <!--секция - блок иконок и категорий-->
                                <div id="iconslinks-aside" class="row selection">
                                    <div class="col-md-24">
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
                                </div>

                                <!--секция - блок слайдер-->
                                <div id="slider-aside" class="row selection">
                                    <div class="col-md-24">
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
                                            <div class="col-md-24 block-style-1 block-shadow">
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

                                <!--секция - цитаты-->
                                <div id="quote-aside" class="row selection">
                                    <div class="col-md-24">
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
                                            <div class="col-md-24 block-style-1 block-shadow">
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


                            </aside>

                            <!--блок ссылок центрального контейнера-->
                            <div id="wrap-linkbox" class="col-md-24 col-xs-24">
                                <div class="linkbox-centerblock">

                                    <section class="block-linkbox">
                                        <div>
                                        <h5 class="h5-block-linkbox">Название1</h5>
                                        <ul>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                        </ul>
                                        </div>
                                    </section>

                                    <section class="block-linkbox">
                                        <div>
                                        <h5 class="h5-block-linkbox">Название2</h5>
                                        <ul>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                        </ul>
                                        </div>
                                    </section>

                                    <section class="block-linkbox">
                                        <div>
                                        <h5 class="h5-block-linkbox">Название3</h5>
                                        <ul>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                        </ul>
                                        </div>
                                    </section>

                                    <section class="block-linkbox">
                                        <div>
                                        <h5 class="h5-block-linkbox">Название4</h5>
                                        <ul>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                        </ul>
                                        </div>
                                    </section>

                                    <section class="block-linkbox">
                                        <div>
                                        <h5 class="h5-block-linkbox">Название5</h5>
                                        <ul>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                            <li><a href="">Тема материала</a></li>
                                        </ul>
                                        </div>
                                    </section>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                    Футер
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <footer class="container-fluid">

                <div class="row">
<!--                виден только на visible-lg visible-md-->
                    <div id="wrap-linkbox-footer" class="col-md-24 visible-lg visible-md">
                        <div class="linkbox-footerblock">
                            <section class="block-linkbox-footer">
                                <div>
                                <h5 class="h5-block-linkbox-footer">Название</h5>
                                <ul>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                </ul>
                                </div>
                            </section>

                            <section class="block-linkbox-footer">
                                <div>
                                <h5 class="h5-block-linkbox-footer">Название</h5>
                                <ul>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                </ul>
                                </div>
                            </section>

                            <section class="block-linkbox-footer">
                                <div>
                                <h5 class="h5-block-linkbox-footer">Название</h5>
                                <ul>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                </ul>
                                </div>
                            </section>

                            <section class="block-linkbox-footer">
                                <div>
                                <h5 class="h5-block-linkbox-footer">Название</h5>
                                <ul>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                    <li><a href="">Тема материала</a></li>
                                </ul>
                                </div>
                            </section>

                            <section id="send-emale" class="block-linkbox-footer">
                                <div>
                                    <h5 class="h5-block-linkbox-footer">Отправить письмо</h5>
                                    <form id="email-form" role="form" class="">
                                        <input type="email" class="" placeholder="Введите ваш email">
                                        <div id="check-footer-wrap">
                                            <label>
                                                <input id="check-footer" type="checkbox" name="check" value="check2">
                                                <span>Если вы согласны с условиями сайта,то нужно отметить поле.Прочитаейте сначала правила - <a href="">правила</a></span>
                                            </label>

                                            <button type="submit" class=""><i class="sprite sprite-botton-arrow-for-input"></i></button>
                                    </form>

                                    <div id="footer-boxsoc-wrap">
                                        <h5 class="h5-block-linkbox-footer">Соц.сети</h5>
                                        <ul id="footer-boxsoc">
                                            <li id="soc-ico-1"><a href=""><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                            <li id="soc-ico-2"><a href=""><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                            <li id="soc-ico-3"><a href=""><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                            <li id="soc-ico-4"><a href=""><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                            <li id="soc-ico-5"><a href=""><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>

<!--visible-sm visible-xs...................................полосв меню футера.................................................-->
                    <div id="line-linkbox-footer" class="col-xs-24 visible-sm visible-xs">
                        <ul class="row">
                            <li class="col-sm-4 col-xs-5"><span><a href="">Беременность</a></span></li>
                            <li class="col-sm-4 col-xs-5"><span><a href="">Роды</a></span></li>
                            <li class="col-sm-4 col-xs-4"><span><a href="">Ребенок</a></span></li>
                            <li class="col-sm-4 col-xs-5"><span><a href="">Кормление</a></span></li>
                            <li class="col-sm-4 col-xs-5"><span><a href="">Сервисы</a></span></li>
                            <!--hidden-xs-->
                            <li class="col-sm-4 hidden-xs">
                                <ul id="footer-boxsoc-min">
                                    <li id="soc-ico-1-min"><a href=""><span class="sprite-soc-bottons-min"></span></a></li>
                                    <li id="soc-ico-2-min"><a href=""><span class="sprite-soc-bottons-min"></span></a></li>
                                    <li id="soc-ico-3-min"><a href=""><span class="sprite-soc-bottons-min"></span></a></li>
                                    <li id="soc-ico-4-min"><a href=""><span class="sprite-soc-bottons-min"></span></a></li>
                                    <li id="soc-ico-5-min"><a href=""><span class="sprite-soc-bottons-min"></span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>


                    <div id="copyright" class="col-md-24">
                        <p>&copy; Copyright 2011-2016 Все права защищены. <a href="">О сайте</a> | <a href="">Контакты</a></p>
                    </div>
                </div>

            </footer>
        </div>




<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">


$(document).ready(function(){

//$(".cat-box > a").click(function(){
//  $(".cat-box > ul").toggle();
//});
//
//    if ($(".cat-box > ul").css('display') === 'none')
//        {
//            $(".cat-box > ul").animate({height: 'show'}, 500);
//        }
//    else
//        {
//            $(".cat-box > ul").animate({height: 'hide'}, 500);
//        }


//$('.cat-box').hover(function(){
//    $(this).children('ul').stop(false,true).fadeIn("slow");
////    $(this).children('.menu-drop-down-corner').stop(false,true).fadeIn(300);
//},function(){
//    $(this).children('ul').fadeOut("slow");
////    $(this).children('.menu-drop-down-corner').css("display","none");
//});



//$('.cat-box').hover(function() {
//    $(this).children('ul').show(); // получаем следующий за данным .link элемент (т.е. span)
//},
//function() {
//    $(this).children('ul').hide();
//});


//
//$('.cat-box').hover(
//        function()
//        {
//            $(this).find('ul').fadeIn("slow");
//        })
//        .mouseout(
//        function()
//        {
//            $(this).find('ul').fadeOut("slow");
//        }
//        );

});

</script>
    </body>
</html>
<!--<p style="background-color:blue;width: 100%;height: 20px;"></p>-->

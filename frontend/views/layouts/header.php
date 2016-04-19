<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>

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
<!--///////////////////////////////////////////шапка сайта////////////////////////////////////////////////////////////-->
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
                                            <div id="header-arrow-text"><?= Html::img('@web/css/img/header-arrow-text.jpg', ['alt'=>'', 'class'=>'']);?></div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
<!--///////////////////////////////////////верхнее меню сайта//////////////////////////////////////////////////////////-->
                    <div id="header-nav" class="row hidden-sm hidden-xs">
                        <div class="col-md-22 col-md-offset-1">
                            <ul id="header-nav-menu">
                                <li class="cat-box"><a href="<?=Url::toRoute(['/site/index']);?>">Главная</a>
<!--                                    <ul>
                                        <li><a href="">Контакты</a></li>
                                        <li><a href="">Сервисы</a></li>
                                        <li><a href="">Статьи</a></li>
                                    </ul>-->
                                </li>
                                <li><a href="<?=Url::toRoute(['/site/about']);?>">Информация</a></li>
                                <li><a href="<?=Url::toRoute(['/blog/index']);?>">Блог</a></li>
                                <li><a href="<?=Url::toRoute(['/site/index']);?>">Ребенок</a></li>
                                <li><a href="<?=Url::toRoute(['/site/index']);?>">Кормление</a></li>
                                <li><a href="<?=Url::toRoute(['/site/contact']);?>">Контакты</a></li>
                            </ul>
                            <div id="header-nav-menu-before"></div>
                        </div>

                    </div>
                </div>
            </header>
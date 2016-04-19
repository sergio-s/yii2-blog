<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<aside class="col-md-8 col-md-offset-1 visible-lg visible-md">


                                <?php if(isset($this->params['sidebar']['blog-categoris'])): ?>
                                <!--секция - категории блога-->
                                <div id="subscribe" class="row selection">
                                    <div class="col-md-24">
                                        <!--заголовок-->
                                        <div class="row">
                                            <div class="h3-box-selection">
                                                <span class="sprite sprite-circle-deck"></span>
                                                <h3 class="h3-selection b-dash-light-rose">Категории блога</h3>
                                            </div>
                                        </div>
                                        <!--контент-->
                                        <div class="row">
                                            <div class="col-md-24 block-style-1 block-shadow">
                                                <ul>
                                                    <?php foreach($this->params['sidebar']['blog-categoris'] as $category): ?>
                                                        <li><a href="<?=Url::toRoute(['/blog/category', 'alias' => $category->alias]);?>"><?=$category->title;?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php endif; ?>

                                <!--секция - подписаться-->
                                <div id="subscribe" class="row selection">
                                    <div class="col-md-24">
                                        <!--заголовок-->
                                        <div class="row">
                                            <div class="h3-box-selection">
                                                <span class="sprite sprite-circle-deck"></span>
                                                <h3 class="h3-selection b-dash-light-rose">Новости</h3>
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
                                                        <a href=""><?= Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?></a>
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
                                                        <a href=""><?= Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?></a>
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
                                                        <a href=""><?= Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?></a>
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
                                                        <a href=""><?= Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?></a>
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
                                                        <?= Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?>
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
                                                    <?= Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'']);?>
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
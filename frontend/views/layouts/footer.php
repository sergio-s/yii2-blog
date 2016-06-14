<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\subscription\SubscriptionWidget;
?>

<?php $this->context->footerCatsAndPosts();?>
    <footer class="container-fluid">

                <div class="row">
<!--                виден только на visible-lg visible-md-->
                    <div id="wrap-linkbox-footer" class="col-md-24 visible-lg visible-md">
                        <div class="linkbox-footerblock">
                            <?php foreach($this->context->footerCatsAndPosts() as $block):?>

                                <section class="block-linkbox-footer">
                                    <div>
                                    <h5 class="h5-block-linkbox-footer"><?php echo $block['category']->title ;?></h5>
                                    <ul>
                                        <?php foreach($block['posts'] as $post):?>
                                            <li><a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->blogPost->alias]);?>"><?php echo $post->blogPost->title ;?></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                    </div>
                                </section>

                            <?php endforeach;?>

<!--                            <section class="block-linkbox-footer">
                                <div>
                                <h5 class="h5-block-linkbox-footer">Беременность</h5>
                                <ul>
                                    <li><a href="/articles/post/Kak-spat-pri-beremennosti">Как спать при беременности</a></li>
                                    <li><a href="/articles/post/coffee-pri-beremennosti">Кофе при беременности</a></li>
                                    <li><a href="/articles/post/beremennost-i-fiz-nagruzki">Беременность и физические нагрузки</a></li>
                                    <li><a href="/articles/post/Massaj-pri-beremennosti">Массаж при беременности</a></li>
                                    <li><a href="/articles/post/Psihologicheskie-zanyatiya">Психологические занятия при беременности</a></li>
                                </ul>
                                </div>
                            </section>

                            <section class="block-linkbox-footer">
                                <div>
                                <h5 class="h5-block-linkbox-footer">Планирование</h5>
                                <ul>
                                    <li><a href="/articles/post/prichini-krovyanistih">Причины появления кровянистых выделений</a></li>
                                    <li><a href="/articles/post/kak-izbavitsya-ot-rastyajek">Как избавится от растяжек после родов</a></li>
                                    <li><a href="/articles/post/koliki-y-novorozjdennih">Колики у новорожденного</a></li>
                                    <li><a href="/articles/post/chem-grozit-alkogol">Чем грозит алкоголь беременной?</a></li>
                                    <li><a href="/articles/post/razvod-vo-vremya-beremennosti">Развод во время беременности</a></li>
                                </ul>
                                </div>
                            </section>

                            <section class="block-linkbox-footer">
                                <div>
                                <h5 class="h5-block-linkbox-footer">Роды</h5>
                                <ul>
                                    <li><a href="/articles/post/prinyatie-vanni-pri-beremennosti">Принятие ванны при беременности</a></li>
                                    <li><a href="/articles/post/4secrets-podguzniki">4 секрета подбора подгузников</a></li>
                                    <li><a href="/articles/post/orvi-opasnost-dlya-beremennoi">ОРВИ – большая опасность</a></li>
                                    <li><a href="/articles/post/pereleti-vo-vremya-beremennosti">Авиаперелеты во время беременности</a></li>
                                    <li><a href="/articles/post/vsya-pravda-ob-uzi">Вся правда об УЗИ</a></li>
                                </ul>
                                </div>
                            </section>

                            <section class="block-linkbox-footer">
                                <div>
                                <h5 class="h5-block-linkbox-footer">После выписки</h5>
                                <ul>
                                    <li><a href="/articles/post/raschet-sroka-beremennosti">Расчет срока беременности</a></li>
                                    <li><a href="/articles/post/obezbolivanie-v-rodah">Обезболивание в родах</a></li>
                                    <li><a href="/articles/post/5-somnenii-stoit-li-prisutstvovat">Стоит ли мужчине присутствовать при родах?</a></li>
                                    <li><a href="/articles/post/toksikoz-pri-beremennosti">Токсикоз во время беременности</a></li>
                                    <li><a href="/articles/post/bassein-vo-vremya-beremennosti">Занятия в бассейне при беременности</a></li>
                                </ul>
                                </div>
                            </section>-->

                            <section id="send-emale" class="block-linkbox-footer">
                                <div>
                                    <h5 class="h5-block-linkbox-footer">Подписаться</h5>
<!--                                    <form id="email-form" role="form" class="">
                                        <input type="email" class="" placeholder="Введите ваш email">
                                        <div id="check-footer-wrap">
                                            <label>
                                                <input id="check-footer" type="checkbox" name="check" value="check2">
                                                <span>Если вы согласны с условиями сайта,то нужно отметить поле.Прочитаейте сначала правила - <a href="">правила</a></span>
                                            </label>
                                        </div>
                                            <button type="submit" class=""><i class="sprite sprite-botton-arrow-for-input"></i></button>
                                    </form>-->
                                    <?php echo SubscriptionWidget::widget(['widget_id' => 'SubscriptionFooter', 'modelName' => 'SubscriptionFooter', 'wView' => 'footer']) ?>

                                    <div id="footer-boxsoc-wrap">
                                        <h5 class="h5-block-linkbox-footer">Мы в соц.сетях</h5>
                                        <ul id="footer-boxsoc">
                                            <li id="soc-ico-1"><a href="https://www.facebook.com/groups/1126272094061703/"><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                            <li id="soc-ico-2"><a href="mailto:info@impregnant.ru"><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                            <!-- <li id="soc-ico-3"><a href=""><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                            <li id="soc-ico-4"><a href=""><span class="sprite sprite-soc-bottons-content"></span></a></li>
                                            <li id="soc-ico-5"><a href=""><span class="sprite sprite-soc-bottons-content"></span></a></li> -->
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
                                    <li id="soc-ico-1-min"><a href="https://www.facebook.com/groups/1126272094061703/"><span class="sprite-soc-bottons-min"></span></a></li>
                                    <li id="soc-ico-2-min"><a href="mailto:info@impregnant.ru"><span class="sprite-soc-bottons-min"></span></a></li>
                                    <!-- <li id="soc-ico-3-min"><a href=""><span class="sprite-soc-bottons-min"></span></a></li>
                                    <li id="soc-ico-4-min"><a href=""><span class="sprite-soc-bottons-min"></span></a></li>
                                    <li id="soc-ico-5-min"><a href=""><span class="sprite-soc-bottons-min"></span></a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>


                    <div id="copyright" class="col-md-24">
                        <p>&copy; Copyright 2016 Все права защищены.
                    </div>
                </div>

            </footer>

<?php //echo $this->render('metrics') ?>


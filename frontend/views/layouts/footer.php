<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\subscription\SubscriptionWidget;
?>
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

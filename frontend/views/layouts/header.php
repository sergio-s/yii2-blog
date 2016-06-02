<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\assets\CommentAsset;
use yii\helpers\Url;
use common\widgets\subscription\SubscriptionWidget;
use common\models\User;
use common\components\rbac\rbacRoles;

AppAsset::register($this);
?>

            <header>
                <div class="container-fluid">
                    <!--полоса с ссылками соцсетей-->
                    <div id="top-line" class="row">
                        <div class="col-md-3 col-sm-3 col-xs-2">
                            <!--авторизация по фейсбук и вконтакте-->
                            <?=$this->render('@app/views/layouts/socloginmedium.php'); ?>
                        </div>

                        <div class="col-md-8 col-md-offset-12 col-sm-8 col-sm-offset-12 col-xs-20 col-xs-offset-2">
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
                                <!--вход на сайт-->
                                <div id="login-links">
                                    <!--если гость-->
                                    <?php if (Yii::$app->user->isGuest): ?>
                                            <a href="<?=Url::toRoute(['/site/login']);?>"><small>Вход</small></a>
                                            <a href="<?=Url::toRoute(['/site/signup']);?>"><small>Регистрация</small></a>

                                    <!--если зарегестрированный пользователь-->
                                    <?php else: ?>
                                        <div class="hidden-lg hidden-md"><!--показываем только на малых экранах-->
                                                <?php if(Yii::$app->user->identity->userLoginSocData):?>

                                                    <?php //если юзер вошел через соц сеть и есть отметка 	login_soc = '1' ;?>
                                                    <img style="width: 20px; height:auto; margin-right: 4px;" src="<?php echo Yii::$app->user->identity->userLoginSocData->photo;?>">
                                                    <small>Привет, <?php echo Yii::$app->user->identity->userLoginSocData->first_name;?> </small>

                                                <?php else:?>

                                                    <small>Привет, <?php echo Yii::$app->user->identity->username;?> </small>

                                                <?php endif;?>

                                                <?php if(Yii::$app->user->identity->role == rbacRoles::ROLE_ADMIN && Yii::$app->user->can(rbacRoles::ROLE_ADMIN)):?>
                                                    <a href="<?=Url::to('@web/backend/web');?>"><small>Админ. часть</small></a>
                                                <?php endif;?>

                                                <?php echo
                                                     Html::beginForm(['/site/logout'], 'post',['class' => 'button-like-link'])
                                                    . Html::submitButton('Выход ',['class' => ''])
                                                    . Html::endForm();
                                                ?>

                                        </div>
                                    <?php endif;?>

                                </div>


                                <!--logo-->
                                <div  id="header-logo" class="col-lg-9 col-lg-offset-1 col-md-10 col-sm-24 col-xs-24">
                                    <a href="">
                                        <span class="sprite sprite-logo hidden-xs"></span>
                                        <img class="logo-img-xs visible-xs" src="<?=Yii::getAlias('@web/css/img/logo.jpg');?>" alt="...">
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

                                        <!--email показывается только гостей-->
                                        <?php if (Yii::$app->user->isGuest): ?>
                                        <div id="email-action-box" class="col-md-10 hidden-sm hidden-xs">
<!--                                            <form id="search-form" role="form" class="">

                                                    <input type="email" class="" placeholder="Введите ваш email">
                                                    <button type="submit" class="">Подписаться</button>

                                            </form>-->
                                            <?php echo SubscriptionWidget::widget(['widget_id' => 'SubscriptionHeader', 'modelName' => 'SubscriptionHeader', 'wView' => 'header']) ?>
                                        </div>


                                        <!--arrow-->
                                        <div class="col-md-5 hidden-sm hidden-xs">
                                            <div id="header-arrow-text"><?= Html::img('@web/css/img/header-arrow-text.jpg', ['alt'=>'', 'class'=>'']);?></div>
                                        </div>

                                        <!--если зарегестрированный пользователь-->
                                        <?php else: ?>
                                        <!--email показывается только пользователям-->
                                        <div class="col-md-11 hidden-sm hidden-xs">
                                            <?php if(Yii::$app->user->identity->userLoginSocData):?>

                                            <?php //если юзер вошел через соц сеть и есть отметка 	login_soc = '1' ;?>
                                            <img style="width: 20px; height:auto; margin-right: 4px;" src="<?php echo Yii::$app->user->identity->userLoginSocData->photo;?>">
                                            <small>Привет, <?php echo Yii::$app->user->identity->userLoginSocData->first_name;?> | </small>

                                            <?php else:?>

                                                <small>Привет, <?php echo Yii::$app->user->identity->username;?> | </small>

                                            <?php endif;?>

                                            <?php if(Yii::$app->user->identity->role == rbacRoles::ROLE_ADMIN && Yii::$app->user->can(rbacRoles::ROLE_ADMIN)):?>
                                                <a href="<?=Url::to('@web/backend/web');?>"><small>Админ. часть</small></a> |
                                            <?php endif;?>

                                            <?php echo
                                                Html::beginForm(['/site/logout'], 'post',['class' => 'button-like-link'])
                                                . Html::submitButton('Выход ',['class' => ''])
                                                . Html::endForm();
                                            ?>
                                        </div>
                                        <?php endif;?>
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

<?php
//    $identity = Yii::$app->getUser()->getIdentity();
//    if (isset($identity->profile)) {
//        \yii\helpers\VarDumper::dump($identity->profile, 10, true);
//    }




?>
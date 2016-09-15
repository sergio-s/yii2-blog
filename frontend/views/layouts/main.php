<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <?= Html::csrfMetaTags() ?>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
<!--        <link type="text/css" rel="StyleSheet" href="css/bootstrap/bootstrap.min.css" >
        <link type="text/css" rel="StyleSheet" href="css/general-css/pages.css" >

         jQuery (necessary for Bootstrap's JavaScript plugins)
        <script src="js/jquery1.11.3.min.js"></script>-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="js/selectivizr-v1.0.3b.js"></script>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php $this->beginBody() ?>
    <body>
        <div id="all">

         <?= Alert::widget() ?>
<!--
                                            Шапка
-->
            <?= $this->render('header') ?>


            <ul id="header-nav-menu" class="mobile-menu">
                <li class="cat-box"><a href="<?=Url::toRoute(['/articles']);?>">Статьи</a>
                <li class="cat-box"><a href="<?=Url::toRoute(['/articles/category/plan']);?>">Планирование</a></li>
                <li class="cat-box"><a href="<?=Url::toRoute(['/articles/category/pregnancy']);?>">Беременность</a>
                <li class="cat-box"><a href="<?=Url::toRoute(['/articles/category/rodi']);?>">Роды</a>
                <li class="cat-box"><a href="<?=Url::toRoute(['/articles/category/baby']);?>">Ребенок</a>
                <li class="cat-box"><a href="<?=Url::toRoute(['/articles/category/humor']);?>">Юмор</a>
            </ul>


<?php if(\Yii::$app->controller->slider):?>
<!--
                                            слайдер в верхней части
-->

            <?= $this->render('slider') ?>

<?php endif;?>

<!--
                                            ЦЕТРАЛЬНЫЙ БЛОК
-->
            <main class="container-fluid">
                <div class="row">
                    <!--весь центральный блок-->
                    <div class="col-md-22 col-md-offset-1 col-sm-22 col-sm-offset-1 col-xs-22 col-xs-offset-1">
                        <div class="row">
                            <!--хлебный крошки-->
                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'options'=> ['class' => 'breadcrumb', 'style' => 'margin:20px 0 0 0;'],
                                ]);
                            ?>



                            <!--контент центрального блока-->
                            <?php echo $content; ?>


<!--
                                            блок ссылок центрального контейнера
-->


                        </div> <!--end <div class="row"> -->
                    </div><!--end <div class="col-md-22 col-md-offset-1 col-sm-22 col-sm-offset-1 col-xs-22 col-xs-offset-1"> -->
                </div><!--end <div class="row"> -->
            </main>

<!--
                                                    Футер
-->
            <?= $this->render('footer') ?>
        </div>



<!--
                                                    JAVASCRIPT
-->

<!--<script src="js/bootstrap.min.js"></script>-->

<!--<script type="text/javascript">
$(document).ready(function(){
});
</script>-->

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

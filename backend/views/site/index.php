<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Админчасть';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=$this->title;?></h1>

        <hr>
        <p class="lead"><a href="<?php echo Url::toRoute('/blog/index'); ?>">Блог</a></p>
        <hr>
        <p class="lead"><a href="<?php echo Url::toRoute('/comments/index'); ?>">Комментарии</a></p>
        <hr>
        <div class="lead">
            <h3>Рейтинг роддомов</h3>
            <ul>
                <li style="list-style:none"><small><a href="<?php echo Url::toRoute('/geo-cities/index'); ?>">Данные о городах</a></small></li>
                <li style="list-style:none"><small><a href="<?php echo Url::toRoute('/geo-institutions/index'); ?>">Данные о роддомах</a></small></li>
            </ul>
        </div>
        <hr>
        <div class="lead">
            <h3>Энциклопедия</h3>
            <ul>
                <li style="list-style:none"><small><a href="<?php echo Url::toRoute('/wiki-letters/index'); ?>">Категории букв</a></small></li>
                <li style="list-style:none"><small><a href="<?php echo Url::toRoute('/wiki-terms/index'); ?>">Термины</a></small></li>
            </ul>
        </div>
        <hr>
</div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
<!--                <h2>Heading</h2>

                <p>Какой-то текст</p>-->

             </div>

        </div>

    </div>
</div>

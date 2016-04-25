<?php

/*
 * В контроллере подключаем нужный шаблон - public $layout = '@app/views/layouts/page/blog';
 * Выводим контент блога внутри layouts/main.php с нужным шаблоном сайдбара
 * В layouts/main.php выводим через $content
 */
?>

<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            блок article
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <article class="col-md-15">

        <!--контент блока article-->
        <?= $content ?>

    </article>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            Блок aside visible-lg visible-md
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <?=$this->render('@app/views/layouts/sidebar/s-blog.php'); ?>

<?php $this->endContent(); ?>
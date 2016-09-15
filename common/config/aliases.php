<?php
//@app: Your application root directory (either frontend or backend or console depending on where you access it from)
//@vendor: Your vendor directory on your root app install directory
//@runtime: Your application files runtime/cache storage folder
//@web: Your application base url path
//@webroot: Your application web root
//@tests: Your console tests directory
//@common: Alias for your common root folder on your root app install directory
//@frontend: Alias for your frontend root folder on your root app install directory
//@backend: Alias for your backend root folder on your root app install directory
//@console: Alias for your console root folder on your root app install directory

return [
    //АЛИАСЫ РОУТОВ
    //'@blog_index' => 'front/blog/index',//Url::toRoute(['@blog_index', 'pageNum' => 100], true) or Url::to(['@blog_index'], true);


//    ПУТИ К ИЗОБРАЖЕНИЯМ КОНТЕНТА

    '@blogImg-web' =>  $baseUrl.'/img/blog',//для веб
    '@blogImg-path' => '@frontend/web/img/blog',//для файловой системы

    '@wikiImg-web' =>  $baseUrl.'/img/wiki',//для веб
    '@wikiImg-path' => '@frontend/web/img/wiki',//для файловой системы

    '@geoImg-web' =>  $baseUrl.'/img/geo',//для веб
    '@geoImg-path' => '@frontend/web/img/geo',//для файловой системы


    '@usersImg-web' =>  $baseUrl.'/img/users',//для веб
    '@usersImg-path' => '@frontend/web/img/users',//для файловой системы
    '@noAvatar' => '@usersImg-web/default.jpg',

    //авторы постов
    '@authorsImg-web' =>  $baseUrl.'/img/authors',//для веб
    '@authorsImg-path' => '@frontend/web/img/authors',//для файловой системы

    //папка водяных знаков
    '@watermarkImg-web' =>  $baseUrl.'/img/watermark',//для веб
    '@watermarkImg-path' => '@frontend/web/img/watermark',//для файловой системы


];
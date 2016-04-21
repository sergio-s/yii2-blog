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


    //ПУТИ К ИЗОБРАЖЕНИЯМ КОНТЕНТА
////    '@blogImg-web' => $baseUrl.'/frontend/web/img/blog',
//    '@blogImg-web' =>  $baseUrl,
//    '@blogImg-path' => '@frontend/web/img/blog',
];
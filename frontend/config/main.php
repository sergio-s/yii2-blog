<?php

use \yii\web\Request;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'Сайт',
    'language' => 'ru-RU',//язык нашего сайта по умолчанию
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => $baseUrl,
            'cookieValidationKey' => 'sdi8s#fnj98jwiqiw;qfh!fjgh0d8f',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//'urlManagerBackend' => require('../../backend/config/main.php'),
        'urlManager' => [

            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'site/<action>' => 'site/<action>',
                'articles/' => 'blog/index',
                'articles/<action>/<alias:[\w-]+>' => 'blog/<action>',







//                'blog/<pageNum:\d+>' => 'front/blog/index',//@blog_index пагинация блога
//                'blog' => 'front/blog/index', //@blog_index главная страница блога
//                'blog/cat/<categoryAlias:[\w-]+>' => 'front/blog/categories', //@blog_cat страница отдельной категории
//                'blog/tag/<tagName:[\w-]+>' => 'front/blog/tags', //@blog_tag страница выборки статей по тегу блога
//                'blog/<postAlias:[\w-]+>' => 'front/blog/posts', //@blog_post страница поста вида www.elisdn.ru/blog/84/seo-service-on-yii2-application-testing


            ],
        ],
            'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,

];

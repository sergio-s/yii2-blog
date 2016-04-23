<?php

use \yii\web\Request;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
//раскомментировать extension=php_fileinfo.dll в php ini для работы с файлами
//нужно расширение extension=php_intl.dll для работы перевода (интернационализация)
return [
    'id' => 'app-frontend',
    'name' => 'Сайт',
    'aliases' => require(__DIR__ . '/aliases.php'),
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

        //авторизация через соц.сети
//        'eauth' => require(__DIR__ . '/eauth.php'),

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
            'enableStrictParsing' => true,
            'rules' => [

                '/' => 'site/index',
                'site/<action>' => 'site/<action>',

                /**
                 *  правила роутинга для блога .
                 * В представлении используем для вывода ссыок хелпер вида
                 * Url::toRoute(['/blog/category', 'alias' => $category->alias])
                 */
                'articles/<action:\w+>/<alias:\w+>' => 'blog/<action>',
                'articles' => 'blog/index',


            ],
        ],
        //нужно расширение extension=php_intl.dll для работы перевода (интернационализация)
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
                //файл перевода для компонента eauth (авторизация через соц.сети)
                'eauth' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@eauth/messages',
                ],
            ],
        ],

        'assetManager' => [
            'bundles' => [
                //регестрируем свой bootstrap за место встроенного
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null, // не опубликовывать комплект
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => ['css/bootstrap/bootstrap.min.css','css/bootstrap/bootstrap-theme.min.css'],
                    'js' => ['js/bootstrap.min.js']
                ],
                //регестрируем свой jquery за место встроенного
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null, // не опубликовывать комплект
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                                'js/jquery1.11.3.min.js',
//                              YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js',
                    ]
                ],

            ],
        ],

        //формат даты пример вывода = Yii::$app->formatter->asDate($post->createdDate, 'd MMMM yyyy');
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'locale' => 'ru-RU',
            'dateFormat' => 'd MMMM yyyy',//как месяц
            //'dateFormat' => 'dd.MM.yyyy',// как число
            'datetimeFormat' => 'php:n F Y в H:i',
            'timeFormat' => 'H:i:s',
        ],


    ],//конец блока компонентов
    'params' => $params,

];

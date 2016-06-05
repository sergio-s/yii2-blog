<?php
////////////////////////////////////////////////////////////////////////////////////////
//                              frontend
////////////////////////////////////////////////////////////////////////////////////////

//изменения в php.ini
//memory_limit = 128M поменял на (256M переставил обратно)
//
//post_max_size = 40M
//upload_max_filesize = 35M
//max_execution_time=100 место 30
//max_input_time = 100
//
//а также в нужно настроить тут /etc/php5/cgiphp.ini на удаленном сервере
//post_max_size = 40M
//upload_max_filesize = 35M
//max_execution_time=100 место 30
//max_input_time = 100
//
//а также тут \\\Secure FTP\_Quick Connection\etc\php5\cli\
//use \yii\web\Request;

//$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

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
    'name' => 'Я беременна',
    'aliases' => require(__DIR__ . '/aliases.php'),
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
            'errorAction' => 'error/error',//контроллер и экшэн обработки ошибок
        ],
//'urlManagerBackend' => require('../../backend/config/main.php'),
        'urlManager' => require(__DIR__ . '/urlmanager.php'),


        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            //'forceCopy' => YII_DEBUG, //true - перезаписывает не используя кеш, YII_DEBUG - только в разработке
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
            'timeZone' => 'Europe/Moscow',
            'dateFormat' => 'd MMMM yyyy',//как месяц
            //'dateFormat' => 'dd.MM.yyyy',// как число
            'datetimeFormat' => 'php:n F Y в H:i',
            'timeFormat' => 'H:i:s',
        ],


    ],//конец блока компонентов
    'params' => $params,

];

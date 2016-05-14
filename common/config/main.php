<?php
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
$baseUrl = str_replace('/backend/web', '', $baseUrl);

return [
    'aliases' => require(__DIR__ . '/aliases.php'),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',//язык нашего сайта по умолчанию
    'sourceLanguage' => 'ru-RU',
//    'modules' => [
//        'comments' => [
//            'class' => 'app\modules\comments\Module',
//            // ... other configurations for the module ...
//        ],
//    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'urlManager' => [
//
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'enableStrictParsing' => true,
//            'rules' => [
//
//             ],
//        ],

        'urlManagerBackend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => $baseUrl.'/backend',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//$backendUrl = \Yii::$app->urlManagerBackend->createUrl(['admin'])
                'admin' => 'site/index',

            ],

        ],

        //роли и авторизация
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
            'defaultRoles' => common\components\rbac\rbacRoles::roleArray(),
        ],

        //нужно расширение extension=php_intl.dll для работы перевода (интернационализация)
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'ru-RU',
                    
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
        
    ],
];

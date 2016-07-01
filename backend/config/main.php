<?php
////////////////////////////////////////////////////////////////////////////////////////
//                              backend
////////////////////////////////////////////////////////////////////////////////////////
//use \yii\web\Request;
//$baseUrl = str_replace('/backend/web', '', (new Request)->getBaseUrl());

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
//для того, чтобы роутер находил контроллеры в подпапках
    'controllerMap' => [
        'geo-cities' =>[
                'class' =>'backend\controllers\geo\GeoCitiesController'
        ],
        'geo-institutions' =>[
                'class' =>'backend\controllers\geo\GeoInstitutionsController'
        ],
        'wiki-letters' =>[
                'class' =>'backend\controllers\wiki\WikiLettersController'
        ],
        'wiki-terms' =>[
                'class' =>'backend\controllers\wiki\WikiTermsController'
        ],

    ],

    'modules' => [

    ],
    'components' => [
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

        'urlManager' => require(__DIR__ . '/urlmanager.php'),
        //'urlManagerFrontend' => require(dirname(dirname (__DIR__ )).'/frontend/config/urlmanager.php'),

    ],
    'params' => $params,
];

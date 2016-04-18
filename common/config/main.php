<?php
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
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


    ],
];

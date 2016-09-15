<?php
return [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => $baseUrl.'/backend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,

            'rules' => [
                '<controller>/<action>' => '<controller>/<action>',
                '<controller>/<action><id:\d+>' => '<controller>/<action>',
                '/' => 'site/index',
            ],
        ];
?>

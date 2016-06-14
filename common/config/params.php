<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,

    'materialType' =>[
        'blog_post'=>[
            'table_name' => 'blog_posts_table',
        ]
    ],

    'watermark' => '@watermarkImg-path/watermark1.png',//путь для файловой системы, не для веб
    'watermarkOn' => true,//включение водяных знаков на сайте, если есть
];

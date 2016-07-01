<?php
return [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => $baseUrl,
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
                'articles/category/<alias:[\w_-]+>/<pageNum:\d+>' => 'blog/category',//категория по алиасу с цифрой страницы пагинации(articles/category/cat1/2)
                'articles/<action:[\w-]+>/<alias:[\w_-]+>' => 'blog/<action>',//пост по алиасу(articles/post/cdscdsc), категория по алиасу(articles/category/cat1)
                'articles/<pageNum:\d+>' => 'blog/index',//пагинация блога
                'articles' => 'blog/index',

                //роуты карт роддомов
                'rating' => 'geo/index',//вывод всех городов, учавствующих в рейтинге
                'rating/city/<cityId:\d+>' => 'geo/cities',//вывод отдельного города и информации о нем
                'rating/hospital/<instId:\d+>' => 'geo/institutions',//вывод отдельного роддома

                //роуты wiki
                'wiki' => 'wiki/index',//вывод всех терминов wiki
                'wiki/letter/<alias:[\w]+>' => 'wiki/letter',//вывод отдельной категории по букве
                'wiki/<alias:[\w_-]+>' => 'wiki/term',//вывод отдельного термина wiki

                //калькулятор выплат по беременности
                'calculator-<action:[\w-]+>' => 'calculator/<action>',

            ],
        ];
?>

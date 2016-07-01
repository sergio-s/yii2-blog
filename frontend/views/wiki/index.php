<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use common\models\comments\Comments;

\frontend\assets\WikiAsset::register($this);

$this->params['breadcrumbs'][] = $this->context->h1;
?>
<h1><?=$this->context->h1;?></h1>

<!--алфавитный указатель-->
<?php if(isset($alphabet) && $alphabet != NULL):?>
    <hr>
        <ul class="lettersList">
            <li class="allLettersList"><a href="<?=Url::toRoute(['/wiki/index']);?>">Все</a></li>
            <?php foreach($alphabet as $letter):?>
                <li><a href="<?=Url::toRoute(['/wiki/letter', 'alias' => $letter->alias]);?>"><?=$letter->letter;?></a></li>
            <?php endforeach;?>
        </ul>
    <hr>
<?php endif;?>
<?php //var_dump($termList);?>
<!--конец - алфавитный указатель-->

<div class="visible-md visible-lg"><!--visible-md visible-lg-->

    <?php $arMd = [];?>
    <?php foreach($gridMd as $col):?>
        <div class="col-md-8">
            <ul class="termList">
                <?php foreach($col as $term):?>
                    <?php if(array_search($term->id_letter, $arMd) === false):?>
                        <li class="termListHead"><a href="<?=Url::toRoute(['/wiki/letter', 'alias' => $alphabet[$term->id_letter]->alias]);?>"><?php echo $alphabet[$term->id_letter]->letter;?></a></li>
                    <?php endif;?>
                    <?php array_push($arMd, $term->id_letter);?>
                    <li><a href="<?=Url::toRoute(['/wiki/term', 'alias' => $term->alias]);?>"><?php echo $term->title;?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endforeach;?>

</div><!--visible-md visible-lg-->

<div class="visible-sm visible-xs"><!--visible-sm visible-xs-->
<?php
/**
 * Блок виден только на сетках sm и xs.
 * В цикле $gridSm выводит два столбца(2 итеррации).
 * Чтобы выводить букву категории используется тег <li class="termListHead">
 * Для вывода термина используется <li>
 * Количество терминов между колонками распределино равномерно (при формировании массива в контроллере)
 * Массив $arSm нужен для того, чтобы выводить букву категории один раз, так как каждый элемент перечисления
 * $term содержит 'id_letter','alias','title' и 'id_letter' используется для сортировки терминов по
 * пренадлежности к категории буквы с id = 'id_letter' .Поэтому ,буква выводится только один раз,затем
 * добавляется в массив array_push($arSm, $term->id_letter), а последующие буквы
 * у элементов с одинаковым 'id_letter' игнорируются благодаря if(array_search($term->id_letter, $arSm) === false)
 * Сама буква берется из массива букв по id = 'id_letter' вот так - $alphabet[$term->id_letter]->letter ,где $alphabet
 * Массив букв (с данными title и alias)
 */
?>
    <?php $arSm = [];?>
    <?php foreach($gridSm as $col):?>
        <div class="col-sm-12 col-xs-24">
            <ul class="termList">
                <?php foreach($col as $term):?>
                    <?php if(array_search($term->id_letter, $arSm) === false):?>
                        <li class="termListHead"><a href="<?=Url::toRoute(['/wiki/letter', 'alias' => $alphabet[$term->id_letter]->alias]);?>"><?php echo $alphabet[$term->id_letter]->letter;?></a></li>
                    <?php endif;?>
                    <?php array_push($arSm, $term->id_letter);?>
                    <li><a href="<?=Url::toRoute(['/wiki/term', 'alias' => $term->alias]);?>"><?php echo $term->title;?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endforeach;?>

</div><!--visible-sm visible-xs-->
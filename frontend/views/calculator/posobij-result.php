<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;

$this->params['breadcrumbs'][] = array('label'=> 'Калькулятор пособий по беременности и родам', 'url'=> Url::toRoute(['/calculator/posobij']));
$this->params['breadcrumbs'][] = strip_tags($this->context->h1);
?>

<div class="blog-post">
    <h1><?= strip_tags($this->context->h1);?></h1>

    <hr>
    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>

    <br>

    <?php if(isset(Yii::$app->session['benefit.calc'])):?>
        <blockquote class="bg-warning">
            Мы посчитали ваши декретные пособия!
        </blockquote>

        <?php foreach(Yii::$app->session['benefit.sumIncome'] as $year => $payment):?>
            <p>Учтённый доход за <?=$year;?> год: <?=$payment;?> рублей.</p>
        <?php endforeach;?>

        <br>

        <h3 class="rose" style="text-align:center;">Размер вашего пособия по беременности и родам:
            <span style="display:block; font-size:120%;"><?php echo Yii::$app->session['benefit.result'];?></span>
        </h3>


        <br>

        <p>В <?=$currentYear;?> году вам также полагается единовременное пособие при рождении ребенка в размере <?=round($oneTimeBenefit * Yii::$app->session['benefit.coef']);?> руб. (на каждого ребенка).</p>

        <a class="oneMore" href="<?=Url::toRoute(['/calculator/posobij']);?>">Посчитать ещё раз</a>
    <?php else:?>

        <p>Данных по расчету пособия по рождению нет... Для получения расчетов перейдите на страницу калькулятора.</p>
        <a class="oneMore" href="<?=Url::toRoute(['/calculator/posobij']);?>">Калькулятор</a>
    <?php endif;?>
</div>

<?php
$css = <<<CSS

.rose{
    color:#ff9292;
    font-weight: bold;
}

.oneMore{
    display: block;
    margin-top: 40px;
    font-size: 28px;
    text-align: center;
}

CSS;
$this->registerCss($css);



?>
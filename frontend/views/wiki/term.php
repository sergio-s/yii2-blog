<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use common\widgets\comments\CommentsWidget;
use common\models\comments\Comments;


$this->params['breadcrumbs'][] = array('label'=> 'Все страницы энциклопедии', 'url'=> Url::toRoute('/wiki/index'));
$this->params['breadcrumbs'][] = array('label'=> $curTerm->letter->h1, 'url'=> Url::toRoute(['/wiki/letter', 'alias' => $curTerm->letter->alias]));
$this->params['breadcrumbs'][] = strip_tags($this->context->h1);
?>

<div class="blog-post">
    <h1><?= strip_tags($this->context->h1);?></h1>

    <?php if(isset($curTerm->letter)):?>
        <p>
            <small>Раздел:</small>
            <a class="label label-info" href="<?=Url::toRoute(['/wiki/letter', 'alias' => $curTerm->letter->alias]);?>"><?=Html::encode($curTerm->letter->title);?></a>
        </p>
    <?php endif;?>

    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>
    <hr>

    <div class="row blogpagecontent">
        <?php echo $curTerm->content;?>
    </div>

    <br>
    <!--///////////////////////////////////секция Похожие статьи  (выводим,если постов > 1 в текущей категории)////////////////////////////////////////////-->
    <?php if(NULL != $siblingsTerms):?>
    <div class="row selection">

        <div id="selection-horizontal-1" class="col-xs-24 selection-horizontal">
            <!--заголовок-->
            <div class="row">
                <div class="h3-box-selection">
                    <span class="sprite sprite-circle-f"></span>
                    <h3 class="h3-selection b-dash-light-green">Похожие термины из раздела - "<?=$curTerm->letter->title;?>"</h3>
                    <p class="h3-control">
                        <a href="<?=Url::toRoute('/wiki/index');?>" class="control-but">Смотреть все</a>
                    </p>
                </div>
            </div>
            <ul class="row">
                <?php foreach($siblingsTerms as $siblingTerm):?>
                    <li class="col-md-12"><a href="<?=Url::toRoute(['/wiki/term', 'alias' => $siblingTerm->alias]);?>"><?php echo $siblingTerm->title;?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <?php endif;?>
 <!--///////////////////////////////////конец - секция Похожие статьи////////////////////////////////////////////-->



    <hr>
    <!-- <small>Дата публикации: <?php //echo Yii::$app->formatter->asDate($curTerm->createdDate, 'd MMMM yyyy');?></small> -->
    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>


</div>

<?php echo CommentsWidget::widget(['materialType'=> Comments::TYPE_TERMS, 'materialId'=> $curTerm->id]); ?>

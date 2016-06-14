<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use common\widgets\comments\CommentsWidget;
use common\models\comments\Comments;
use yii\helpers\BaseStringHelper;
use app\models\BlogPostsTable;

//$this->title = 'Страницы сайта';
//$this->params['breadcrumbs'][] = array('label'=> 'Все статьи', 'url'=> Url::toRoute('/blog/index'));
$this->params['breadcrumbs'][] = array('label'=> $post->parentCategoris[0]->title, 'url'=> Url::toRoute(['/blog/category', 'alias' => $post->parentCategoris[0]->alias]));
$this->params['breadcrumbs'][] = strip_tags(trim($post->h1));
?>

<div class="blog-post">
    <h1><?= Html::encode($post->h1) ?></h1>

    <?php if(isset($post->parentCategoris)):?>
        <p>
            <small>Категории:</small>
            <?php foreach($post->parentCategoris as $category): ?>
                <a class="label label-info" href="<?=Url::toRoute(['/blog/category', 'alias' => $category->alias]);?>"><?=Html::encode($category->title);?></a>
            <?php endforeach; ?>
        </p>
    <?php endif;?>

    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>

    <?php //echo Html::img('@blogImg-web/'.$model->id.'/thumb/'.$model->img, ['alt'=>'', 'class'=>'gen-img-blogPost']);?>

    <!--    вывод главной картинки с ватермаркой или без, в зависимости от настроек -->
    <?php if(isset($post->img)): ?>
        <?php if(file_exists(Yii::getAlias('@blogImg-path/'.$post->id.'/watermark/'.$post->img)) && true === Yii::getAlias(Yii::$app->params['watermarkOn'])): ?>
            <?php echo Html::img('@blogImg-web/'.$post->id.'/watermark/'.$post->img, ['alt'=>'', 'class'=>'gen-img-blogPost']);?>
        <?php else:?>
            <?php echo Html::img('@blogImg-web/'.$post->id.'/'.$post->img, ['alt'=>'', 'class'=>'gen-img-blogPost']);?>
        <?php endif;?>
    <?php endif;?>

<!--    <blockquote><p><?php //echo Html::encode($post->description);?></p></blockquote>-->
    <div class="row blogpagecontent">
        <?php //echo HtmlPurifier::process($post->content);//чистим контент перед выводом от XSS элементов?>
        <?php echo $post->content;?>
    </div>

    <!--///////////////////////////////////секция Похожие статьи  (выводим,если постов > 1 в текущей категории)////////////////////////////////////////////-->
    <?php if(BlogPostsTable::categoryCountPosts($post->parentCategoris[0]->id) > 1):?>
    <div class="row selection">

        <div id="selection-horizontal-1" class="col-xs-24 selection-horizontal">
            <!--заголовок-->
            <div class="row">
                <div class="h3-box-selection">
                    <span class="sprite sprite-circle-f"></span>
                    <h3 class="h3-selection b-dash-light-green">Похожие статьи по теме - "<?=$post->parentCategoris[0]->title;?>"</h3>
                    <p class="h3-control">
                        <a href="<?=Url::toRoute('/blog/index');?>" class="control-but">Смотреть все</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <!--картинки-->
                <?php $i = 0;?>
                <?php foreach($post->getSiblingsPosts($post->parentCategoris[0]->id) as $siblingPost):?>
                <?php $i++;?>
                <div class="col-md-6 col-sm-6 col-xs-12 <?= ($i>2)?'hidden-xs':'';?>">
                    <div class="block-shadow hover-horder box-block-w100-h100">
                        <a href="<?=Url::toRoute(['/blog/post', 'alias' => $siblingPost->alias]);?>" class="block-w100-h100"></a>
                        <a href="<?=Url::toRoute(['/blog/post', 'alias' => $siblingPost->alias]);?>" class="">
                            <!--<img class="img-selection-horizontal" src="css/img/index.jpg" alt="...">-->
                            <?php if(isset($siblingPost->img)): ?>
                                <?php echo Html::img('@blogImg-web/'.$siblingPost->id.'/thumb/'.$siblingPost->img, ['alt'=>'нет изображения', 'class'=>'img-selection-horizontal']);?>
                            <?php else:?>
                                <?= Html::img('@blogImg-web/default.jpg', ['alt'=>'нет картинки', 'class'=>'img-selection-horizontal']);?>
                            <?php endif;?>
                        </a>
                        <div class="caption-selection-horizontal  center-text">
                            <p><?=BaseStringHelper::truncateWords(strip_tags($siblingPost->title), 10, $suffix = '...' );?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <?php endif;?>
 <!--///////////////////////////////////конец - секция Похожие статьи////////////////////////////////////////////-->


    <hr>
    <!-- <small>Дата публикации: <?=Yii::$app->formatter->asDate($post->createdDate, 'd MMMM yyyy');?></small> -->
    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>

</div>

<?php echo CommentsWidget::widget(['materialType'=> Comments::TYPE_BLOGPOST, 'materialId'=> $post->id]); ?>
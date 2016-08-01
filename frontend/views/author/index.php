<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use common\widgets\comments\CommentsWidget;
use common\models\comments\Comments;
use yii\helpers\BaseStringHelper;

$this->params['breadcrumbs'][] = array('label'=> 'Все статьи', 'url'=>Url::toRoute('/blog/index'));
$this->params['breadcrumbs'][] = $author->authorFullName;
?>
<h1><?=$author->authorFullName;?></h1>

<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>

<br>
<div class="blog-post">

    <div class="row block-shadow" id="authorBox">
        <div class="col-md-7 col-sm-7 col-xs-7">
            <?php echo Html::img('@authorsImg-web/'.$author->id.'/'.$author->img, ['alt'=> $author->authorFullName,'title'=> 'Автор статьи - '.$author->authorFullName, 'class'=>'authorProfImg']);?>
        </div>

        <div class="col-md-17 col-sm-17 col-xs-17">
            <p><?=strip_tags($author->description);?></p>
        </div>
    </div>

    <br>

    <!--заголовок-->
    <div class="row">
        <div class="h3-box-selection">
            <span class="sprite sprite-circle-f"></span>
            <h3 class="h3-selection b-dash-light-green">Все статьи автора "<?=$author->authorFullName;?>"</h3>
            <p class="h3-control">
                <span class="label label-info">Всего : <?=$author->getPosts()->count();?> шт.</span>
            </p>
        </div>
    </div>

    <!--Все статьи автора-->
    <div class="row">
        <?php $elem = 1;?>
        <?php foreach($author->posts as $post):?>
        <div class="col-md-6 col-sm-6 col-xs-12 authorPosts">
            <div class="block-shadow hover-horder box-block-w100-h100">
                <a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>" class="block-w100-h100"></a>
                    <?php if(isset($post->img)): ?>
                        <?php echo Html::img('@blogImg-web/'.$post->id.'/thumb/'.$post->img, ['alt'=> 'Автор статьи '.$author->authorFullName , 'alt'=> $post->title , 'class'=>'img-selection-horizontal']);?>
                    <?php else:?>
                        <?= Html::img('@blogImg-web/default.jpg', ['alt'=> 'Автор статьи '.$author->authorFullName  , 'alt'=>'нет картинки', 'class'=>'img-selection-horizontal']);?>
                    <?php endif;?>

                <div class="caption-selection-horizontal  center-text">
                    <p><?=BaseStringHelper::truncateWords(strip_tags($post->title), 10, $suffix = '...' );?></p>
                </div>
            </div>
        </div>

        <?php //профилактика сползания блоков разной высоты с помощью вставки clearfix ;?>
        <?php if($elem % 4 === 0):?>
            <div class="clearfix hidden-xs"></div>
        <?php endif;?>

        <?php if($elem % 2 === 0):?>
            <div class="clearfix visible-xs"></div>
        <?php endif;?>

        <?php $elem++;?>
        <?php endforeach;?>
    </div>

    <hr>
    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>

</div>

<?php echo CommentsWidget::widget(['materialType'=> Comments::TYPE_AUTHORS, 'materialId'=> $author->id]); ?>
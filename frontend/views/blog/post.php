<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use common\widgets\comments\CommentsWidget;
use common\models\comments\Comments;

//$this->title = 'Страницы сайта';
$this->params['breadcrumbs'][] = array('label'=> 'Статьи', 'url'=> Url::toRoute('/blog/index'));
$this->params['breadcrumbs'][] = Html::encode($post->h1);
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

    <?php if(isset($post->img)): ?>
    <?php echo Html::img('@blogImg-web/'.$post->id.'/'.$post->img, ['alt'=>'', 'class'=>'gen-img-blogPost']);?>
    <?php endif;?>

<!--    <blockquote><p><?php //echo Html::encode($post->description);?></p></blockquote>-->
    <div class="blogpagecontent">
        <?php echo HtmlPurifier::process($post->content);//чистим контент перед выводом от XSS элементов?>
    </div>
    <hr>
    <!-- <small>Дата публикации: <?=Yii::$app->formatter->asDate($post->createdDate, 'd MMMM yyyy');?></small> -->
    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp"></div>

</div>

<?php echo CommentsWidget::widget(['materialType'=> Comments::TYPE_BLOGPOST, 'materialId'=> $post->id]); ?>
<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
//$this->title = 'Страницы сайта';
$this->params['breadcrumbs'][] = array('label'=> 'Все посты', 'url'=>Url::toRoute('/blog/index'));
$this->params['breadcrumbs'][] = $this->title;
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

    <blockquote><p><?=Html::encode($post->description);?></p></blockquote>
    <div>
        <?php echo HtmlPurifier::process($post->content);//чистим контент перед выводом от XSS элементов?>
    </div>
    <hr>
    <small>Дата публикации: <?=Yii::$app->formatter->asDate($post->createdDate, 'd MMMM yyyy');?></small>

<!--    <code><?= __FILE__ ?></code>-->
</div>

<!--<div class="site-index">
<div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                                <div class="jumbotron">
                                    <h1><?= Html::encode($post->h1) ?></h1>

                                    <blockquote><p><?=$post->description;?></p></blockquote>

                                </div>

                                <p><?=$post->content;?></p>
                        <hr>
                        <small>Дата аубликации: <?=$post->createdDate;?></small>
                        </div>
                        <div class="col-lg-4">
                            <div class="list-group">
                                <div class="list-group-item active">Категории блога</div>

                                <?php foreach($categoris as $category): ?>
                                <a href="<?=Url::toRoute(['/blog/category', 'alias' => $category->alias]);?>" class="list-group-item"><?=$category->title;?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>-->

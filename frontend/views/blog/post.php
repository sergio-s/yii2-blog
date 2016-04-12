<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
use yii\helpers\Url;


//$this->title = 'Страницы сайта';
$this->params['breadcrumbs'][] = array('label'=> 'Все посты', 'url'=>Url::toRoute('/blog/index'));
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-index">
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
</div>

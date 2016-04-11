<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

use yii\helpers\Url;

//$this->title = 'Страницы сайта';
$this->params['breadcrumbs'][] = array('label'=> 'Все посты', 'url'=>Url::toRoute('blog/'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
<h1><?= Html::encode($this->title) ?></h1>

<blockquote><p>Описание категории: <?=$currentCategory->descriptions;?></p></blockquote>


    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php foreach($currentCategory->postsFromCategory as $post): ?>
                            <div>
                                <h2><a href="<?=Url::toRoute(['/blog/post/', 'alias' => $post->alias]);?>"><?=$post->h1;?></a></h2>
                                <p>
                                    <?=$post->description;?>
                                </p>
                                <small>Дата аубликации: <?=$post->createdDate;?></small>
                                <p>
                                    <a class="btn btn-default" href="<?=Url::toRoute(['/blog/post/', 'alias' => $post->alias]);?>">Читать пост &raquo;</a>
                                </p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-lg-4">
                            <div class="list-group">
                                <div class="list-group-item active">Категории блога</div>

                                <?php foreach($categoris as $category): ?>
                                <a href="<?=Url::toRoute(['/blog/category/', 'alias' => $category->alias]);?>" class="list-group-item"><?=$category->title;?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>

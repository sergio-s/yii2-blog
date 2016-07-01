<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogPostsTable */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-posts-table-view">
 Информация о вновь созданной статье ...
    <hr>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Посмотреть', Yii::$app->urlManagerFrontend->createUrl(['articles/post/'.$model->alias]), ['class' => 'btn btn-info', 'onclick' => "return !window.open(this.href)"]) ?>


    </p>

    <div>
        <hr>
        Текущие категории поста:
        <?php if(isset($perent_categoris)):?>
            <?php foreach($perent_categoris as $category):?>
        <i><?=$category->title;?></i>
            <?php endforeach;?>
        <?php endif;?>

    </div>
    <hr>
    <h3>Изображение поста.</h3>
<?=Html::img('@blogImg-web/'.$model->id.'/thumb/'.$model->img,['alt'=> 'нет изображения']);?>
    <hr>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'alias',
            'title',
            'description',
            'keywords',
            'alt',
            'h1',
            'content:ntext',
            'createdDate',
            'updatedDate',

            [
                'label'  => $model->attributeLabels()['autorId'],
                'value'  => ($userName = User::findByUserId($model->autorId))? $userName->username : 'не известен',

            ],
            [
                'label'  => $model->attributeLabels()['updaterId'],
                'value'  => ($userName = User::findByUserId($model->updaterId))? $userName->username : 'не известен',

            ],

        ],
    ]) ?>

</div>

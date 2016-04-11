<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogPostsTable */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-posts-table-view">

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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'alias',
            'title',
            'description',
            'h1',
            'content:ntext',
            'createdDate',
        ],
    ]) ?>

</div>

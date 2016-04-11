<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogPostsTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-posts-table-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новый пост', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'alias',
            'title',
            'description',
            'h1',
            // 'content:ntext',
            // 'createdDate',

            ['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\authors\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить автора', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' =>  function ($model)
                            {
                                if($model->img){
                                    return Html::img('@authorsImg-web/'.$model->id.'/'.$model->img, ['style'=>'width:150px']);
                                }
                                return 'нет фото';
                            }
             ],
            'first_name',
            'last_name',
            'description:ntext',
             [

                'format' => 'raw',
                'label' => 'Число постов',
                'value' =>  function ($model)
                            {
                                return $model->getPosts()->count();
                            }
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

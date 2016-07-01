<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\wiki\AdminWikiTermsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Термины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-wiki-terms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать страницу термина', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'id_letter',
            [
                'attribute' => '',
                'format' => 'raw',
                'label' => 'Категория (буква)',
                'value' =>  function ($model)
                            {
                                return "<b>".$model->letter->letter."</b>";
                            }
            ],
            'alias',
            'title',
            'description',
            'keywords',
            'h1',
            // 'content:ntext',
            // 'createdDate',
            // 'updatedDate',
            // 'autorId',
            // 'updaterId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

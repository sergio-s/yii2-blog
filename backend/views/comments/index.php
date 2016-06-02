<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
use backend\models\comments\Comments;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\comments\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->formatter->timeZone = 'UTC';

?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php
//Pjax::begin([
//    'enablePushState' => false,
//    'timeout' => 10000,
//    'id' => 'comments-index',
//]);
?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => function ($model) {
                        return "<span title='Текст комментария : {$model->message}' style='cursor: pointer;' >{$model->id}</span>";
                },
            ],
            [
                'attribute' => 'parentId',
                'format' => 'raw',
                'value' => function ($model) {
                    if (($perent = Comments::findOne($model->parentId)) !== null) {
                        return "<span title='Текст комментария : ".$perent->message."' style='cursor: pointer;' >{$model->parentId}</span>";
                    }


                },
            ],
            [
                'attribute' => 'materialType',
                'format' => 'raw',
                'value' => function ($model) {
                        return \common\models\comments\Comments::getMaterialType()[$model->materialType];
                },
            ],

            [
                'attribute' => 'materialId',
                'format' => 'raw',
                'value' => function ($model) {
                        if($model->materialType === \common\models\comments\Comments::TYPE_BLOGPOST){
                            if (isset($model->material->title) && (null !== $model->material->title)) {
                                return "<span title='". $model->material->title ."' style='cursor: pointer;' >{$model->materialId}</span>";
                            }

                        }
                        if($model->materialType === \common\models\comments\Comments::TYPE_GEOINSTITUTIONS){
                            if (isset($model->material->name) && (null !== $model->material->name)) {
                                return "<span title='". $model->material->name ."' style='cursor: pointer;' >{$model->materialId}</span>";
                            }
                        }

                },
            ],

            [
                'attribute' => 'autorId',
                'format' => 'raw',
                'value' => function ($model) {
                        return ($userName = User::findByUserId($model->autorId))? $userName->username : 'не известен';
                },
            ],
            [
                'attribute' => 'updaterId',
                'format' => 'raw',
                'value' => function ($model) {
                        return ($userName = User::findByUserId($model->updaterId))? $userName->username : 'не известен';
                },
            ],
            // 'parentId',
            // 'level',
            [
                'attribute' => 'createdDate',
                'format' => 'raw',
                'value' => function ($model) {
                        return Yii::$app->formatter->asDatetime($model->createdDate, 'php:d F Y - H:i:s');
                },
            ],
            [
                'attribute' => 'updatedDate',
                'format' => 'raw',
                'value' => function ($model) {
                        return (!NULL == $updatedDate = Yii::$app->formatter->asDatetime($model->updatedDate, 'php:d F Y - H:i:s'))? $updatedDate : 'не обновлялось';
                },
            ],
            // 'message:ntext',

            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                        return \common\models\comments\Comments::getStatusList()[$model->status];
                },
            ],




                ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return  Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'data-method' => 'post',
                                ]);
                        },
                    ],
                ],
            ],
    ]); ?>
<?php
//Pjax::end();
?></div>

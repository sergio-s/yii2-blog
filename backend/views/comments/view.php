<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\comments\Comments */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Все комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->formatter->timeZone = 'UTC';
?>
<div class="comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            [
                'label'  => $model->attributeLabels()['materialType'],
                'value'  => \common\models\comments\Comments::getMaterialType()[$model->materialType],

            ],
            'materialId',
            [
                'label'  => $model->attributeLabels()['autorId'],
                'value'  => ($userName = User::findByUserId($model->autorId))? $userName->username : 'не известен',

            ],
            [
                'label'  => $model->attributeLabels()['updaterId'],
                'value'  => ($userName = User::findByUserId($model->updaterId))? $userName->username : 'не известен',

            ],
            'parentId',
            'level',
            [
                'label'  => $model->attributeLabels()['createdDate'],
                'value'  => Yii::$app->formatter->asDatetime($model->createdDate, 'php:l d F Y - H:i:s'),

            ],
            [
                'label'  => $model->attributeLabels()['updatedDate'],
                'value'  => (!NULL == $updatedDate = Yii::$app->formatter->asDatetime($model->updatedDate, 'php:l d F Y - H:i:s'))? $updatedDate : 'не обновлялось',

            ],

            'message:ntext',
            [
                'label'  => $model->attributeLabels()['status'],
                'value'  => \common\models\comments\Comments::getStatusList()[$model->status],
                //'filter' => Lookup::items('SubjectType'),
            ],
        ],
    ]) ?>

</div>

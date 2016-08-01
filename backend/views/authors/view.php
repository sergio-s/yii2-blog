<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\authors\Authors */

$this->title = $model->authorFullName;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Посмотреть', Yii::$app->urlManagerFrontend->createUrl(['/author/'.$model->id]), ['class' => 'btn btn-info', 'onclick' => "return !window.open(this.href)"]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'description:ntext',

            [
                'label'  => $model->attributeLabels()['img'],
                'format' => 'raw',
                'value'  => Html::img('@authorsImg-web/'.$model->id.'/thumb/'.$model->img, ['style'=>'']),

            ],

            [
                'label'  => 'Число постов',
                'value'  => $model->getPosts()->count(),

            ],
        ],
    ]) ?>

</div>

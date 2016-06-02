<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\geo\GeoCities */

$this->title = 'Информация о городе: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geo-cities-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить город и всю информацию о нем?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Посмотреть', Yii::$app->urlManagerFrontend->createUrl(['rating/city/'.$model->id]), ['class' => 'btn btn-info', 'onclick' => "return !window.open(this.href)"]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address',
            'id_center',
            'phone_code',
            //'country_id',
            'lat',
            'lng',
            'description:ntext',
        ],
    ]) ?>

</div>

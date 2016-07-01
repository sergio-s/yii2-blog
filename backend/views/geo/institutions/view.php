<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\geo\GeoInstitutions */

$this->title = 'Информация о роддоме: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Роддома', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geo-institutions-view">

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
        <?= Html::a('Посмотреть', Yii::$app->urlManagerFrontend->createUrl(['rating/hospital/'.$model->id]), ['class' => 'btn btn-info', 'onclick' => "return !window.open(this.href)"]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'country_id',
            //'city_id',
            'countryName',//getCountryName()
            'cityName',//getCityName()
            'name',
            'address',
            [
                'attribute' => 'phonesNumbers',//getPhonesNumbers()
                'format'=>'raw',
            ],
            'lat',
            'lng',
            'description:ntext',
            'keywords',
            'rating',

            [
                'attribute' => 'likeCount',
                'format'=>'raw',
                'value'=> $model->likesCount, //гетер getLikesCount()
            ],

            [
                'attribute' => 'photoCount',
                'format'=>'raw',
                'value'=> $model->photoCount, //гетер getPhotoCount()
            ],

        ],
    ]) ?>

</div>

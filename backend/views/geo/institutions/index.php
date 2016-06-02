<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\geo\GeoInstitutionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Роддома';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geo-institutions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить роддом', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                    'id',
//'country_id',
                    'countryName',//кастомное поле из другой таблицы
//'city_id',
                    'cityName',//кастомное поле из другой таблицы
                    'name',
                    'address',
// 'lat',
// 'lng',
// 'description:ntext',
// 'like',


                    'phonesNumbers', //getPhonesNumbers()
                    'rating',

                    [
                        'attribute' => '',
                        'format' => 'raw',
                        'label' => 'Лайки',
                        'value' =>  function ($model)
                                    {
                                        return $model->likesCount;
                                    }
                    ],

                    [
                        'attribute' => 'photoCount',
                        'value' => 'photoCount'//гетер getPhotoCount()
                    ],

                    //[
                    //    'attribute' => 'likeCount',
                    //    'value' => 'likesCount'
                    //],
//'likeCount',//кастомное поле из другой таблицы

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

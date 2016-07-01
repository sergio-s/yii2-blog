<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\wiki\AdminWikiTerms */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все страницы терминов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-wiki-terms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
                <?= Html::a('Посмотреть', Yii::$app->urlManagerFrontend->createUrl(['wiki/'.$model->alias]), ['class' => 'btn btn-info', 'onclick' => "return !window.open(this.href)"]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'id_letter',
            [
                'label'=>'Категория (буква)',
                'format'=>'raw',
                'value'=> $model->letter->letter, //гетер getLikesCount()
            ],
            'alias',
            'title',
            'description',
            'keywords',
            'h1',
            'content:ntext',
            'createdDate',
            'updatedDate',
            'autorId',
            'updaterId',
        ],
    ]) ?>

</div>

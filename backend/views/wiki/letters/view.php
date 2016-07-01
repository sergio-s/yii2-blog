<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\wiki\AdminWikiLetters */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все категории букв', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-wiki-letters-view">

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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'alias',
            'letter',
            'title',
            'description',
            'keywords',
            'h1',
            'createdDate',
            'updatedDate',
            'autorId',
            'updaterId',
        ],
    ]) ?>

</div>

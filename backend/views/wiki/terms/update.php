<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\wiki\AdminWikiTerms */

$this->title = 'Обновить страницу термина: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все страницы терминов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-wiki-terms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

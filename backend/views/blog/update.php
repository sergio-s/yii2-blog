<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogPostsTable */

$this->title = 'Обновление поста блога: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все посты блога', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="blog-posts-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categoris_name' => $categoris_name,
        'perent_categoris' => $perent_categoris,
        'selected' => $selected,
    ]) ?>

</div>
